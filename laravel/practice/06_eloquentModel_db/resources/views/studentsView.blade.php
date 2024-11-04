<h1>Student Page</h1>

{{-- {{ print_r($students) }} --}}

<br>
<hr>
<br>

<center>
    <table border="1" cellpadding="14px" cellspacing="0px" >
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Course</td>
        </tr>
        @foreach ( $students as $stud )
            <tr>
                <td>{{ $stud->name }}</td>
                <td>{{ $stud->email }}</td>
                <td>{{ $stud->city }}</td>
            </tr>
        @endforeach
    </table>
</center>