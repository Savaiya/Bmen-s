<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$user=$_SESSION['username'];
$pic=$_SESSION['pic'];
$email = $_REQUEST['email'];

if(isset($_POST['sub']))
{
    $ct=$_POST['Category'];
    if($ct != "null")
    {
        header("location:product.php?pch='$ct'&email= $email");
    }
    else
    {
        $str="First select any value";
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
                background-image: url('../../images/slider11.jpg');
            }
            .div2
            {
                position: relative;
                margin-top: 20px;
                width: 99%;
                height: 45%;
                border-radius: 10px;
                margin-left: 10px;
                background-image: url('../../images/website_chinos_1.jpg');
            }
        </style>
    </head>
    <body>
            <!-- Navbar-->
        <div class="navout">
        <div class="NavBar">
            <div >
                <a href="../Profile.php?email=<?php echo $email; ?>"><img src="../customerimage/images/it.jpg" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="../Home.php?email=<?php echo $email; ?>">Home</a></li>
                    <li class="Navlist"><a href="product.php?email=<?php echo $email; ?>">Product</a></li>
                    <li class="Navlist"><a href="../Customer/customer.php?email=<?php echo $email; ?>">Customer</a></li>
                    
                </ul>
            </div>  
        </div>
    </div>
            
            <!-- Select Option for category -->
            
            <div class="category" >
                <form action='<?php $SELF_PHP; ?>' method="POST">
                    <label><b>Select Category:-</b></label>
                <select name="Category">
                    <option value="null">Select option....</option>
                    <optgroup label="Shirt">
                        <option value="Formal Shirt">Formal Shirt</option>
                        <option value="Casual Shirt">Casual Shirt</option>
                    </optgroup>
                    <optgroup label="Pant">
                        <option value="Formal Pant">Formal Pant</option>
                        <option value="Casual Pant">Casual Pant</option>
                        <option value="Cargo Pant">Cargo Pant</option>
                        <option value="Trouser">Trouser</option>
                    </optgroup>
                </select>
                <button name="sub">Submit</button>
                </form>
            </div>
            
            <!-- Body of content -->
            <label style='color:red;display: flex;justify-content: center;'><?php echo $str; ?></label>
            <a href="product.php?pch='Formal Shirt'&email=<?php echo $email; ?>">
            <div class="div1">
                
            </div></a>
            <a href="product.php?pch='Cargo Pant'&email=<?php echo $email; ?>">
            <div class="div2">
            </div></a>
    </body>
</html>
