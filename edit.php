<?php
$con = mysqli_connect('localhost', 'root', '', 'product_uploads');

// get the post records
$uemail = $_POST['uemail'];
        
// insert in database 
$sql= "SELECT fldUserName FROM product_details WHERE fldUserEmail = '$uemail' ";
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
$record = mysqli_fetch_assoc($result);

if(!$check){
    header('Location: productdetails.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] , textarea{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: darkred;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<fieldset>
<form name="upload_product" method="POST" enctype="multipart/form-data" action="edit1.php">
  <div class="container">
    <h1>Edit</h1>
    <p>Please fill in this form to edit a product.</p>
    <hr>
	 <label for="product name"><b>Product name</b></label>
    <input type="text" value="Database Management Systems" name="p_name" id="p_name" required> 
    <label for="Product price"><b>Product price</b></label>
    <input type="text" value="500" name="p_cost" id="p_cost" required> 
    <label for="user name"><b>Name</b></label>
    <input type="text" value="example" name="u_name" id="u_name" required> 
    <label for="roll no"><b>Roll Number</b></label>
    <input type="text" value="AM.EN.U4CSE18XXX" name="rno" id="rno" required> 
    <label for="email"><b>Email</b></label>
    <input type="text" value="example@gmail.com" name="email" id="email" required>
    <label for="number"><b>Contact number</b></label>
    <input type="text" value="1234567890" name="u_num" id="u_num" required> 
    <label for="pd"><b>Product description</b></label>
    <textarea id="subject" name="subject" style="height:170px">Database Management Systems</textarea>
    <p> Image: product-4.jpg </p>
    <input type="file" name="uploadfile">
    <input type="submit" value="Edit" name="submit" class="registerbtn">
  </div>
</form>
</fieldset> 
</body>
</html>
