<div>
    <h2>User Page</h2>
    {{-- {{ print_r($user) }} --}}

    <br>
    <br>
    <br>
    <table border="1" cellpadding='10px' cellspacing="0px">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>City</td>
        </tr>
        @foreach ($user as $us )
            <tr>
                <td>{{ $us->name }}</td>
                <td>{{ $us->email }}</td>
                <td>{{ $us->city }}</td>
            </tr>
        @endforeach
    </table>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
</div>
