<?php

session_start();

require_once ("reuse/productdb.php");
require_once ("reuse/component.php");

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){

              unset($_SESSION['cart'][$key]);


                    // Get the product array
                    // $cart = $_SESSION['cart'];

                    // Unset the first index (or provide an index)
                    // unset($cart->item['id']); 
                        
                    //$_SESSION::put('cart', $cart);
                  //  unset($_SESSION['cart'][$key]);

             // echo "<script>alert('Product removed from cart')</script>";
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

    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap -->
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
                <h6>Your Cart</h6>
                <hr>
      


                <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id'], $row['product_stock']);

                                    
                                 //  foreach($_SESSION["cart"] as $keys => $values){
                                 //   $total = $total + ($values['item_quantity'] * (int)$row['product_price']);
                                  //  }


                                $total = $total + (int)$row['product_price'];
                                  



                                // $inv = $db->stockDec();
                                //$dec = $mysqli->query("SELECT * FROM data WHERE id=$id");

                                 $sql = "UPDATE producttb SET product_stock = product_stock - 1 WHERE `id`= $id";
                          
                                 $dec=mysqli_query($db->con,$sql);

                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
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
                        <h6></h6>
                        <hr>
                        <h6>Total</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text"></h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>
         <!--   

             
         
         <form action ="checkout.php" method = "POST">
                <input type ="submit" value="continue to checkout " class="btn btn-warning my-3">
            </form>
          -->
            <div id="paypal-button-container">
                <!-- Button location-->
            </div>

        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AW5R0NetD0nJi7HOCiubxZvEVbB5BJi4hvTZ_2R-heItpasR2taFnG_cVO_-wqRi4_QprdLgFBUgzqHg&disable-funding=credit"></script>

<script>
paypal.Buttons({
    style: { shape: 'pill'},

    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: 2 //$total
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.

        alert('Successful Purchase ' + details.payer.name.given_name);
       // actions.redirect("success.php");
       //window.location.replace("your_link");

       // $sql = "UPDATE producttb SET product_stock = product_stock - 1 WHERE product_id = $product_id LIMIT 1";
       // console.log($sql);
        
      });
      
             
    },

    onCancel: function (data) {
    // Show a cancel page, or return to cart
    return actions.redirect();
  },

  onError: function(e){
      console.log(e);
  }



  }).render('#paypal-button-container');
</script>


</body>
</html>
