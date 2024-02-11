<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$user=$_SESSION['username'];
$email=$_REQUEST['email'];
$pic=$_SESSION['pic'];
$pno=$_REQUEST['pno'];
$oid = $_REQUEST['oid'];
$opr=$_REQUEST['oprice'];
$uemail=$_REQUEST['uemail'];
$username=$_REQUEST['username'];
require_once '../connection.php';


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
                .cus_dtl
                {
                    
                    margin: auto;
                    width: 80%;
                    height: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }               
                .name
                {                    
                    width: 50%;
                    text-align: center;
                }
            </style>
    </head>
    <body>
        <!--NavBar -->
        <div class="navout">
        <div class="NavBar">
            <div >
                <a href="../Profile.php?email=<?php echo $email; ?>"><img src="../../Admin/customerimage/<?php echo $pic;?>" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="../Home.php?email=<?php echo $email; ?>">Home</a></li>
                    <li class="Navlist"><a href="../Product/product.php?email=<?php echo $email; ?>">Product</a></li>
                    <li class="Navlist"><a href="../customer/customer.php?email=<?php echo $email; ?>">Customer</a></li>
                </ul>
            </div>
        </div>
        </div>
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
                <!-- Customer Detail(which customer you are seeing) -->
                <div class="cus_dtl">
                <span class="name"><b>User Name :-</b><?php echo $username;?></span>                    
                <span class="name"><b>Email :-</b><?php echo $uemail;?></span>            
            </div>
                <div class='a_order'>
                <a href='../Product/view.php?pno=<?php echo $pno; ?>&pch=<?php echo $pch ?>&email=<?php echo $email; ?>'>    
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
