<div>
    <h1>Student Data from DB</h1>
    {{ print_r($data) }}

    <center>
        <table border="1" cellpadding="12px" cellspacing="0" >
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>City</td>
            </tr>
            @foreach ($data as $stud )
                <tr>
                    <td>{{ $stud->name }}</td>
                    <td>{{ $stud->email }}</td>
                    <td>{{ $stud->city }}</td>
                </tr>
            @endforeach
        </table>
    </center>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
</div>
