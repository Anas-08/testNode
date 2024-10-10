<?php
    require "./connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Simple Crud</title>
</head>
<body>
    

   <center>
   <h1>Insert</h1>  
    <br>
    <hr>
    <br>
   <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" ></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="email" name="email" ></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" name="password" ></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td> <textarea name="address" id="address"></textarea></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td> <input type="radio" name="gender" value="male">Male <br> <input type="radio" name="gender" value="female">Female </td>
            </tr>
            <tr>
                <td>Select Course : </td>
                <td>
                    <select name="course" id="course">
                        <option value="" disabled>Select Course</option>
                        <option value="mca">MCA</option>
                        <option value="bca">BCA</option>
                        <option value="msc">MSC</option>
                        <option value="pgdca">PGDCA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date : </td>
                <td><input type="date" name="date"></td>
            </tr>
            <tr>
                <td>Upload Img : </td>
                <td><input type="file" name="file" > </td>
            </tr>
            <tr>
                <td>Hobbies : </td>
                <td>
                    <input type="checkbox" name="hobby[]" value="reading">Reading <br> 
                    <input type="checkbox" name="hobby[]" value="playing">Playing <br> 
                    <input type="checkbox" name="hobby[]" value="swimming">Swimming <br> 
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="insert" value="Insert"></td>
            </tr>

            <br>
            <br>
            <br>
            <br>
            <a href="view.php">Display</a>
            <br>
            <br>
            <br>
            <br>
        </table>
   </form>

   </center>

</body>
</html>



<?php
    if(isset($_POST['insert'])){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $date = $_POST['date'];

        $h = $_POST['hobby'];
        $hobbies = implode(",",$h);
       // var_dump($hobbies);
        $file = $_FILES['file'];
       // print_r($file);
        $fileName = $_FILES['file']['name'];
        $tmpName = $_FILES['file']['tmp_name'];

        $img_dest = "uploads/".$fileName;
        $imgExtension = pathinfo($fileName, PATHINFO_EXTENSION);
       // echo $imgExtension;
        if(($imgExtension != 'jpg') && ($imgExtension != 'jpeg') && ($imgExtension != 'png')){
            echo "<script>alert('only image allowed(jpg, jpeg, png)')</script>";
            exit();
        }

        $insert = "insert into test1(name, email, password, address, gender, course, date, img, hobby)
        values ('$name', '$email', '$password', '$address', '$gender', '$course', '$date', '$img_dest', '$hobbies')";

        $res = mysqli_query($con, $insert);
        if($res){
            move_uploaded_file($tmpName, $img_dest);
            echo "<script>alert('Record Inserteed')</>";
        }else{
            echo "<script>alert('Record Not Inserteed')</script>";
        }
    }
?>