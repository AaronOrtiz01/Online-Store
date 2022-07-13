<?php

session_start();

require_once 'db_connect.php';
require_once('./reuse/productdb.php');
require_once('./reuse/productElement.php');
//require_once('./reuse/footer.php');

$database = new CreateDb("Productdb","Producttb");

if(isset($_POST['add'])){
  if(isset($_SESSION['cart'])){

    $item_array_id = array_column($_SESSION['cart'], "product_id");
        $count = count($_SESSION['cart']);

        $item_array = array(
            'product_id' => $_POST['product_id']
            //'item_quantity' => $_POST['quantity']
            //'item_price'  => $_POST['price']

        );
        $_SESSION['cart'][$count] = $item_array;
  }else{

    $item_array = array(
        'product_id' => $_POST['product_id']
    );
    $_SESSION['cart'][0] = $item_array;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aaron's Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="reuse/style.css">
</head>
<body>

    <?php require_once("reuse/header.php")?>

<div class="container">
    <div class="row text-center py-5">
    <button class="button large-btn" onclick="window.location='admin_add.php';" value="add">Add New Product </button> 
     &nbsp; &nbsp; &nbsp;

    <button class="button large-btn" onclick="window.location='admin_edit.php';" value="edit">Edit Product </button>

    &nbsp; &nbsp; &nbsp;
    <button class="button large-btn" onclick="window.location='admin_active.php';" value="edit">Activate/Deactivate Product</button>
    </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

<p style="margin-bottom:10cm;">
<footer>
<?php require_once("reuse/footer.php")?>
</footer>
</p>

</body>
</html>