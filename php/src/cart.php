<?php
ob_start();
session_start();
include_once("./functions.php");


$con = mysqli_connect("localhost", "root", "", "ecommerce") or die("database is not connecting...");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_cart'])) {
        $deletedrecord = $Cart->deleteCart($_POST['item_id']);
    }
    else if (isset($_POST['increment'])) {
        $id = $_POST['item_id'];
        $quantity = $_POST['quantity'] + 1;
        $req = "UPDATE cart SET quant=$quantity WHERE item_id=$id;";
        $res = mysqli_query($con, $req) or die(mysqli_error($con));
    }
    else if (isset($_POST['decrement'])) {
        $id = $_POST['item_id'];
        $quantity = $_POST['quantity'] - 1;
        $req = "UPDATE cart SET quant=$quantity WHERE item_id=$id;";
        $res = mysqli_query($con, $req) or die(mysqli_error($con));
    }
    else if (isset($_POST['top_sale_submit'])) {
            // call method addToCart
            $Cart->addToCart($_SESSION['user_id'], $_POST['item_id']);

        }
}

$product_count= count($product->getData('cart',$_SESSION['user_id']));
var_dump($product_count);

include_once('../template/header.php');

include_once('../template/shopping-cart.php');

include_once('../template/top-sale.php');

include_once('../template/footer.php');
   ?>