<center>
    <h1>Insert Page</h1>
    <br>
    <br>
    <br>

    <form action="/insertData" method="post" >
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
                <td>Mobile Number : </td>
                <td><input type="text" placeholder="enter number" name="number" ></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" placeholder="enter password" name="password" ></td>
            </tr>  
            <tr>
                <td>Dob : </td>
                <td><input type="date" placeholder="enter date" name="date" ></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="male" > Male <br>
                    <input type="radio" name="gender" value="female" > Female <br>
                </td>
            </tr>
            <tr>
                <td>Address : </td>
                <td> <textarea name="address" id="address" cols="20" rows="2" placeholder="enter address" ></textarea> </td>
            </tr>
            <tr>
                <td>Course : </td>
                <td>
                    <select name="course" id="course">
                        <option value="mca">Mca</option>
                        <option value="bca">Bca</option>
                        <option value="msc">Msc</option>
                        <option value="pgdca">Pgdca</option>
                        <option value="ml">Ml</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hobby : </td>
                <td>
                    <input type="checkbox" name="hobby[]" value="swimming" > Swimming <br>
                    <input type="checkbox" name="hobby[]" value="playing" > Playing <br>
                    <input type="checkbox" name="hobby[]" value="reading" > Reading <br>
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Insert Data" ></td>
            </tr>

        </table>
    </form>


</center>