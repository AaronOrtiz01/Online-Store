<?php

require_once 'db_connect_product.php';
require_once('./reuse/productdb.php');
require_once('./reuse/productElement.php');

$id = $_POST['taskOption'];
$name =  $_POST["name"];
$price = $_POST["price"];
$image = $_POST["image"];
$stock = $_POST["stock"];
$flag = 0;

if (empty($id)){
    echo '<script>alert("ID is required")</script>';
    $flag = $flag + 1;
}

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
    
    //UPDATE `producttb` SET `id`='',`product_name`='testC',`product_price`='42',`product_image`='./img/default.png',`product_stock`='42' WHERE `id` = '12'
    $sql = "UPDATE `producttb` SET `id`='$id',`product_name`='$name',`product_price`='$price',`product_image`='$image',`product_stock`='$stock' WHERE `id` = '$id'";

    if(mysqli_query($success, $sql)){
    }else{
        echo 'query error: ' . mysqli_error($success);
    }

    echo '<script>alert("Product changed successfully")</script>';
    echo "<script> location.href='admin_landing.php'; </script>";
    exit;

}else{
    echo "<script> location.href='admin_edit.php'; </script>";
    exit;
}

?>