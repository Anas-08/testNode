<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <center>
        <br>
        <br>
        <h1>Login Page</h1>
        <br>
        <br>

        <form action="login" method="post">
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
