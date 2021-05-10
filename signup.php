<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '', 'signup');

// get the post records
$uname = $_POST['uname'];
$name = $_POST['name'];
$pnumber = $_POST['pnumber'];
$rollno = $_POST['rollno'];
$email = $_POST['email'];
$sques = $_POST['sques'];
$psw = $_POST['psw'];
$psw_repeat = $_POST['psw_repeat'];

if(strcmp($psw,$psw_repeat))
{
    header('Location: signup.html');
}
else{
// database insert SQL code
$sql = "INSERT INTO `signup` (`fldUserName`, `fldName`, `fldPhone`, `fldRollNo`, `fldEmail`, `fldSQues`,  `fldPassword`, `fldRepeatPassword`) VALUES ('$uname', '$name', '$pnumber', '$rollno', '$email', '$sques', '$psw', '$psw_repeat')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
    header('Location: login.html');
}

}
?>