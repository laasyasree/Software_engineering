<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '', 'help');

// get the post records
$firstname= $_POST['firstname'];
$lastname = $_POST['lastname'];
$country = $_POST['country'];
$subject = $_POST['subject'];


$sql = "INSERT INTO help (firstname, lastname, country, subject ) VALUES ('$firstname', '$lastname','$country' ,'$subject')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
    header('Location: index.html');
}
?>