<?php 
    $age = 20;
?>
@include('common.header')
<div>
    <h1>Blade Template ex: 1</h1>
    <hr>
    <br>
    <br>
    <h2>Welcome, {{$name}}</h2>


    <h3>Random Number : {{ rand() }}</h3>
    <h3>Array: {{ $arr[0] }}</h3>
    <br>
    <hr>
    <br>
    <h3> if...else in blade</h3>
    @if($age > 18)
        <h2>Age is Greater than 18</h2>
    @elseif($age == 18)
        <h2>Age is  18</h2>
    @else
        <h2>Age less than is 18</h2>
    @endif

    <hr>
    <h3>Array</h3>
    <p>{{ print_r($arr) }}</p>

    <br>
    <hr>
    <br>
    <h2>Simple for loop in blade</h2>
    @for($i = 1; $i<=10; $i++)
        <h3>{{$i}}</h3>
    @endfor    

    <br>
    <hr>
    <br>
    <h2> foreach for array</h2>
    @foreach($arr as $a)
        <h3>{{ $a }}</h3>
    @endforeach
    <!-- It is never too late to be what you might have been. - George Eliot -->

</div>

<br>
<hr>
<br>
<x-message msg="component in blade example" />
<style>
    .test{
        padding: 12px;
        border: 1px solid black;
        background-color: lightcoral;
    }
</style>

<br>
<hr>
<br>

<ul>
    <li><a href="/">Back To Home</a></li>
</ul>
