<center>
    <br>
    <br>
    <h1>Insert Student Data</h1>

<br>
<br>
<br>



<form action="student" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Name : </td>
            <td><input type="text" name="name" placeholder="enter name" /> </td>
        </tr>
        <tr>
            <td>Address : </td>
            <td><textarea name="address" id="address" cols="20" rows="4" placeholder="enter address" ></textarea> </td>
        </tr>
        <tr>
            <td>Course : </td>
            <td>
                <select name="course" id="course">
                    <option value="mca">Mca</option>
                    <option value="bca">Bca</option>
                    <option value="msc">Msc</option>
                    <option value="ml">Ml</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Mobile : </td>
            <td><input type="text" name="mobile" placeholder="enter mobile" /></td>
        </tr>
        <tr>
            <td>Gender : </td>
            <td>
                <input type="radio" name="gender" value="male" >Male <br>
                <input type="radio" name="gender" value="female" >Female <br>
            </td>
        </tr>
        <tr>
            <td>Upload Img : </td>
            <td><input type="file" name="file" ></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button>Insert</button>
                <a href="/studentDisp">Display</a>
            </td>
        </tr>
    </table>
</form>
</center>