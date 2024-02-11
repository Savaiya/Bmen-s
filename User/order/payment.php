
<!-- This is Payment page-->
<?php 
session_start();
error_reporting(E_ALL ^ E_WARNING);
$user=$_SESSION['username'];
$email=$_SESSION['email'];
$pic=$_SESSION['pic'];
$pno=$_REQUEST['pno'];
date_default_timezone_set("Asia/Kolkata");
$dt=date("Y-m-d");
require_once '../connection.php';   
$sql="select * from product where pid='$pno'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $price=$row['price'];
        $sql1=" select * from login where email='$email'";
        $result1=$conn->query($sql1);
        if($result1->num_rows>0)
        {
            while($row=$result1->fetch_assoc())
        {
                $bal=$row['payment'];
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
        if(isset($_POST['sub']))
        {
            $pay=$_POST['payment'];
        if($pay == 'wallet')
        {
                    $bal=$bal-$total;
                    $sql2="insert into ordertb(pid,odt,email,oprice)value('$pno','$dt','$email','$total')";
                    if($conn->query($sql2)===TRUE)
                    {
                        $sql3="update login set payment='$bal' where email='$email'";
                        if($conn->query($sql3)===TRUE)
                        {
                        header("location:Confirmed.php");
                        }    
                    }
        }
        else
        {
            echo'<script>alert("Other options are not available right now")</script>';
        }
        }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>payment detail</title>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <link rel="stylesheet" href="css/payment.css" type="text/css"/>
        
    
    </head>

    <body>
        
        <!-- Payment Body -->
        <div class="payment-body">
            <div class="payment">
                <h5>Payment Details</h5>
            <form action="<?php $SELF_PHP; ?>" method="POST">
                <div class="payment-detail">
                    <table>
                        <tr><th align="right">Price:-</th><td><b>Rs.</b><?php echo $price ?></td></tr>
                        <tr><th>Delivery charges:-</th><td><b>Rs.</b><?php echo $dil ?></td></tr>
                        <tr id="cpn"><th>Coupon applied:-</th><td>0</td></tr>
                        <tr><th>Final Price:-</th><td><b>Rs.</b><?php  echo $total;?></td></tr>                     
                        
                    </table>   
                </div>
               
                <!-- Payment Options -->
                <div class="payment-option">
                    
                        
                        <div class="payment1">
                            <input type="radio" name="payment" value="wallet">
                            <label>&emsp;<b>BMen Wallet</b></label>
                            <div class="balance">
                                <i class="fa fa-rupee"></i><?php echo $bal;?>
                            </div>
                            
                        </div>
                        <div class="payment2">
                            <input type="radio" name="payment" value="other">
                            <label>&emsp;Other options</label>
                            <i class="fa fa-cc-paypal m-3"></i>
                            <i class="fa fa-credit-card m-1"></i>
                        </div>
                        <div class="btn">
                            <button name="sub" class="order-btn">Place Order</button>
                        </div>
                </div>
            </form>
            </div>
        </div>
         <?php
        }
        }
        else
        {
        echo '<script>alert("Your wallet is not active.....")</script>';
        }           
    }
        
    }
 else {
     echo '<script>alert("Num_rows is 0")</script>';
    }
    $conn->close();
                ?>
    </body>
</html>
