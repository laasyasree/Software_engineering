<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '', 'signup');

// get the post records
$email = $_POST['email'];
$psw = $_POST['psw'];
$psw_repeat = $_POST['psw_repeat'];

if(strcmp($psw,$psw_repeat))
{
    header('Location: signup.html');
}
else{
// database insert SQL code
$sql = "INSERT INTO `signup` (`fldEmail`, `fldPassword`, `fldRepeatPassword`) VALUES ('$email', '$psw', '$psw_repeat')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
    header('Location: index.html');
}

}
?>