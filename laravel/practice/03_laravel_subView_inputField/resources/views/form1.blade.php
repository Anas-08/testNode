<div>
  <form action="addUser" method="post">
        @csrf
        <table>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" placeholder="enter name" /></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="email" name="email" placeholder="enter email" /></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" name="password" /></td>
            </tr> 
            <tr>
                <td>Address : </td>
                <td><textarea name="address" id="address" cols="20" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Number : </td>
                <td><input type="number" name="number" placeholder="enter number" /></td>
            </tr> 
            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="male" />Male <br>
                    <input type="radio" name="gender" value="female" />Female <br>
                </td>
            </tr> 

            <tr>
                <td>Select Course : </td>
                <td>
                    <select name="course" id="course">
                        <option value="mca">Mca</option>
                        <option value="bca">Bca</option>
                        <option value="bsc">Bsc</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Hobbies : </td>
                <td>
                    <input type="checkbox" name="hobbies[]" value="swimming" >Swimming <br>
                    <input type="checkbox" name="hobbies[]" value="playing" >Playing <br>
                    <input type="checkbox" name="hobbies[]" value="reading" >Reading <br>
                
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Submit" ></td>
            </tr>
        </table>
  </form>
</div>
