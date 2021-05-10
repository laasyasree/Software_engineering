<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');




$con = mysqli_connect('localhost', 'root', '', 'face mask');

// get the post records
$name = $_POST['Name'];
$roll_no = $_POST['roll_number'];
$email = $_POST['email'];
$phone = $_POST['Phone_No'];
$password = $_POST['password1'];
$repassword = $_POST['password2'];

$statusMsg = '';

// File upload path
$targetDir = "images/";
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
            

            $insert = $con->query("INSERT INTO student_details (name,roll_number,email,phone_number,password,repeat_password,images) VALUES ('$name', '$roll_no', '$email', '$phone', '$password', '$repassword','$fileName')");
            if($insert){
                header('Location: login.php');
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