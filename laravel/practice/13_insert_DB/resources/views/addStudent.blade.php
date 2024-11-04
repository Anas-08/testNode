<center>
    <div>
        <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
        <h2>Insert Student Data</h2>
    
        <br>
        <br>
        <br>

        <form action="student" method="post" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" placeholder="enter name" name="name" ></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" placeholder="enter email" name="email" ></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" placeholder="enter password" name="password" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add Student" ></td>
                </tr>
            </table>
        </form>
    
    </div>
    
</center>