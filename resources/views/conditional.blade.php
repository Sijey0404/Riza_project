@extends('layout.layout1') <!-- Use your layout -->

@section('title', 'Contact Us')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row w-100">
        <!-- Grade Section -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Grades</h3>
                    <p class="card-text">
                        @if(is_null($grade) || !is_numeric($grade))
                            <strong class="text-danger">Invalid Grades</strong>
                        @elseif($grade >= 1 && $grade <= 75)
                            Your grade {{ $grade }} = 5.00
                        @elseif($grade == 75)
                            Your grade {{ $grade }} = 3.00
                        @elseif($grade >= 76 && $grade <= 79)
                            Your grade {{ $grade }} = 2.75
                        @elseif($grade >= 80 && $grade <= 81)
                            Your grade {{ $grade }} = 2.50
                        @elseif($grade >= 82 && $grade <= 84)
                            Your grade {{ $grade }} = 2.25
                        @elseif($grade >= 85 && $grade <= 87)
                            Your grade {{ $grade }} = 2.00
                        @elseif($grade >= 88 && $grade <= 90)
                            Your grade {{ $grade }} = 1.75
                        @elseif($grade >= 91 && $grade <= 93)
                            Your grade {{ $grade }} = 1.50
                        @elseif($grade >= 94 && $grade <= 96)
                            Your grade {{ $grade }} = 1.25
                        @elseif($grade >= 97 && $grade <= 100)
                            Your grade {{ $grade }} = 1.00
                        @else
                            <strong class="text-danger">Invalid Grades</strong>
                        @endif
                    </p>
                    <br>
                    <p>Star Pattern</p>
                    @php
                    $s = 10; // size of the pattern
                    @endphp
                    
                    @for ($i = 0; $i <= $s; $i++)
                        @for($j = 0; $j <= $i; $j++)
                            @if($j == 0 || $i == $s || $j == $i)
                                *
                            @else
                                _
                            @endif
                        @endfor
                        <br>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
