<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="reuse/style.css">

    <title>login</title>
</head>
<body>
    <?php require_once("./reuse/header.php"); ?>
    <div class="container">
    <div class="row text-center py-5">

    <div class="header">
  	    <h2>Login</h2>
    </div>
        <form method="post" action="checklogin.php">

            <label>Enter Username: </label>
            <input type="text" name="username" placeholder="Enter Name"></label></br>

            <label>Enter Password: </label>
            <input type="password" name="password" placeholder="Enter Password:"></label></br>

            <button type ="submit" value="login" class="btn">Login</button>

            <p>
                Need an account? <a href="signup.php">Sign up</a></br>
            </p>

        </form>
    </div>
</div>

</br>
<footer> 
    <?php require_once("reuse/footer.php")?>
</footer>


</body>
</html>