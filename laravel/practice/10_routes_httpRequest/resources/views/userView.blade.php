<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    <h1>User Form</h1>

    <br>
    <hr>
    <br>

    <center>
        {{-- <form action="/userGet" method="get"> --}}
        {{-- <form action="/userPost" method="post"> --}}
        <form action="/user" method="post">
            @csrf
            {{-- <input type="hidden" name="_method" value="put" > --}}
            {{-- <input type="hidden" name="_method" value="delete" > --}}
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
