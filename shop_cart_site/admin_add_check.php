<?php

require_once 'db_connect_product.php';
require_once('./reuse/productdb.php');
require_once('./reuse/productElement.php');


$name =  $_POST["name"];
$price = $_POST["price"];
$image = $_POST["image"];
$stock = $_POST["stock"];
$flag = 0;


if (empty($name)){
    echo '<script>alert("Name is required")</script>';
    $flag = $flag + 1;
}
if (empty($price)) {
    echo '<script>alert("Price is required")</script>';
    $flag = $flag + 1;
}
if (empty($stock)) {
    echo '<script>alert("Stock amount is required")</script>';
    $flag = $flag + 1;
}

if($flag < 1){
    
    $sql = "INSERT INTO `producttb` (`id`, `product_name`, `product_price`, `product_image`, `product_stock`, `active` ) VALUES ('', '$name', '$price', '$image', '$stock', '1')";

    if(mysqli_query($success, $sql)){
    }else{
        echo 'query error: ' . mysqli_error($success);
    }

    echo '<script>alert("Product Added")</script>';
    echo "<script> location.href='admin_landing.php'; </script>";
    exit;

}else{
    echo "<script> location.href='admin_landing.php'; </script>";
    exit;
}

?>