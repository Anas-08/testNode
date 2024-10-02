<?php
    include("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <center>
        <h3>Form (insert Page) </h3>
        <form action="" method="post" enctype="multipart/form-data" >
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="name" placeholder="enter name" required></td>
                </tr>   
                <tr>
                    <td>Email : </td>
                    <td><input type="email" name="email" placeholder="enter email" required></td>
                </tr> 
                <tr>
                    <td>Mobile : </td>
                    <td><input type="number" name="number" placeholder="enter number" required></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="password" placeholder="enter password" required></td>
                </tr>
                <tr>
                    <td>Address : </td>
                    <td><textarea name="address" id="address" cols="20" rows="2" placeholder="enter address" ></textarea></td>
                </tr>
                <tr>
                    <td>Gender : </td>
                    <td> <input type="radio" name="gender" value="male" > Male <br><input type="radio" name="gender" value="female" >Female </td>
                </tr>
                <tr>
                    <td>Dob : </td>
                    <td><input type="date" name="date"></td>
                </tr>  
                <tr>
                    <td>Select Image : </td>
                    <td><input type="file" name="file"></td>
                </tr>
                <tr>
                    <td>Select Course : </td>
                    <td><select name="course" id="course">
                        <option value="msc">Msc</option>
                        <option value="mca">Mca</option>
                        <option value="pdgca">Pgdca</option>
                        <option value="bca">Bca</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Hobbies : </td>
                    <td> 
                        <input type="checkbox" name="hobbies[]" value="swimming">Swimming <br>
                        <input type="checkbox" name="hobbies[]" value="reading">Reading <br>
                        <input type="checkbox" name="hobbies[]" value="playing">Playing <br>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Insert" name="insert"></td>
                </tr>
            </table>
        </form>

        <table>
            <tr>
                <td><a href="./display.php">Display Page</a></td>
            </tr>
        </table>
    </center>
</body>
</html>

<?php
    if(isset($_POST["insert"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $gender = $_POST["gender"];
        $date = $_POST["date"];
        $course = $_POST["course"];
        $hob = $_POST["hobbies"];
        $hobb_final = implode(",", $hob);

        $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $filetype = $_FILES['file']['type'];
        $tmpName = $_FILES['file']['tmp_name'];

        $img_dest = "upload/" . $fileName;
       // move_uploaded_file($tmpName, $img_dest);

    //    image extension 
        $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        if( ($imageExtension != 'jpg') && ($imageExtension != 'jpeg') && ($imageExtension != 'png')){
            echo "<script>alert('Invalid Image Extension')</script>";
            exit();
        }

        $query = "insert into user(name, email, mobile, password, address, gender, date, image, course, hobbies) 
        values('$name','$email','$number','$password', '$address', '$gender', '$date', '$img_dest', '$course', '$hobb_final')";
        $data = mysqli_query($con,$query);
        
        if($data){
            move_uploaded_file($tmpName, $img_dest);
            echo "<script>alert('Record Inserted')</script>";
        }else{
            echo "<script>alert('Record Not Inserted')</script>";
        }

        
        // echo $name;
        // echo "<br>"; 
        // echo $email;
        // echo "<br>"; 
        // echo $number;
        // echo "<br>"; 
        // echo $password;
        // echo "<br>";
        // echo $address;
        // echo "<br>"; 
        // echo $gender;
        // echo "<br>"; 
        // echo $date;
        // echo "<br>"; 
        // echo $course;
        // echo "<br>"; 
        // // print($hob);
        // echo "<br>";

        // print_r($hob);
        // echo "<br>";
        // echo "<br>";
        // print_r($hobb);

        if($_FILES['file']){
            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";
            $fileName = $_FILES['file']['name'];
            $filetype = $_FILES['file']['type'];
            $tmpName = $_FILES['file']['tmp_name'];
           move_uploaded_file($tmpName, "upload/" . $fileName);
        }



    }
?>