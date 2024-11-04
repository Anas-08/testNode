<div>
    <h1>Student data Page (by Model query builder)</h1>
    {{ $data }}

    <br>
    <hr>
    <br>

    <center>
        <table border="1" cellpadding="12px" cellspacing="0px" >
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
            @foreach ($data as $val )
                <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->course }}</td>
                </tr>
            @endforeach
        </table>
    </center>

    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
</div>
