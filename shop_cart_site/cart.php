<?php

session_start();

require_once ("reuse/productdb.php");
require_once ("reuse/productElement.php");

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){

              unset($_SESSION['cart'][$key]);
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="reuse/style.css">
</head>
<body class="bg-light">

<?php
    require_once ('reuse/header.php');
    require_once ('reuse/productdb.php');
?>

 <div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <?php
                $total = 0;
                $finaltotal = 0;
                $tax = 0.0625; //Edit this value to change tax rate

                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                        
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();

                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id'], $row['product_stock'], $row['active']);
 
                                 //  foreach($_SESSION["cart"] as $keys => $values){
                                 //   $total = $total + ($values['item_quantity'] * $values["product_price"]); //(int)$row['product_price']);
                                  //  }

                               $total = ($total + (int)$row['product_price']);

                                // $inv = $db->stockDec();
                                 // $sql = "UPDATE producttb SET product_stock = product_stock - 1 WHERE `id`= $id";
                                 // $dec=mysqli_query($db->con,$sql);                                                      

                                }
                            }
                        }
                        $tax = ($total * $tax);
                        $finaltotal = ($total + $tax);
                    }
                    else{        
                        $tax = 0;
                        echo '<script>';
                        echo 'alert("Cart is empty");'; 
                        echo '</script>';                      
                    }
                 ?>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>              
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Tax</h6>
                            <br><hr>
                                <h6>Total</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6>$<?php echo number_format($tax, 2); ?></h6>
                        <h6 class="text"></h6>
                        <hr><h6>$<span id = total><?php echo number_format($finaltotal, 2); ?></span></h6>
                    </div>
                </div>
            </div>
         <!--         
             Old checkout page        
         <form action ="old_checkout.php" method = "POST">
                <input type ="submit" value="continue to checkout">
            </form>
          -->
          
          <div id="paypal-button-container">
                <!-- Button Placement-->
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AW5R0NetD0nJi7HOCiubxZvEVbB5BJi4hvTZ_2R-heItpasR2taFnG_cVO_-wqRi4_QprdLgFBUgzqHg&disable-funding=credit,card"></script>

<script>
paypal.Buttons({
    style: { shape: 'pill'},

    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount:
          {
            value: document.getElementById("total").innerHTML
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        alert('Successful Purchase ' + details.payer.name.given_name);
        location.href='new_confirm_purchase.php';      
      });       
    },

        //<meta http-equiv="refresh" content="time; URL=new_url" />
       // actions.redirect("success.php");
       //window.location.replace("");

    onCancel: function (data) {
    return actions.redirect();
  },

  onError: function(e){
      console.log(e);
  }

  }).render('#paypal-button-container');
</script>

</body>
</html>