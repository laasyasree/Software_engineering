<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '', 'signup');

// get the post records

$psw = $_POST['psw'];
$psw_repeat = $_POST['rpsw'];

if(strcmp($psw,$psw_repeat))
{
    header('Location: reset.html');
}
else{
// database insert SQL code
$sql = "UPDATE signup SET fldPassword= '$psw', fldRepeatPassword='$psw_repeat'";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
    header('Location: login.html');
}

}
?>