<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$user=$_SESSION['username'];
$email=$_SESSION['email'];
$pic=$_SESSION['pic'];
$pno=$_REQUEST['pno'];
$pch=$_REQUEST['pch'];

require_once '../connection.php';
if(isset($_POST['add_cart']))
    {
        if($email==null)
        {
            header("location:../../login.php");
        }
        else
        {
            try{
                    $sql="insert into cart(pno,email)value('$pno','$email')";
                    if($conn->query($sql)===TRUE)
                    {
                        header("location:../Cart/cart.php");
                    }
                        else {
                            $str="something went wrong";
                        }
            }
            catch(Exception $e)
            {
                echo '<script>alert("Product already in cart")</script>';
            }
        }
    }

?>

<html>
    <head>
        <title>View Page</title>
        <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <!--navbar-->
            <link rel="stylesheet" href="../css/navbar.css" type="text/css">
            <!--...........-->
            <link rel="stylesheet" href="css/view.css" type="text/css"/>
            
            <style>
                
            </style>
            
    </head>
    <body>
        <!-- Navbar starts from here -->
        <div class="navout">
        <div class="NavBar">
            <div >
                <a href="#"><img src="../../Admin/customerimage/<?php echo $pic;?>" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="../Home.php">Home</a></li>
                    <li class="Navlist"><a href="product.php">Product</a></li>
                    <li class="Navlist"><a href="../AboutUs.php">About Us</a></li>
                    <li class="Navlist"><a href="../Order/order.php">Order</a></li>
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
                    <button class="cart_btn"><a class="cart_href" href="../Cart/cart.php"><i class="fa fa-cart-plus"></i></a></button>
            </div>
        </div>
        
<?php


$sql1="select * from product where pid=$pno";
$result1=$conn->query($sql1);
if($result1->num_rows>0)
{
    while($row=$result1->fetch_assoc())
    {
?>
        
        <!-- Product Detail -->
        <div class="main_body">
            <div class="content"> 
                <div class="image_body">
                    <div class="image">
                        <img src="../../Admin/productimage/<?php echo $row['image']; ?> " width="100%" height="90%" />
                    </div>
                </div>
                <div class="productdtl_body">
                    <div class="Product_detail">
                        <table id="table">
                            <tr>
                                <th><?php echo $row['Company']; ?></th>
                            </tr>
                            <tr>
                                <td id="td"><?php echo $row['pname']; ?></td>
                            </tr>
                            <tr>
                                <td id="td"><?php echo $row['price']; ?></td>
                            </tr>
                            <tr>
                                <td id="td"><?php echo $row['pch']; ?></td>
                            </tr>

                            <tr>
                                <td><span class='del_text'> Delivery expected within 7 days&ensp;</span><i class='fa fa-truck'></i></td>
                            </tr>
                            <tr>
                                <td><span class='del_text'> return within 5 days&ensp;</span><i class='fa fa-bag'></i></td>
                            </tr>
                            <tr>
                                <td> <?php echo $row['detail']; ?></td>
                            </tr>
<?php   }} ?>
                        </table>
                    </div>
                    <div class="button">
                        <div class="cart"><form action="<?php $SELF_PHP;?>" method="post"><button class='atc_btn' name="add_cart"><i class='fa fa-cart-plus'>&ensp;</i><b>Add to Cart</b></button></form></div>
                    <?php echo '<a href="../order/updateaddress.php?pno='. $pno .'" class="order"><button class="order_btn"><b>Order</b></button></a>'?>
                    </div>
                </div>
            </div>
            
            <!-- Suggestion for Products-->
            <div class="suggest">
                <div class="suggest_head">
                    <h4>Suggestion</h4>
                </div>
                <div class="suggestion_content">
                <?php
                $sql2="select * from product where pch='$pch'";
                $result2=$conn->query($sql2);
                if($result2->num_rows>0)
                {
                    while($row=$result2->fetch_assoc())
                    {                
                        echo '<a id="table_a" href="view.php?pno=' . $row['pid'] .'&pch='.$row["pch"].' ">';
                        echo '<div class="table-conn" >';
                        echo '<table class="table-content" style="margin-top: 5px;">';
                        echo '<tbody>';
                        echo '<th id="ro">';
                        echo "<a href='view.php?pno=" . $row["pid"] . "&pch=".$row["pch"]."'><img src=" ."../../Admin/productimage/". $row['image'] . " id='table-image' height='200px' width='200px'></a>";
                        echo '</th>';
                        echo '<tr >';
                        echo "<td><b>" . $row['Company'] . "</b></td>";
                        echo '</tr>';
                        echo '<tr >';
                        echo "<td>" . $row['pname'] ." | " . $row['pch'] . "</td>";
                        echo '</tr>';
                        echo '<tr >';
                        echo "<td>"."Rs. " . $row['price'] . "</td>";
                        echo '</tr>';
                        echo '</tbody>';
                        echo"</table>";
                        echo '</div>';
                        echo '</a>';
                    }
                }
                $conn->close();
                ?>
                   </div>
            </div>
            <div class="contact" id="ContactUS" style="position: absolute;width: 50%;height: 200px; background-color: black;margin-top: 60%; border-radius: 10px;">
                <i id='icon_contactus' class="fa fa-facebook">&ensp;|</i>
                <i id='icon_contactus' class="fa fa-twitter">&ensp;|</i>
                <i id='icon_contactus' class="fa fa-instagram">&ensp;|</i>
            </div>
            
        </div>  
    </body>
</html>

