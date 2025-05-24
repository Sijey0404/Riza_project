<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\UserAccount;
use Illuminate\Pagination\Paginator;
use Validator;
use Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ManageStudentController extends Controller
{
    public function index()
    {
        // Get students with their associated user accounts
        $students = Student::leftJoin('user_accounts', 'students.id', '=', 'user_accounts.useraccount_id')
            ->select(
                'students.*', 
                'user_accounts.username',
                'user_accounts.status'
            )
            ->orderBy('students.id', 'desc')
            ->paginate(3);
            
        return view("student")->with("students", $students);
    }

    public function create()
    {
        // Generate a student ID to display in the form
        $generatedId = Student::generateStudentId();
        return view("addStudentForm", ['generatedId' => $generatedId]);
    }

    public function store(Request $request)
    {
        // Auto-generate the student ID rather than using input
        $studentId = Student::generateStudentId();

        $validator = Validator::make($request->all(), [
            // Remove studentid validation since it's auto-generated
            "fname" => "required|min:2|max:26",
            "mname" => "required|min:2|max:16",
            "lname" => "required|min:2|max:16",
            "address" => "required|min:2|max:20",
            "contactno" => "required|min:2|max:20",
            "email" => "required|email|unique:user_accounts,username",
            "student_image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        // Initialize image path as null
        $imagePath = null;
        
        // Handle image upload if provided
        if ($request->hasFile('student_image')) {
            $image = $request->file('student_image');
            $imageName = time() . '_' . $studentId . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/students'), $imageName);
            $imagePath = 'images/students/' . $imageName;
        }

        // Create the student record
        $student = Student::create([
            "studentid" => $studentId, // Use the auto-generated ID
            "fname" => $request->fname,
            "mname" => $request->mname,
            "lname" => $request->lname,
            "address" => $request->address,
            "contactno" => $request->contactno,
            "email" => $request->email,
            "image_path" => $imagePath
        ]);
        
        // Generate default password (studentid + firstname)
        $defaultPassword = $studentId . $request->fname;
        
        // Create user account for the student
        UserAccount::create([
            'useraccount_id' => $student->id,
            'username' => $request->email,
            'password' => Hash::make($defaultPassword),
            'defaultpassword' => $defaultPassword,
            'status' => 'active'
        ]);

        $msg = "Student {$student->studentid} Saved Successfully with a User Account!";
        Log::info("Student created: " . json_encode($student->toArray()));

        return redirect("student")->with("message", $msg);
    }

    public function show(string $id)
    {
        $student = Student::with('userAccount')->find($id);
        return view("showStudent")->with("student", $student);
    }

    public function edit(string $id)
    {
        $student = Student::find($id);
        return view("editStudentForm")->with("student", $student);
    }
    
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        // Remove studentid from validation since it shouldn't be changed
        $validator = Validator::make($request->all(), [
            'fname' => 'required|min:3|max:20',
            'mname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'address' => 'required|max:255',
            'contactno' => 'required|min:2|max:20',
            'email' => 'required|email|unique:user_accounts,username,' . $student->userAccount->id,
            'student_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $changes = [];
        foreach (['fname', 'mname', 'lname', 'address', 'contactno', 'email'] as $field) {
            if ($student->$field != $request->$field) {
                $changes[] = ucfirst($field) . ": from {$student->$field} to {$request->$field}";
            }
        }
        
        // Handle image upload if provided
        if ($request->hasFile('student_image')) {
            // Delete the old image if it exists
            if ($student->image_path && File::exists(public_path($student->image_path))) {
                File::delete(public_path($student->image_path));
            }
            
            // Upload the new image
            $image = $request->file('student_image');
            $imageName = time() . '_' . $student->studentid . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/students'), $imageName);
            $student->image_path = 'images/students/' . $imageName;
            
            $changes[] = "Profile image updated";
        }

        // Update student fields
        $student->fname = $request->fname;
        $student->mname = $request->mname;
        $student->lname = $request->lname;
        $student->address = $request->address;
        $student->contactno = $request->contactno;
        $student->email = $request->email;
        $student->save();
        
        // Update the user account username if email changed
        if ($student->userAccount && $student->userAccount->username != $request->email) {
            $student->userAccount->username = $request->email;
            $student->userAccount->save();
            $changes[] = "Username updated to match new email";
        }

        if (!empty($changes)) {
            Log::info("Student: {$student->studentid} is updated with the ff: — " . implode(', ', $changes));
        } else {
            Log::info("Student: {$student->studentid} was updated but no changes were made.");
        }

        return redirect()->route('student.index')->with('message', 'Student Successfully Updated!');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $studentData = $student->toArray();
        $studentid = $student->studentid;
        
        // Delete the student's image if it exists
        if ($student->image_path && File::exists(public_path($student->image_path))) {
            File::delete(public_path($student->image_path));
        }
        
        // No need to delete the user account manually as we've set up a cascade delete in the migration
        $student->delete();

        $msg = "Student {$studentid} Deleted Successfully!";
        Log::info("Student deleted: " . json_encode($studentData));

        return redirect("student")->with("message", $msg);
    }
}
