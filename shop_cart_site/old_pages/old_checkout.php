<!DOCTYPE html>
<html>
<head>    
   
    <title>Payment</title>
    <link rel="stylesheet" href="reuse/style.css">

</head>
    <body>
        <?php require_once("./reuse/header.php"); ?>

        <input type = "hidden" name="command" />
        
    <form action ="confirm_purchase.php" method = "POST">
        <h1> Shipping Details</h1>

        <table border = "0" cellpadding = "2px">
            <tr><td>Your Name: </td><td><input type = "text" name="name" /></td></tr>
            <tr><td>Address: </td><td><input type = "text" name="address" /></td></tr>
            <tr><td>City: </td><td><input type = "text" name="city" /></td></tr>

            <tr><td>
                State: </td><td>
            <select class="form-control" name="state">                
                <option value=""> select state </option>                
                <option value="Alabama">Alabama</option> <option value="Alaska">Alaska</option> <option value="Arizona">Arizona</option> <option value="Arkansas">Arkansas</option> <option value="California">California</option> 
                <option value="Colorado">Colorado</option> <option value="Connecticut">Connecticut</option> <option value="Colorado">Colorado</option> <option value="Delaware">Delaware</option> <option value="Florida">Florida</option>
                <option value="Georgia">Georgia</option> <option value="Hawaii">Hawaii</option> <option value="Idaho">Idaho</option> <option value="Illinois">Illinois</option> <option value="Indiana">Indiana</option>
                <option value="Iowa">Iowa</option> <option value="Kansas">Kansas</option> <option value="Kentucky">Kentucky</option> <option value="Louisiana">Louisiana</option> <option value="Maine">Maine</option>
                <option value="Maryland">Maryland</option> <option value="Massachusetts">Massachusetts</option> <option value="Michigan">Michigan</option> <option value="Minnesota">Minnesota</option> <option value="Mississippi">Mississippi</option>
                <option value="Missouri">Missouri</option> <option value="Montana">Montana</option> <option value="Nebraska">Nebraska</option> <option value="Nevada">Nevada</option> <option value="New Hampshire">New Hampshire</option>
                <option value="New Jersey">New Jersey</option> <option value="New Mexico">New Mexico</option> <option value="New York">New York</option> <option value="North Carolina">North Carolina</option> <option value="North Dakota">North Dakota</option>
                <option value="Ohio">Ohio</option> <option value="Oklahoma">Oklahoma</option> <option value="Oregon">Oregon</option> <option value="Pennsylvania">Pennsylvania</option> <option value="Rhode Island">Rhode Island</option>
                <option value="South Dakota">South Dakota</option> <option value="Tennessee">Tennessee</option> <option value="Texas">Texas</option> <option value="Utah">Utah</option> <option value="Vermont">Vermont</option>
                <option value="Virginia">Virginia</option> <option value="Washington">Washington</option> <option value="West Virginia">West Virginia</option> <option value="Wisconsin">Wisconsin</option> <option value="Wyoming">Wyoming</option>

            </select>
             </td></tr>
            <!-- <tr><td>State: </td><td><input type = "text" name="state" /></td></tr> -->

            <tr><td>Zip Code: </td><td><input type = "text" name="zip" /></td></tr>
            <tr><td>Email: </td><td><input type = "text" name="email" /></td></tr>
            <tr><td>Phone number: </td><td><input type = "text" name="phone" /></td></tr>


        </table>

        <div class="col -50">
            <h1> Billing Details</h1>

        <table cellpadding = "2px">
            <tr><td>Card Number: </td><td><input type = "text" name="card_number" /></td></tr>
            <tr><td>Name on card: </td><td><input type = "text" name="card_name" /></td></tr>
            <tr><td>Expiration Date: </td><td><input type = "text" name="card_date" /></td></tr>
            <tr><td>CVV: </td><td><input type = "text" name="card_cvv" /></td></tr>

            </table>
        </div>
        <label>
            <input type = "checkbox" checked="checked" name="ship=bill"> Shipping address same as billing address <br><br>
        </label>
        <input type ="submit" value="continue to checkout " class="btn">
    </form>

    </body>
</html>

