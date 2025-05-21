@extends('layout.layout1') 

@section('title', 'Student List') 

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Student List</h4>
                </div>
                <div class="card-body">
                    @if(count($students) > 0)
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Course</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $s)
                                    <tr>
                                        @if(!empty($s['name']))
                                            <td>{{ $s['ID'] }}</td>
                                            <td>{{ $s['name'] }}</td>
                                            <td>{{ $s['age'] }}</td>
                                            <td>{{ $s['course'] }}</td>
                                        @else
                                            <td colspan="5" class="text-center text-danger">
                                                Student data incomplete for ID: {{ $s['ID'] }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            No students found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
