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

$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["uploadfile"]["name"]);
echo $fileName;
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $con->query("UPDATE product_details SET fldProductName='$p_name' , fldProductPrice='$p_cost' , fldUserName='$u_name' , fldPhoneNumber='$u_num' , fldProductDescription='$subject' , fldImage='$fileName' WHERE fldUserEmail='$email';");
            if($insert){
                header('Location: productdetails.php');
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>