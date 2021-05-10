<style>
    .product_wrapper {
 float:left;
 padding: 10px;
 text-align: center;
 }
.product_wrapper:hover {
 box-shadow: 0 0 0 2px #e5e5e5;
 cursor:pointer;
 }
.product_wrapper .name {
 font-weight:bold;
 }
.product_wrapper .buy {
 text-transform: uppercase;
 background: #F68B1E;
 border: 1px solid #F68B1E;
 cursor: pointer;
 color: #fff;
 padding: 8px 40px;
 margin-top: 10px;
}
.product_wrapper .buy:hover {
 background: #f17e0a;
 border-color: #f17e0a;
}
.message_box .box{
 margin: 10px 0px;
 border: 1px solid #2b772e;
 text-align: center;
 font-weight: bold;
 color: #2b772e;
 }
.table td {
 border-bottom: #F0F0F0 1px solid;
 padding: 10px;
 }
.cart_div {
 float:right;
 font-weight:bold;
 position:relative;
 }
.cart_div a {
 color:#000;
 } 
.cart_div span {
 font-size: 12px;
 line-height: 14px;
 background: #F68B1E;
 padding: 2px;
 border: 2px solid #fff;
 border-radius: 50%;
 position: absolute;
 top: -1px;
 left: 13px;
 color: #fff;
 width: 20px;
 height: 20px;
 text-align: center;
 }
.cart .remove {
 background: none;
 border: none;
 color: #0067ab;
 cursor: pointer;
 padding: 0px;
 }
.cart .remove:hover {
 text-decoration:underline;
 }
    </style>

<?php
$con = mysqli_connect("localhost", "root" , "" , "product_uploads");
$sql = "SELECT fldProductName, fldProductPrice, fldUserName, fldRollNumber, fldUserEmail, fldPhoneNumber, fldProductDescription, fldImage FROM product_details ORDER BY id DESC";
$resultset = mysqli_query($con, $sql);
session_start();
$status="";
if (isset($_POST['fldRollNumber']) && $_POST['fldRollNumber']!=""){
$rno = $_POST['fldRollNumber'];
$result = mysqli_query(
$con,
"SELECT * FROM `products_details` WHERE `fldRollNumber`='$rno'"
);
$record = mysqli_fetch_assoc($resultset);
$name = $record['fldProductName'];
$rno = $record['fldRollNumber'];
$price = $record['fldProductPrice'];
$image = 'uploads/'.$record['fldImage'];
 
$cartArray = array(
 $rno=>array(
 'fldProductName'=>$name,
 'fldRollNumber'=>$rno,
 'fldProductPrice'=>$price,
 'quantity'=>1,
 'fldImage'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($rno,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}

if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>


<div class="cart_div">
<a href="cart1.php"><img src="images/cart.png" /> Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<?php
$result = mysqli_query($con,"SELECT * FROM `products_details`");
while($record = mysqli_fetch_assoc($resultset)){
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$record['fldRollNumber']." />
    <div class='image'><img src='".$image."' /></div>
    <div class='name'>".$record['fldProductName']."</div>
    <div class='price'>$".$record['fldProductPrice']."</div>
    <button type='submit' class='buy'>Buy Now</button>
    </form>
    </div>";
        }
mysqli_close($con);
?>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
 