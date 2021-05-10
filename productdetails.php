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
                <a href="cart1.php">
                <img src="images/cart.png" width="30px" height="30px">
</a>
                <img src="images/menu.png" class="menu-icon">
            </div>
        </div>
<?php

$con = mysqli_connect('localhost', 'root', '', 'product_uploads');
			$sql = "SELECT * FROM product_details ORDER BY id DESC";
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
    <button type="button" class="btn btn-primary" id="cartButton"> Add to cart</button>
    <script type="text/javascript">
    document.getElementById("cartButton").onclick = function () {
      <?php
      session_start(); 
      $_SESSION['name'] = $record['fldProductName'];
      $_SESSION['price'] = $record['fldProductPrice'];
      $_SESSION['pdesc']= $record['fldProductDescription'];
      $_SESSION['image']=$record['fldImage'];
      ?>
        location.href = "cart.php";
    };
    </script>
    <button type="button" class="btn btn-primary" id="myButton"> Connect</button>
    <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "chat.html";
    };
</script>
<button type="button" class="btn btn-primary" id="myButton1"> Edit</button>
<form name="edit" method="post" action="edit.php" >
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <label for="uname"><b>Email id</b></label><br>
    <input type="text" placeholder="Seller email id" name="uemail" required> 
    <input type="submit" class="smtg" value="Check" >
  </div>
</div>
  </form>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myButton1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

  </div>
</div>
</div>
			<?php } ?>