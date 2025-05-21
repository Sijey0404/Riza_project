<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Pagination\Paginator;
use Validator;
use Log;


class ManageStudentController extends Controller

{
    public function index()
    {
        // $students = Student::all();
        $students = Student::paginate(2);
        return view('student')->with("students", $students);
    }

    public function create()
{
    return view("addStudentForm");
}

public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        "studentid" => "required|min:5|max:6|unique:students",
        "fname" => "required|min:2|max:26",
        "mname" => "required|min:2|max:16",
        "lname" => "required|min:2|max:16",
        "address" => "required|min:2|max:20",
        "contactno" => "required|min:2|max:12"
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $student = Student::create([
        "studentid" => $request->studentid,
        "fname" => $request->fname,
        "mname" => $request->mname,
        "lname" => $request->lname,
        "address" => $request->address,
        "contactno" => $request->contactno
    ]);

    $msg = "Student {$student->studentid} Saved Successfully!";
    Log::info("Student created: " . json_encode($student->toArray()));

    return redirect("student")->with("message", $msg);
}


// public function store(Request $request)
// {
//     $validator = Validator::make($request->all(),[
//         "studentid"=>"required|min:5|max:6|unique:students",
//         "fname"=>"required|min:2|max:26",
//         "mname"=>"required|min:2|max:16",
//         "lname"=>"required|min:2|max:16",
//         "address"=>"required|min:2|max:20",
//         "contactno"=>"required|min:2|max:12"
//     ]);

//     if($validator->fails()){
//         return back()->withErrors($validator)->withInput();
//     }

//     Student::create([
//         "studentid"=>$request->studentid,
//         "fname"=>$request->fname,
//         "mname"=>$request->mname,
//         "lname"=>$request->lname,
//         "address"=>$request->address,
//         "contactno"=>$request->contactno
//     ]);

//     $msg = "Student {$request->studentid} Saved Successfully!";
//     Log::info($msg);

//     return redirect("student")->with("message", $msg);
// }


    public function show(string $id)
    {
        // 

        $student = Student::find($id);
        return view("showStudent")->with("student", $student);
    }

    public function edit(string $id)
    {
        // 
        // return $id;
        $student = Student::find($id);
        return view("editStudentForm")->with("student", $student);
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $validator = Validator::make($request->all(), [
            'studentid' => 'required|min:4|max:20|unique:students,studentid,' . $id,
            'fname' => 'required|min:3|max:20',
            'mname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'address' => 'required|max:255',
            'contactno' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $changes = [];
        foreach (['studentid', 'fname', 'mname', 'lname', 'address', 'contactno'] as $field) {
            if ($student->$field != $request->$field) {
                $changes[] = ucfirst($field) . ": from {$student->$field} to {$request->$field}";
            }
        }

        $student->update($request->all());

        if (!empty($changes)) {
            Log::info("Student: {$student->studentid} is updated with the ff: — " . implode(', ', $changes));
        } else {
            Log::info("Student: {$student->studentid} was updated but no changes were made.");
        }

        return redirect()->route('student.index')->with('message', 'Student Successfully Updated!');
    }
    


//     public function update(Request $request, string $id)
// {
//     $student = Student::find($id);

//     $student->studentid = $request->studentid;
//     $student->fname = $request->fname;
//     $student->mname = $request->mname;
//     $student->lname = $request->lname;
//     $student->address = $request->address;
//     $student->contactno = $request->contactno;
//     $student->save();

//     $msg = "Student {$student->studentid} Updated Successfully!";
//     Log::info($msg);

//     return redirect("student")->with("message", $msg);
// }

public function destroy(string $id)
{
    $student = Student::findOrFail($id);
    $studentData = $student->toArray();
    $studentid = $student->studentid;
    $student->delete();

    $msg = "Student {$studentid} Deleted Successfully!";
    Log::info("Student deleted: " . json_encode($studentData));

    return redirect("student")->with("message", $msg);
}


// public function destroy(string $id)
// {
//     $student = Student::findOrFail($id);
//     $studentid = $student->studentid;
//     $student->delete();

//     $msg = "Student {$studentid} Deleted Successfully!";
//     Log::info($msg);

//     return redirect("student")->with("message", $msg);
// }

}
