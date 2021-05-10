<?php
       // database connection code
       // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

       if(!isset($_SESSION)) 
       { 
           session_start(); 
       } 
       $con = mysqli_connect('localhost', 'root', '', 'cart');
       $name = $_SESSION['name'];
       $price = $_SESSION['price'];
       $desc =  $_SESSION['pdesc'];
       $image =  $_SESSION['image'];
       $sql = "INSERT INTO cart (fldProductName, fldProductPrice, fldProductDescription, fldImage) VALUES ('$name', '$price','$desc' ,'$image')";
       $rs = mysqli_query($con, $sql);
       
       if($rs)
       {
           header('Location:cart1.php');
       }
       
       ?>