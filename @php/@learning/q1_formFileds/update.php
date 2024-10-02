<?php 
    include './Connection.php';
     $id = $_GET['id'];
     $query = "select * from user where id = '$id' ";
    $data = mysqli_query($con,$query);
    $row = mysqli_fetch_array($data);
    // $row = $result->fetch_assoc();
    $oldDate = $row['date'];
    $oldGender = $row['gender'];
    $oldHobbies = explode(',', $row['hobbies']);
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
        <h3>Form (Update Page) </h3>
        <form action="" method="post" enctype="multipart/form-data" >
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="name" placeholder="enter name" value="<?php echo $row['name']?>" required></td>
                </tr>   
                <tr>
                    <td>Email : </td>
                    <td><input type="email" name="email" placeholder="enter email" value="<?php echo $row['email']?>" required></td>
                </tr> 
                <tr>
                    <td>Mobile : </td>
                    <td><input type="number" name="number" placeholder="enter number" value="<?php echo $row['mobile']?>" required></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="password" placeholder="enter password" value="<?php echo $row['password']?>" required></td>
                </tr>
                <tr>
                    <td>Address : </td>
                    <td><textarea name="address" id="address" cols="20" rows="2" placeholder="enter address" ><?php echo $row['address']?></textarea></td>
                </tr>
                <tr>
                    <td>Gender : </td>
                    <td> <input type="radio" name="gender" value="male" <?php if ($oldGender == 'male') echo 'checked'; ?> > Male <br><input type="radio" name="gender" value="female"  <?php if ($oldGender == 'female') echo 'checked'; ?> >Female </td>
                </tr>
                <tr>
                    <td>Dob : </td>
                    <td><input type="date" name="date" value="<?php echo $oldDate ?>" ></td>
                </tr>  
                <tr>
                    <td>Select Image : </td>
                    <td><input type="file" name="file"></td>
                </tr>
                <tr>
                    <td>Select Course : </td>
                    <td><select name="course" id="course" value="<?php echo $row['course']?>">
                        <option value="msc">Msc</option>
                        <option value="mca">Mca</option>
                        <option value="pdgca">Pgdca</option>
                        <option value="bca">Bca</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Hobbies : </td>
                    <td> 
                        <input type="checkbox" name="hobbies[]" value="swimming" <?php if (in_array('swimming', $oldHobbies)) echo 'checked'; ?> >Swimming <br>
                        <input type="checkbox" name="hobbies[]" value="reading" <?php if (in_array('reading', $oldHobbies)) echo 'checked'; ?> >Reading <br>
                        <input type="checkbox" name="hobbies[]" value="playing" <?php if (in_array('playing', $oldHobbies)) echo 'checked'; ?> >Playing <br>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update" name="update"></td>
                </tr>
            </table>
        </form>

        <table>
            <tr>
                <td><a href="./display.php">Back Page</a></td>
            </tr>
        </table>
    </center>

    <?php 
        if(isset($_POST['update'])){
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

            $imageExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            if( ($imageExtension != 'jpg') && ($imageExtension != 'jpeg') && ($imageExtension != 'png')){
                echo "<script>alert('Invalid Image Extension')</script>";
                exit();
            }

            $query = "update user set name = '$name', email='$email', mobile = '$number' , password = '$password',
             address = '$address', gender = '$gender', date = '$date', image = '$img_dest', course = '$course', hobbies = '$hobb_final'  where id = '$id'  ";
            
            $data = mysqli_query($con, $query);

            if($data){
                // echo "<script>alert()</script>";
                
                move_uploaded_file($tmpName, $img_dest);
                ?>
                    <script>
                        alert("Record Updated")
                        window.open("http://localhost/@learning/q1_formFileds/display.php","_self")
                    </script>
                    <?php
                // echo "<script>alert('Record Updated')</script>";
            }else{
                ?>                  
                    <script>alert("Record Not Updated")</script>
                <?php
            }
        }

    ?>


</body>
</html>
