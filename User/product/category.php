<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$user=$_SESSION['username'];
$email=$_SESSION['email'];
$pic=$_SESSION['pic'];
    

if(isset($_POST['sub']))
{
    $ct=$_POST['Category'];
    if($ct != "null")
    {
        header("location:product.php?pch='$ct'");
    }
    else
    {
        $str="Select any value";
    }
}
?>
<html>
    <head>
        <title>CategoryPage</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
        <link rel="stylesheet" href="css/navbar.css" type="text/css">
        <style>
            body
            {
                width: 100%;
                height: auto;
            }
            .category
            {
                display: flex;
                justify-content: center;
                margin-top: 10px;
            }
            .div1
            {
                position: relative;
                width: 99%;
                height: 45%;
                border-radius: 10px;
                margin-left: 10px;
                background-image: url('../../images/slider11.jpg')
            }
            .div2
            {
                position: relative;
                margin-top: 20px;
                width: 99%;
                height: 45%;
                border-radius: 10px;
                margin-left: 10px;
                background-image: url('../../images/website_chinos_1.jpg')
            }
            .cart_icon
                {   
                    width: 65px;
                    height: 65px;
                }
                .cart_btn
                {
                    height: 100%;
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border: none;
                    background-color: white;
                }
                .fa-cart-plus
                {
                    font-size: 30px;
                    color: black;
                }
        </style>
    </head>
    <body>
            <!-- Navbar -->
        <div class="navout">
            <div class="NavBar">
            <div >
                <a href="#"><img src="../../Admin/customerimage/<?php echo $pic;?>" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="../Home.php">Home</a></li>
                    <li class="Navlist"><a href="product.php">Product</a></li>
                    <li class="Navlist"><a href="../AboutUs.php">AboutUs</a></li>
                    <li class="Navlist"><a href="../Order/order.php">Order</a></li>
                </ul>
            </div>  
        </div>
        <div class="cart_icon">
                    <button class="cart_btn"><a class="cart_href" href="../Cart/cart.php"><i class="fa fa-cart-plus"></i></a></button>
        </div>
        </div>    
         <!--Select Category -->
            <div class="category" >
                <form action='<?php $SELF_PHP; ?>' method="POST">
                    <label><b>Select Category:-</b></label>
                <select name="Category">
                    <option value="null">Select option....</option>
                    <optgroup label="Shirt">
                        <option value="Formal Shirt">Formal Shirt</option>
                        <option value="Casual Shirt">Casual Shirt</option>
                        <option value="Denim Jacket">Denim Jacket</option>
                        <option value="Jacket">Jacket</option>
                    </optgroup>
                    <optgroup label="Pant">
                        <option value="Formal Pant">Formal Pant</option>
                        <option value="Casual Pant">Casual Pant</option>
                        <option value="Cargo Pant">Cargo Pant</option>
                        <option value="Trouser">Trouser</option>
                    </optgroup>
                    <optgroup label="Tshirt"><!-- comment -->
                        <option value="Half TShirt">Half Tshirt</option>
                    </opgroup> 
                    <optgroup label="Watch"><!-- comment -->
                        <option value="Casual Watch">Casual Watch</option>
                        <option value="Formal Watch">Formal Watch</option>
                    </opgroup>  
                </select>
                <button name="sub">Submit</button>
                </form>
            </div>
         
         <!--Body Content-->
            <label style='color:red;display: flex;justify-content: center;'><?php echo $str; ?></label>
            <a href="product.php?pch='Formal Shirt'">
            <div class="div1">
            </div></a>
            <a href="product.php?pch='Cargo Pant'">
            <div class="div2">
            </div></a>
    </body>
</html>
