<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$email=$_REQUEST['username'];
$uemail = $_REQUEST['uemail'];
$username=$_REQUEST['uname'];
$pay='';
require_once '../connection.php';
?>
<html>
    <head>
        <title>Order Page</title>
            <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
        <link rel="stylesheet" href="../css/navbar.css"/>
        
        <style>
                
                .order-body
                {
                    position: absolute;
                    height: 80%;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .search-order
                {
                    position: absolute;
                    height: 10%;
                    width: 50%;
                    top: 0px;
                    display: flex;
                    justify-content: center;
                }
                .order-content
                {
                    position: relative;
                    height: 90%;
                    width: 80%;
                    background-color: white;
                    display: block;
                    overflow: scroll;
                }
                .a_order
                {
                    height: 30%;
                    width: 80%;
                    border: outset;
                    margin: 25px auto;
                    background-color: rgb(204,255,204);
                    border-radius: 10px;
                }
                .a_order:hover
                {
                    box-shadow: 0px 0px 10px lightgreen;
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
                .contact
                {
                    position: relative;
                    width: 50%;
                    height: 200px; 
                    background-color: black;
                    top: 80%;
                    margin: 0 auto;
                    border-radius: 10px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    
                }
                #icon_contactus
                {
                    margin-left: 20px;
                    color: grey;
                }
                .checked
                {
                    color: orange;
                }
                ::-webkit-scrollbar
                {
                    display: none;
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
        <!-- NavBar -->
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
      <!-- Customer detail(Which customer you are seeing) -->
        <div class="cus_dtl">
            <span class="name"><b>User Name :-</b><?php echo $username;?></span>                    
            <span class="name"><b>Email :-</b><?php echo $uemail;?></span>            
        </div>
        
        <!-- Details about product -->
        <div class="order-body">
            <div class="order-content">
                <?php
                $sql="select * from ordertb where email='$uemail'";
                $result=$conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                      $oid=$row['orderno'];  
                      $dt=$row['odt'];
                      $pid=$row['pid'];
                      $oprice=$row['oprice'];
                      $sql="select * from product where pid='$pid'";
                      $result1=$conn->query($sql);
                      if($result1->num_rows>0)
                      {
                          while($row1=$result1->fetch_assoc())
                          {
                              $pname=$row1['pname'];
                              $img=$row1['image'];
                ?>
                
                
                <div class='a_order'>
                <a href='orderdetail.php?pno=<?php echo $pid; ?>&oid=<?php echo $oid; ?>&oprice=<?php echo $oprice;?>&uemail=<?php echo $uemail; ?>&username=<?php echo $username; ?>&email=<?php echo $email; ?>'>    
                    <table  >
                        <tr>
                            <th rowspan="4"><img src="../../Admin/productimage/<?php echo $img; ?>" width="150px" height="150px" alt="alt"/></th>
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
                        
                        <tr>
                            <th>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span></th>
                        </tr>
                    </table>
                </a>
                </div>
                
                <?php
                            }
                      }
                    }
                }
                ?>
            </div>
        </div>
        <!--Contact Us -->
        <div class="contact" id="ContactUS" style="">
                <i id='icon_contactus' class="fa fa-facebook">&ensp;|</i>
                <i id='icon_contactus' class="fa fa-twitter">&ensp;|</i>
                <i id='icon_contactus' class="fa fa-instagram">&ensp;|</i>
        </div>
    </body>
</html>
