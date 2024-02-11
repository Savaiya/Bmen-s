
<!-- User -->
<?php

session_start();
error_reporting(E_ALL ^ E_WARNING);
$email = $_SESSION['email'];
$user = $_SESSION['username'];
$pic=$_SESSION['pic'];

?>
<html>
    <head>
        <title>User</title>
            <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            
            <link rel="stylesheet" href="User/css/navbar.css" type="text/css"/>
            
            <style>
                .cart_icon
                {   
                    width: 65px;
                    height: 65px;
                    margin: auto 0;
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
                .logout_button
                {
                    margin: auto 0;                    
                }
                .btn_lo
                {
                    width:auto;
                    height:25px;
                    background-color: rosybrown;
                    border-radius: 5px;
                    border-style: solid;
                }
                .body_prd
                {
                    position: relative;
                    width:100%;
                    height: 1000px;
                    margin-top: 10px;
                    
                }
                .item1{
                    grid-area: header;
                    background-image: url("images/bg4.jpg"); 
                    background-size: 1000px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    height: 600px;
                }
                .box
                {
                    width: 80%;
                    height: 80%;
                    background-color: rgba(250,250,250,0.3);
                    font-size: 50px;
                    color: #ccffcc;
                    text-align:center;
                }
                .lang_used
                {
                    font-size: 20px;
                    color: whitesmoke;
                    text-decoration: none;
                }
                #li
                {
                    list-style-type: none;
                }
                .item2{
                    grid-area: menu;
                    width: 100%;
                    height: 800px;
                    background-image: url("images/bg5pant.jpg");
                    background-size: 100% 800px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .box2
                {
                    width: 80%;
                    height: 80%;
                    background-color: rgba(250,250,250,0.3);
                    color: #ccffcc;
                    text-align:center;
                }
                .item3{
                    grid-area: main;
                    width: 100%;
                    height: 800px;
                    background-image: url("images/bg7.jpg");
                    background-size: 100% 800px;
                    object-fit: contain;
                    
                }
                .box3
                {
                    width: 70%;
                    height: 70%;
                    background-color: rgba(250,250,250,0.3);
                    color: #ccffcc;
                    text-align:center;
                    
                }
                .item4{
                    grid-area: right;
                    width: 100%;
                    height: 800px;
                    background-image: url("images/bg9.jpg");
                    background-size: 100% 800px;
                    object-fit: contain;
                }                
                .item5{
                    grid-area: bottom;
                    width: 100%;
                    height: 800px;
                    background-image: url("images/bg8.jpg");
                    background-size: 100% 800px;                    
                }
                
                .grid-container
                {
                    display: grid;
                    grid: 
                    'header header header header header header'
                    'header header header header header header'
                    'menu menu main main main main'
                    'menu menu main main main main'
                    'menu menu main main main main'
                    'bottom bottom bottom bottom right right'
                    'bottom bottom bottom bottom right right'
                    'bottom bottom bottom bottom right right';
                    grid-column-gap:20px;
                    grid-row-gap:20px;
                    
                }
                .item1 , .item2 , .item3 , .item4 , .item5
                {
                    border-radius: 10px;                    
                }                
                
            </style>
    </head>  
    <body>  
            <!DOCTYPE html>
        <div class='navout'>
        <div class="NavBar">
            <div >
                <a href="User/Profile.php"><img src="../Admin/customerimage/<?php echo $pic; ?>" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="User/Home.php">Home</a></li>
                    <li class="Navlist"><a href="User/product/product.php">Product</a></li>
                    <li class="Navlist"><a href="User/AboutUs.php">About Us</a></li>
                    <li class="Navlist"><a href="User/order/order.php">Order</a></li>
                </ul>
            </div>
            <div class="search">
                <form action="<?php $SELF_PHP; ?>" method="POST">
                    <input type="text" class="SearchBar" name="search" placeholder="Search....">
                    <input type="button" value="Search" name="sub" class="srch-btn">
                </form>
            </div>
        </div>
        <div class="cart_icon">
            <button class="cart_btn"><a class="cart_href" href="Cart/cart.php"><i class="fa fa-cart-plus"></i></a></button>
        </div>
            <?php
            
            if($user !='' )
            {
            ?>
            <div class=" logout_button">
                <a href="../logout.php" ><button class="btn_lo" ><i class="fa fa-sign-out"></i></button><a/>
            </div>
            <?php
            }
            
                
            ?>
    </div>

    <div class="body_prd">
        <div class="grid-container">
            <div class="item1">
                <div class="box">This a E-commerce Website Made by Ankit Savaiya 
                <div class="lang_used">
                <p>Languages used in this website are:-</p>
                <ul>
                    <li id="li">HTML/css</li>
                    <li id="li">PHP</li>
                    <li id="li">Mysql</li>
                    <li id="li">Bootstrap</li>
                </ul>
                </div>
                </div>
            </div>
            <div class="item2">
                <div class="box2">
                </div>
            </div>
            <div class="item3"><div class="box3">
                </div><!-- comment --></div>
            <div class="item4"></div>
            <div class="item5"></div>
                
            </div>
            
        </div>
        
    </div>
    </body>
</html>