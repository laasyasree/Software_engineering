<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '', 'signup');
$con1 = mysqli_connect('localhost', 'root', '', 'login');
// get the post records
$uname = $_POST['uname'];
$psw = $_POST['psw'];

// insert in database 
$sql= "SELECT * FROM signup WHERE fldEmail = '$uname' AND fldPassword = '$psw' ";
$sql1 = "INSERT INTO login (`fldUserName`, `fldPassword`) VALUES ('$uname', '$psw')";
$rs = mysqli_query($con1, $sql1);
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
    header('Location: index.html');
}
else{
header('Location: login.html');
}

?>