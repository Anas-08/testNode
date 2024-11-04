<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <center>
        <br>
        <br>
        <h1>Login Page</h1>
        <br>
        <br>
        <form action="/login" method="post">
            @csrf
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" placeholder="enter name" name="name" ></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" placeholder="enter password" name="password" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>
    </center>
</div>
