<?php 
    include './Connection.php';
     $id = $_GET['id'];
     $query = "delete from student1 where id = '$id' ";
     $data = mysqli_query($con, $query);
     if($data){
        ?>
            <script>
                alert('Record Deleted');
                window.open("http://localhost/@learning/simpleCrud/view.php","_self");
            </script>
        <?php
     }else{
        ?>
            <script>
                alert('Record Not Inserted');
            </script>
        <?php
     }
?>