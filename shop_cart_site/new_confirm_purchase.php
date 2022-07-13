<html>
<body>
  
    <?php

    require_once 'db_connect.php';
    require_once ("reuse/productdb.php");
    require_once ("reuse/productElement.php");
    require_once("cart.php");
   

 $product_id = array_column($_SESSION['cart'], 'product_id');
 $result = $db->getData();
 while ($row = mysqli_fetch_assoc($result)){
    foreach ($product_id as $id){
        if ($row['id'] == $id){
            $sql = "UPDATE producttb SET product_stock = product_stock - 1 WHERE `id`= $id";
            $dec=mysqli_query($db->con,$sql);
        }
    }
}
    echo '<script>alert("Thank you for your purchase")</script>';
    unset($_SESSION['cart']);
    echo '<script>location.href="index.php"</script>';    

   ?>


<!--
<main id="main">
    <div class="site-title text-center">
        <h1 class="font-title">Payment Completed </h1>
        <p>Thank you for your order <br>
    </div>
</main>
-->
</body>
</html>