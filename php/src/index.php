<?php
ob_start();
session_start();
if (! isset($_SESSION['username']))
{header("Location:login.php");}
else{
//include header
include_once("functions.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['top_sale_submit'])) {
            // call method addToCart
            $Cart->addToCart($_SESSION['user_id'], $_POST['item_id']);

        }
    }

    $product_count= count($product->getData('cart',$_SESSION['user_id']));

    include('../template/header.php');


// include carousel.php
include('../template/carousel.php');

//include top-sale.php
include('../template/top-sale.php');


//include special_price.php
include('../template/special_price.php');

        
    

//include footer.php
include('../template/footer.php');

}
?>