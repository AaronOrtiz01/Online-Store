<html>
<body>
  
    <?php

    require_once 'db_connect.php';

    //$name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
   // $password2 = $_POST["password_2"];

   $sql = "INSERT INTO `customer` (`id`, `username`, `email`, `password`) VALUES ('', '$username', '$email', '$password')";

    //$sql = "INSERT INTO `customer`(`id`, `username`, `email`, `password`) VALUES ('','XenaO','xena@xena.com','12345')";

    if(mysqli_query($success, $sql)){
        
    }else{
        echo 'query error: ' . mysqli_error($success);
    }

    ?>

    <h1>Confirmation Page</h1>
    <!-- <p>Thank you for your order < ? php echo $_POST["name"];?> <br>
    <p>Confirmation email sent to < ?php echo $_POST["email"];?> <br>
-->

<main id="cart-main">

    <div class="site-title text-center">
        <h1 class="font-title">Payment Done Successfully...!</h1>
    </div>

</main>

</body>
</html>