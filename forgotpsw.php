<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '', 'signup');
// get the post records
$email = $_POST['email'];
$sques = $_POST['psw'];

// insert in database 
$sql= "SELECT * FROM signup WHERE fldEmail = '$email' AND fldSQues = '$sques' ";
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
    header('Location: reset.html');
}
else{
header('Location: login.html');
}

?>