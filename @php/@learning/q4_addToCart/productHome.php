<?php

session_start();
    // first include connection
    include './Connection.php';
    // include "./Connection.php";
    // include('./Connection.php');
    // include("./Connection.php");

    if(!empty($_GET['action'])){
        //add to cart
        switch($_GET['action']){
            case 'add': 
                if(!empty($_POST['quantity'])){
                    $productid = $_GET['productCode'];
                    $query = "select * from cart2 where pid = ".$productid;
                    $res = mysqli_query($con, $query);
                    while($product = mysqli_fetch_array($res)){

                        $itemArr = [
                            $product['pid'] => [
                                'name'  => $product['name'],
                                'pid'  => $product['pid'],
                                'quantity'  => $_POST['quantity'],
                                'price'  => $product['price'],
                                'image'  => $product['images']
                            ]
                            ];
                            var_dump($itemArr);

                            if(!empty($_SESSION['cart_item'])){
                                if(in_array($product['pid'], array_keys($_SESSION['cart_item']))){
                                    foreach($_SESSION['cart_item'] as $key => $val){
                                        if($product['pid'] == $key ){
                                            if(empty($_SESSION['cart_item'][$key]["quantity"])){
                                                $_SESSION['cart_item'][$key]['quantity'] = 0;
                                            }
                                            $_SESSION['cart_item'][$key]['quantity'] += $_POST['quantity'];
                                        }
                                    }
                                }else{
                                    $_SESSION['cart_item'] += $itemArr; 
                                }
                            }else{
                                $_SESSION['cart_item'] = $itemArr;     
                            }

                    }
                }
            break; 
            case 'remove':
                if(!empty($_SESSION['cart_item'])){
                    foreach($_SESSION['cart_item'] as $key => $val ){
                        if($_GET['pid'] == $key){
                            unset($_SESSION['cart_item'][$key]);
                        }
                        if(empty($_SESSION['cart_item'])){
                            unset($_SESSION['cart_item']);
                        }
                    }
                }
                break;
        }
    }

    $totalItems = 0;
    $totalPrice = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
</head>
<body>
    <h2>Product Page</h2>

    <br>
    <hr>
    <br>

    <div>
        <div style="border : 1px solid black; width: 80%; margin-inline: auto; padding-block:12px;" >
            
           <center>
            <h2>cart</h2>
           <table border="1px" cellpadding="12px" cellspacing="0" >
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Product Id</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
              
                    <?php
                        if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'] )){
                            foreach($_SESSION['cart_item'] as $item ){
                                $itemPrice = $item['price'] * $item['quantity'];
    
                                ?>
                                  <tr>
                                     <td><img src="<?= $item['image'] ?>" width="100px" alt="<?= $item['name'] ?>"></td>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= $item['pid'] ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td><?= $item['price'] ?></td>
                                    <td><?= $itemPrice ?></td>
                                    <td><a href="productHome.php?action=remove&pid=<?= $item['pid'] ?>">Remove</a></td>
                                    </tr>
                                <?php
                               
                            }
                        }else{
                            // echo "No items added in cart";
                            ?>
                            <tr>
                                <td colspan="7">No items added in cart</td>
                            </tr>
                            <?php
                        }

                      
                    ?>
                   
                
            </table>
           </center>
        </div>

        <div style="border : 1px solid black; width: 80%; margin-inline: auto;" >
            <div style="display: flex; flex-wrap: wrap; gap: 12px;">
            <?php
                $query = "select * from cart2";
                $data = mysqli_query($con, $query);

                if(!empty($data)){
                    while($row = mysqli_fetch_array($data)){
                        ?>
                            <form action="productHome.php?action=add&productCode=<?= $row['pid']?>" method="post">
                                <div style="width: 300px;  border : 1px solid black; padding: 12px; margin: 10px; ">
                                <img src="<?= $row['images'] ?>" alt="<?= $row['name'] ?>" width="200px">
                                <h2>Product Name : <?= $row['name'] ?> </h2>
                                <h2>Product Price : <?= $row['price'] ?> </h2>
                                
                                <input type="number" value="1" size="2" name="quantity">
                                <button type="submit">Add To Cart</button>
                            </div>
                            </form>
                        <?php
                    }
                }
            ?>
            </div>


        </div>

    </div>
    
</body>
</html>