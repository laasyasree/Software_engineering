<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '', 'product_uploads');

// get the post records
$p_name = $_POST['p_name'];
$p_cost = $_POST['p_cost'];
$u_name = $_POST['u_name'];
$email = $_POST['email'];
$u_num = $_POST['u_num'];
$subject = $_POST['subject'];

// database insert SQL code
$sql = "INSERT INTO `product_details` (`fldProductName`, `fldProductPrice`, `fldUserName`, `fldUserEmail`, `fldPhoneNumber`, `fldProductDescription`) VALUES ('$p_name', '$p_cost', '$u_name','$email', '$u_num', '$subject')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Product details Inserted";
}

?>