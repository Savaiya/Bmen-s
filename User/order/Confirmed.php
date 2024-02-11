<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$user=$_SESSION['username'];
$email=$_SESSION['email'];
$pic=$_SESSION['pic'];
?>
<html>
    <head>
        <title>Confirmed</title>
        <meta charset = "utf-8">  
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">  
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        
        <link rel="stylesheet" href="../css/navbar.css" type="text/css"/>
        <style>
            
            .sort
            {
                display: flex;
                justify-content: center;
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
            .confirm-body
            {
                position: relative;
                height: 80%;
                width: 100%;
               
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #label
            {
                position: relative;
                font-size: 40px;
                color: black;
                font-family: Apple Chancery, cursive;
            }
            span
            {
                color: goldenrod;
            }
            .confirm
            {
                height: 50%;
                width: 50%;
                display: flex;
                justify-content: center;
            }
            #order-label
            {
                position: absolute;
                margin-top: 100px;
            }
            #order-btn
            {
                color: black;
            }
        </style>
    </head>
    <body>
        <div class='navout'>
        <div class="NavBar">
            <div >
                <a href="../Profile.php"><img src="../../Admin/customerimage/<?php echo $pic;?>" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="../Home.php">Home</a></li>
                    <li class="Navlist"><a href="../product/product.php">Fashion</a></li>
                    <li class="Navlist"><a href="../AboutUs.php">About Us</a></li>
                    <li class="Navlist"><a href="order.php">Order</a></li>
                </ul>
            </div>
            
        </div>
        <div class="cart_icon">
                    <button class="cart_btn"><a class="cart_href" href="../Cart/cart.php"><i class="fa fa-cart-plus"></i></a></button>
        </div>
    </div>   
        
        <!-- Confirmation -->
        <div class="confirm-body">
            <div class="confirm">
                <label id="label"><span>Hurry!!</span>Your order has been successfully placed...</label><br>
                <label id="order-label">Go to <a href="order.php"  id="order-btn">order </a>for order status</label>
            </div>
        </div>
    </body>
</html>
