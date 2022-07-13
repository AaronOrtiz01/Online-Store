<?php

require_once 'db_connect_product.php';
require_once('./reuse/productdb.php');
require_once('./reuse/productElement.php');

$id = $_POST['taskOption'];
$flag = 0;

if (empty($id)) {
    echo '<script>alert("Error Selecting Product")</script>';
    $flag = $flag + 1;
}

if($flag < 1){
    
    $sql = "UPDATE `producttb` SET `active` = (`active` ^ 1) WHERE `id` = '$id'";

    if(mysqli_query($success, $sql)){
    }else{
        echo 'query error: ' . mysqli_error($success);
    }

    echo '<script>alert("Product changed successfully")</script>';
    echo "<script> location.href='admin_landing.php'; </script>";
    exit;

}else{
    echo "<script> location.href='admin_active.php'; </script>";
    exit;
}

?>