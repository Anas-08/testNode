<?php
    require_once "./connection.php";

    $id = $_GET['id'];
    $select = "select * from test1 where id = ".$id;

    $res = mysqli_query($con, $select);

    $row = mysqli_fetch_assoc($res);
    // $row = mysqli_num_rows($res);

    $oldGender = $row['gender'];
    $oldHobby = explode(",", $row['hobby']);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
                <td><input type="text" name="name" value="<?= $row['name']; ?>" ></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="email" name="email" value="<?= $row['email']; ?>" ></td>
            </tr>
            <tr>
                <td>Password : </td>
                <td><input type="password" name="password" value="<?= $row['password']; ?>" ></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td> <textarea name="address" id="address" ><?= $row['address']; ?> </textarea></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td> <input type="radio" name="gender" value="male" <?php if($oldGender =='male') echo 'checked'; ?> >Male <br> <input type="radio"  name="gender" <?php if($oldGender == 'female') echo 'checked'; ?> value="female">Female </td>
            </tr>
            <tr>
                <td>Select Course : </td>
                <td>
                    <select name="course" id="course" value="<?= $row['course']; ?>">
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
                <td><input type="date" name="date" value="<?= $row['date']; ?>"></td>
            </tr>
            <tr>
                <td>Upload Img : </td>
                <td><input type="file" name="file" > </td>
            </tr>
            <tr>
                <td>Hobbies : </td>
                <td>
                    <input type="checkbox" name="hobby[]" value="reading" <?php if(in_array('reading', $oldHobby)) echo 'checked'; ?> >Reading <br> 
                    <input type="checkbox" name="hobby[]" value="playing" <?php if(in_array('playing', $oldHobby)) echo 'checked'; ?>  >Playing <br> 
                    <input type="checkbox" name="hobby[]" value="swimming" <?php if(in_array('swimming', $oldHobby)) echo 'checked'; ?> >Swimming <br> 
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>

            <br>
            <br>
            <br>
            <br>
            <a href="view.php">Back</a>
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
    if(isset($_POST['update'])){
        
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

        $update = "update test1 set name = '$name', email = '$email', password = '$password',
        address='$address', gender='$gender', course='$course', date='$date', img='$img_dest', hobby='$hobbies' where id = '$id' ";
       // $insert = "insert into test1(name, email, password, address, gender, course, date, img, hobby)
       // values ('$name', '$email', '$password', '$address', '$gender', '$course', '$date', '$img_dest', '$hobbies')";

        $res = mysqli_query($con, $update);
        if($res){
            move_uploaded_file($tmpName, $img_dest);
            echo "<script>alert('Record Updated')</script>";
            echo "
    <script>
        window.open('http://localhost/@learning/practice/simpleCrud/view.php','_self');
    </script>";
        }else{
            echo "<script>alert('Record Not Updated')</script>";
        }
    }
?>