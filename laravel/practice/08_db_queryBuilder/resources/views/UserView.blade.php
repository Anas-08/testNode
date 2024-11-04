<div>
    <h1>User Page</h1>
    {{ $data }}

    <center>
        <table border="1" cellpadding="12px" cellspacing="0px" >
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
            </tr>
            @foreach ($data as $val )
                <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->city }}</td>
                </tr>
            @endforeach
        </table>
    </center>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
</div>
