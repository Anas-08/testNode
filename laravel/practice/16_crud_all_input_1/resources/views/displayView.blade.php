<?php $serialNo = 1;  ?>
<center>
    <h1>Dispaly Page</h1>

    <br>
    <br>
    <br>

    {{-- {{ $data }} --}}
    <br>
    <br>
    <form action="search" method="get">
        <input type="text" placeholder="search by name" name="search" value="{{ @$search }}" >
        <br>
        <br>
        <button>Search</button>
    </form>
    <hr>
    <br>
    <br>
    
    <table border="1" cellpadding="12px" cellspacing="0" >
        <tr>
            <th>Serial No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Mobile</th>
            <th>Course</th>
            <th>Hobby</th>
            <th>Image</th>
            <th colspan="2" >Actions</th>
        </tr>

        @foreach ($data as $val )
            <tr>
                <td>{{ $serialNo++ }}</td>
                <td>{{ $val->name }}</td>
                <td>{{ $val->email }}</td>
                <td>{{ $val->password }}</td>
                <td>{{ $val->address }}</td>
                <td>{{ $val->gender }}</td>
                <td>{{ $val->mobile }}</td>
                <td>{{ $val->course }}</td>
                <td>{{ $val->hobby }}</td>
                <td> <img width="100px" src="{{ 'storage/images/'.$val->image }}" alt=""> </td>
                <td><button><a href="{{ 'edit/'.$val->id }}">Edit</a></button></td>
                <td><button><a href="{{ 'delete/'.$val->id }}">Delete</a></button></td>
            </tr>
        @endforeach

    </table>

</center>