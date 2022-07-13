<?php
    $success = mysqli_connect('localhost', 'Aaron', 'test1', 'productdb');

    if(!$success){
        echo 'Connection Error: ' . mysqli_connect_error(); 
    }
?>