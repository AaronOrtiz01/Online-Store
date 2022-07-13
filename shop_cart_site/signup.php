<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="reuse/style.css">

    <title>sign-up</title>
</head>
<body>
    <?php require_once("./reuse/header.php"); 
          require_once 'db_connect.php';
    ?>
    <div class="container">
    <div class="row text-center py-5">
    <div class="header">
  	    <h2>Sign-up</h2>
    </div>
        <form method="post" action="checksignup.php">

            <label>Enter Username: </label>
            <input type="text" name="username" placeholder="Enter Name"></label></br>
        
            <label>Enter Email: </label>
            <input type="text" name="email" placeholder="Enter Email Address:"></label></br>

            <label>Enter Password: </label>
            <input type="password" name="password" placeholder="Enter Password:"></label></br>

            <label>Confirm Password</label>
  	        <input type="password" name="password_2" placeholder="Re-enter Password:"></br>

           <!-- <button type="submit" class="btn" name="reg_user">Register</button></br> -->

            <input type ="submit" value="Register" class="btn">

            <p>
                Already a member? <a href="login.php">Login</a></br>
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