<?php
    $success = mysqli_connect('localhost', 'Aaron', 'test1', 'customer_log');

    if(!$success){
        echo 'Connection Error: ' . mysqli_connect_error(); 
    }
?>