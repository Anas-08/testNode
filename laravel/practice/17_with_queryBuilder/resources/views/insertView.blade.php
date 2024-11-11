<center>
    <br>
    <br>
    <h2>Insert Data</h2>
    <br>
    <br>

    <form action="insert" method="post" enctype="multipart/form-data" >
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
                <td>Mobile : </td>
                <td><input type="text" placeholder="enter mobile" name="mobile" ></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td><textarea name="address" id="address" cols="21" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="male" >Male <br>
                    <input type="radio" name="gender" value="female" >Female <br>
                </td>
            </tr>
           
            <tr>
                <td>Course : </td>
                <td>
                    <select name="course" id="course">
                        <option value="mca">MCA</option>
                        <option value="bca">BCA</option>
                        <option value="msc">MSC</option>
                        <option value="ml">ML</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hobbies : </td>
                <td>
                    <input type="checkbox" name="hobby[]" value="swimming" >Swimming <br>
                    <input type="checkbox" name="hobby[]" value="reading" >Reading <br>
                    <input type="checkbox" name="hobby[]" value="playing" >Playing <br>
                </td>
            </tr>
            <tr>
                <td>Choose File : </td>
                <td><input type="file" name="file" ></td>
            </tr>
            <tr>
                <td></td>
                <td><button>Insert</button></td>
            </tr>
        </table>
    </form>
</center>