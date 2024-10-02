<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
</head>
<body>
    <center>    
        <h2>Register page</h2>

        <form action="" method="post">
            <table>
                <tr>
                    <td>Name : </td>
                    <td> <input type="text" name="name" placeholder="enter name" required /></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td> <input type="email" name="email" placeholder="enter email" required /></td>
                </tr>   
                <tr>
                    <td>Mobile : </td>
                    <td> <input type="text" name="mobile" placeholder="enter mobile" required /></td>
                </tr>
                <tr>
                    <td>DOB : </td>
                    <td> <input type="date" name="date" /></td>
                </tr>
                <tr>
                    <td>Address : </td>
                    <td> <textarea name="address" id="" placeholder="enter address" required ></textarea> </td>
                </tr>
                <tr>
                    <td>Gender : </td>
                    <td>
                        <input type="radio" name="gender" value="male"  /> Male <br>
                        <input type="radio" name="gender" value="female"  /> Female <br>
                    </td>
                </tr>

                <tr>
                    <td>Select Course : </td>
                    <td> 
                        <select name="course" id="">
                            <option value="mca">MCA</option>
                            <option value="bca">BCA</option>
                            <option value="msc">MSC</option>
                        </select>
                    </td>
                </tr>
                <!-- <tr>
                    <td></td>
                    <td> <input type="checkbox" name="check" value="i agree on terms and conditions"  />i agree on terms and conditions</td>
                </tr>   -->
                <tr>
                    <td>Hobbies : </td>
                <td>
                    <input type="checkbox" name="hobbiess[]" value="playing"  />playing <br>
                    <input type="checkbox" name="hobbiess[]" value="swimming"  />swimming <br>
                    <input type="checkbox" name="hobbiess[]" value="reading"  />reading <br>
                </td>
                </tr> 
                <tr>
                    <td> <input type="reset" name="c" value="Reset" /></td>
                    <td> <input type="submit" name="register" value="Register" /></td>
                </tr>  

            </table>
        </form>
    </center>
    
<?php 
    if(isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $hobb = $_POST['hobbiess'];

        $hobb1 = implode("," ,$hobb);
        // $hob = isset($_POST['hobbiess']) ? $_POST['hobbiess'] : [];


        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $mobile;
        echo "<br>"; 
        echo $date;
        echo "<br>";
        echo $address;
        echo "<br>";  
        echo $gender;
        echo "<br>";
        echo $course;
        echo "<br>";  
        echo $hobb1;
        echo "<br>";

        print_r($hobb);


    }


?>

</body>
</html>