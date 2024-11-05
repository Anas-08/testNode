<center>
    <br>
    <br>
    <h1>Display Student Data</h1>
    <br>
    <br>

    {{-- {{ $students }} --}}

    <br>
<form action="search" method="get" >
    <input type="text" placeholder="search by name" name="search" value="{{ @$search }}" />
    <br>
    <br>
    <button>Search</button>

</form>
<hr>
<br>

    <table border="1" cellpadding="12px" cellspacing="0" >
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Course</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Image</th>
            <th colspan="2">Actions</th>
        </tr>
        @foreach ($students as $stud)
            <tr>
                <td>{{ $stud->id }}</td>
                <td>{{ $stud->name }}</td>
                <td>{{ $stud->address }}</td>
                <td>{{ $stud->course }}</td>
                <td>{{ $stud->mobile }}</td>
                <td>{{ $stud->gender }}</td>
                <td> <img width="50px" src="{{ 'storage/images/'.$stud->image }}" alt=""> </td>
                <td> <button><a href="{{ url('edit/'.$stud->id) }}">Edit</a></button></td>
                <td> <button><a href="{{ url('delete/'.$stud->id) }}">Delete</a></button></td>
            </tr>
        @endforeach
    </table>

    {{-- use for pagination --}}
    {{-- {{ $students->links() }} --}}

</center>