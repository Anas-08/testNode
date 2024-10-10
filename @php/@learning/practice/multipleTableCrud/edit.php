<?php
    include "./connection.php";

    if(isset($_GET['id'])){
        $productid = $_GET['id']; 

        $selectProduct = " select * from products where product_id = '$productid' ";
        $productRes = mysqli_query($con, $selectProduct);
        $product_row = mysqli_fetch_assoc($productRes);

        $selectCategory = "select * from categories";
        $categoryResult = mysqli_query($con, $selectCategory);
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
</head>
<body>
    <center>
        <h2>Update product</h2>

        <br>
        <br>

        <form method="post">
            <table>
                <tr>
                    <td>Product Name : </td>
                    <td><input type="text" name="productname" value="<?= $product_row['product_name']; ?>" ></td>
                </tr>
                <tr>
                    <td>Product price : </td>
                    <td><input type="text" name="productprice" value="<?= $product_row['product_price']; ?>" ></td>
                </tr>
                <tr>
                    <td>Select Category : </td>
                    <td>
                        <select name="category" id="category">
                            <?php
                                if($categoryResult){
                                    while( $row = mysqli_fetch_assoc($categoryResult)){
                                        ?>
                                            <option value="<?php echo $row['cateory_id']; ?>"
                                            
                                            <?php if($row['cateory_id'] == $product_row['cateory_id']) echo 'selected'; ?>
                                            >
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
                    <td><input type="submit" name="update" value="update product"></td>
                </tr>
            </table>
        </form>
    </center>
    
</body>
</html>

<?php
    if(isset($_POST['update'])){
        $productName = $_POST['productname'];
        $productPrice = $_POST['productprice'];
        $categoryId = $_POST['category'];
        $catId = (int)$categoryId;

        $updateProduct = "update products set cateory_id = '$catId' , product_name = '$productName',
         product_price = '$productPrice' where product_id = '$productid' "; 
       
        $res = mysqli_query($con, $updateProduct);
        
        if($res){
            echo "<script>alert('record update')</script>";
            header("location:display.php");
        }else{
            echo "<script>alert('record not update')</script>";
        }
    }
?>