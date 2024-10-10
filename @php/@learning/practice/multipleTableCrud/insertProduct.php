<?php
    include "./connection.php";

    $selectCategory = "select * from categories";
    $res = mysqli_query($con, $selectCategory);    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product</title>
</head>
<body>
    <center>
        <h2>Insert product</h2>

        <br>
        <br>

        <form method="post">
            <table>
                <tr>
                    <td>Product Name : </td>
                    <td><input type="text" name="productname"></td>
                </tr>
                <tr>
                    <td>Product price : </td>
                    <td><input type="text" name="productprice"></td>
                </tr>
                <tr>
                    <td>Select Category : </td>
                    <td>
                        <select name="category" id="category">
                            <?php
                                if($res){
                                    while( $row = mysqli_fetch_assoc($res)){
                                        ?>
                                            <option value="<?php echo $row['cateory_id']; ?>">
                                                <?php echo $row['category_name']; ?>
                                            </option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="insert" value="insert product"></td>
                </tr>
            </table>
        </form>
    </center>
    
</body>
</html>

<?php
    if(isset($_POST['insert'])){
        $productName = $_POST['productname'];
        $productPrice = $_POST['productprice'];
        $categoryId = $_POST['category'];
        $catId = (int)$categoryId;


        // echo $productName;
        // echo "<br>";
        // echo $productPrice;
        // echo "<br>";
        // echo $categoryId;
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        
        // var_dump($productName);
        // echo "<br>";
        // var_dump($productPrice);
        // echo "<br>";
        // var_dump($categoryId);
        // echo "<br>";
        // var_dump($catId);

        $insertproduct = "insert into products (cateory_id, product_name, product_price) 
        values ('$catId', '$productName', '$productPrice') ";

        $res = mysqli_query($con, $insertproduct);
        
        if($res){
            echo "<script>alert('record inserted')</script>";
        }else{
            echo "<script>alert('record not inserted')</script>";
        }
    }
?>