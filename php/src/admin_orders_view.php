<?php

@include 'config.php';
$orders=[];
$users=$conn->query("select distinct user_id from cart;");
$users =$users->fetch_all();
//var_dump($users);
foreach($users as $user ){
    $items= $conn->query("select * from cart where user_id=$user[0]");
    $items=$items->fetch_all();
//    var_dump($items);
    $orders[]= array($user[0]=>$items);
//    var_dump($orders);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}

?>

<div class="container">

<!--    <div class="admin-product-form-container">-->
<!---->
<!--        <form action="--><?php //$_SERVER['PHP_SELF'] ?><!--" method="post" enctype="multipart/form-data">-->
<!--            <h3>add a new product</h3>-->
<!--            <input type="text" placeholder="enter product name" name="product_name" class="box">-->
<!--            <input type="number" placeholder="enter product price" name="product_price" class="box">-->
<!--            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">-->
<!--            <input type="submit" class="btn" name="add_product" value="add product">-->
<!--        </form>-->
<!---->
<!--    </div>-->


    <div class="product-display">
        <table class="product-display-table">
            <thead>
            <tr>
                <th>User_id</th>
                <th>product_id</th>
                <th>Price</th>
                <th>action</th>
            </tr>
            </thead>
            <?php foreach($orders as $user_id=>$products ){ ?>
                    <?php foreach ($products as $product) {
                        $totalValue=0;
                        ?>
                        <?php foreach($product as $p){
                            $totalValue+=(int)$p[0];
                            ?>
                <tr>
                    <td><?= $p[1]?></td>
                    <td><?php echo $p[2]; ?></td>
                    <td><?= $p[0]?> TND</td>
<!--                    <td>-->
<!--                        <a href="admin_update.php?edit=--><?php //echo $row['item_id']; ?><!--" class="btn"> <i class="fas fa-edit"></i> edit </a>-->
<!--                        <a href="admin_page.php?delete=--><?php //echo $row['item_id']; ?><!--" class="btn"> <i class="fas fa-trash"></i> delete </a>-->
<!--                    </td>-->
                </tr>
                    <?php }?>
                    <br>
        <tr>
            <td></td>
            <td></td>
            <td> Total <?= $totalValue?></td>
        </tr>
                        <?php }?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            <?php } ?>
        </table>
    </div>

</div>


</body>
</html>
