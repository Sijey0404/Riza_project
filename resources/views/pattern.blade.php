@extends('layout.layout1')

@section('title', 'Contact Us')
<h2>Pattern Generator</h2>
<br>
<pre>
@php

    for ($i = 0; $i <= $rows; $i++) {
        echo "*";  
        for ($j = 0; $j < $i - 1; $j++) {
            echo "_"; 
        }
        if ($i > 0) {
            echo "*";  
        }
        echo "\n"; 
    }
    echo str_repeat('*', $rows + 1) . "\n";  
@endphp
</pre>