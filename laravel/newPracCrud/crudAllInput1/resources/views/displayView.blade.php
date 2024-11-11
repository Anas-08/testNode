<?php $serialNo = 1; ?>

<center>
    <h1>Display Data</h1>

    <br>
    <hr>
    <br>
    
    {{-- {{ $data }} --}}
    <br>
    <br>

    <hr>
    <br>
        <form action="/search" method="get" >
            @csrf
            <input type="text" placeholder="search by name" name="search" value="{{ @$search }}" />
            <br>
            <br>
            <button>Search</button>
        </form>
    <br>
    <hr>

    <table border="1" cellpadding='12px' cellspacing='0' >
        <tr>
            <th>Serial No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Password</th>
            <th>Dob</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Course</th>
            <th>Hobbies</th>
            <th colspan="2" >Actions</th>
        </tr>

        @foreach( $data as $val )
            <tr>
                <td>{{ $serialNo++ }}</td>
                <td>{{ $val->name }}</td>
                <td>{{ $val->email }}</td>
                <td>{{ $val->number }}</td>
                <td>{{ $val->password }}</td>
                <td>{{ $val->dob }}</td>
                <td>{{ $val->gender }}</td>
                <td>{{ $val->address }}</td>
                <td>{{ $val->course }}</td>
                <td>{{ $val->hobby }}</td>
                <td><a href="/edit/{{$val->id}}">Edit</a></td>
                <td><a href="/delete/{{$val->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

</center>