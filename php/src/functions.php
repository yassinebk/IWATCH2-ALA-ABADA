<?php
//database access
require('../../database/DBController.php');

//product database access
require('../../database/Product.php');

//cart database access
require('../../database/Cart.php');

$db =new DBcontroller();

$product =new Product($db);

$product_array =$product->getProductData();

$Cart=new Cart($db);


