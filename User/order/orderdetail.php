<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$user=$_SESSION['username'];
$email=$_SESSION['email'];
$pic=$_SESSION['pic'];
$pno=$_REQUEST['pno'];
$oid = $_REQUEST['oid'];
$opr=$_REQUEST['oprice'];

require_once '../connection.php';
if(isset($_POST["ord_cncl"]))
{
    
    
    $sql="select * from login where email='$email'";
    $result = $conn->query($sql);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $bal=$row['payment'];
        }
        $bal += $opr;
    
    $sql1="select * from ordertb";
    $result1=$conn->query($sql1);
    if($result1->num_rows>0)
    {
    $sql2 = "delete from ordertb where orderno=$oid";
    
    if($conn->query($sql2) === TRUE)
    {
        $sql3="update login set payment = $bal where email='$email'";
        {
        if($conn->query($sql3) === TRUE)
        {
            header("location:order.php");
        }
        else {
            header("location:orderdetail.php");
        }
        }
    }
    else {
        header("location:orderdetail.php");
    }
    }
    }
}


?>

<html>
    <head>
        <title>Orderdetail</title>
            <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <link rel="stylesheet" href="../css/navbar.css"/>
            <style>
                .body{
                    position: relative;
                    width: 80%;
                    margin: 20px auto;
                    height: 90%;
                    display: flex;
                    justify-content: center;
                    }
                .content
                {
                    width: 80%;
                    height: 80%;
                    display: block;
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
                
                table
                {
                    height: 100%;
                    width: 100%;
                    
                }
                th
                {
                    width: 50%; 
                    text-align: center;
                }
                .a_order
                {
                    position: relative;
                    height: 30%;
                    width: 100%;
                    border: outset;
                    border-radius: 10px;
                }
                .a_order:hover
                {
                    box-shadow: 0px 0px 10px lightgreen;
                }
                .payment-detail
                {
                    margin-top: 2%;
                    position: relative;
                    height: 40%;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    border-left: groove;
                    border-right: groove;
                }
            </style>
    </head>
    <body>
        <!-- NavBar -->
        <div class="navout">
        <div class="NavBar">
            <div >
                <a href="../Profile.php"><img src="../../Admin/customerimage/<?php echo $pic;?>" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="../Home.php">Home</a></li>
                    <li class="Navlist"><a href="../product/product.php">Product</a></li>
                    <li class="Navlist"><a href="../AboutUs.php">About Us</a></li>
                    <li class="Navlist"><a href="../Order/order.php">Order</a></li>
                </ul>
            </div>
        </div>
            <div class="cart_icon">
                    <button class="cart_btn"><a class="cart_href" href="../Cart/cart.php"><i class="fa fa-cart-plus"></i></a></button>
            </div> 
        </div>
        
        <!-- Order Details Fetch -->
        <?php 
        
        $sql4="select * from product where pid=$pno";
        $result2=$conn->query($sql4);
        if($result2->num_rows>0)
        {
            while($row=$result2->fetch_assoc())
            {
                $img=$row['image'];
                $pname=$row['pname'];
                $price = $row['price'];
                $pch = $row['pch'];
                $sql1="select * from ordertb";
                $result3=$conn->query($sql1);
                if($result3->num_rows>0)
                {
                    while($row=$result3->fetch_assoc())
                    {
                        $dt=$row['odt'];
                        
                        if($price>499)
                        {
                                $dil=40;
                                $total=$price+$dil;
                        }
                        else
                        {
                            $dil=0;
                            $total=$price+$dil;
                        }       
        ?>
        <div class="body">
            <div class="content">
                <div class='a_order'>
                <a href='../product/view.php?pno=<?php echo $pno; ?>&pch=<?php echo $pch ?>'>    
                    <table  >
                        <tr>
                            <th rowspan="4"><img src="../../Admin/productimage/<?php echo $img; ?>" width="150px" height="150px"/></th>
                        </tr>
                        <tr>
                            <td>O.Id. :- <?php echo $oid;?></td>
                        </tr>
                        <tr>
                            <td><b>Product was ordered on <?php echo $dt;?></b></td>
                        </tr>
                        <tr>
                            <td><?php echo $pname; ?></td>
                        </tr>
                    </table>
                </a>
                </div>
                
                <!-- Billing Detail -->
                    <h5>Payment Details</h5>
                <div class="payment-detail">
                    <table>
                        <tr><th align="right">Price:-</th><td><b>Rs.</b><?php echo $price ?></td></tr>
                        <tr><th>Delivery charges:-</th><td><b>Rs.</b><?php echo $dil ?></td></tr>
                        <tr id="cpn"><th>Coupon applied:-</th><td>0</td></tr>
                        <tr><th>Final Price:-</th><td><b>Rs.</b><?php  echo $total;?></td></tr>                     
                        
                    </table>   
                </div>
                    <form action="<?php $SELF_PHP;?>" method="POST">
                        <button type="submit" name="ord_cncl">Cancel Order</button>
                    </form>
            </div>
            
        </div>
        <?php
                    }
                }
         }
        }
$conn->closed();
        
        ?>
        
    </body>
</html>
