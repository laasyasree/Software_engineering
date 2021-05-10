<title>All Products - Online Exchange System</title>
    <link rel="stylesheet" href="style.css">
</head>
<div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images\home.png" width="150px">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="index_guest.html">Logout</a></li>
                        <li><a href="help.html">Help</a></li>
                    </ul>
                </nav>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
        <h2> Cart </h2>
        <style>
            h2{
                padding-left:650px;
                background-color: darkred;
                color:white;
            }
            </style>
<?php

$con = mysqli_connect('localhost', 'root', '', 'cart');
			$sql = "SELECT * FROM cart ORDER BY id DESC";
            $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));	
			while( $record = mysqli_fetch_assoc($resultset) ) {
                $imageURL = 'uploads/'.$record["fldImage"];
			?>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  line-height: 200%;
}

/* Float four columns side by side */
.column {
    margin-left: 50px;
  position: relative;
  width: 70%;
  padding: 20px 20px;
}

/* Remove extra left and right margins, due to padding */
/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

button{
    background-color: darkred;
    color: white;
    padding: 10px 20px;
  border: none;
  cursor: pointer;
}

.smtg{
  padding-bottom: 50px;
  background-color: darkred;
  text-align: center;
  color: white;
  border-radius:0px;
  padding: 10px 20px;
}

.card1 img{
    max-width: 100%;
    height: 300px;
}

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 40px;
  border: 1px solid #888;
  width: 30%;
  height:150px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>


</style>
</head>
<div class="row">
<div class="column">
            <div class="card1" >
    <img src="<?php echo $imageURL; ?>" alt="" />
    <h5 class="card-title"><?php echo $record['fldProductName']; ?></h5>
    <p class="card-text">
    <?php echo $record['fldProductPrice']; ?>
    </p>
    <p class="card-text">
    <?php echo $record['fldProductDescription']; ?>
    </p>
    <button type="button" class="btn btn-primary" id="myButton"> Delete</button>
    <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
      <?php
      session_start(); 
      $_SESSION['name'] = $record['fldProductName'];
      $_SESSION['price'] = $record['fldProductPrice'];
      $_SESSION['pdesc']= $record['fldProductDescription'];
      $_SESSION['image']=$record['fldImage'];
      ?>
        location.href = "cartdelete.php";
    };
    </script>
  </div>
</div>
</div>
			<?php } ?>