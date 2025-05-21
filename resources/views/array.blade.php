@extends('layout.layout1')

@section('title', 'Contact Us')
<div class="container">
    <h2 class="mb-4">Student List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            @php
                $students = [
                    ['id' => 123, 'name' => 'Alexander GrahamBar', 'age' => 20, 'gender' => 'Male'],
                    ['id' => 234, 'name' => 'Mark Joseph Iglesia ni Chris Brown', 'age' => 22, 'gender' => 'Female'],
                    ['id' => 345, 'name' => 'Alice Go', 'age' => 21, 'gender' => 'Female'],
                    ['id' => 456, 'name' => 'Kiko', 'age' => 23, 'gender' => 'Male'],
                    ['id' => 567, 'name' => 'Daryle Datuin', 'age' => 19, 'gender' => 'Male'],
                    ['id' => 678, 'name' => 'Angeline Iglesias', 'age' => 24, 'gender' => 'Female'],
                    ['id' => 789, 'name' => 'Paneng Hart', 'age' => 22, 'gender' => 'Male'],
                    ['id' => 891, 'name' => 'Lola Remedios', 'age' => 20, 'gender' => 'Female'],
                    ['id' => 912, 'name' => 'DaoMingSi', 'age' => 21, 'gender' => 'Male'],
                    ['id' => 101, 'name' => 'ShanShai', 'age' => 23, 'gender' => 'Female'],
                ];
            @endphp
            
            @foreach($students as $student)
                <tr>
                    <td>{{ $student['id'] }}</td>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['age'] }}</td>
                    <td>{{ $student['gender'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>