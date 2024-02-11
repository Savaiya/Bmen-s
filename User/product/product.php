<?php 
error_reporting(E_ALL ^ E_WARNING);
session_start();
$user=$_SESSION['username'];
$email=$_SESSION['email'];
$pic=$_SESSION['pic'];
$ct=$_REQUEST['pch'];
$sort=$_POST['sort'];
?>
<html>
    <head>
        <title>Customer Table</title>
         <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- Body and NavBar -->
            <link rel="stylesheet" href="css/product.css" type="text/css" />
            <link rel="stylesheet" href="css/navbar.css"/>
            <!-- /// -->
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
            </style>
    </head>
    <body>
        <!-- NavBar -->
    <div class='navout'>
        <div class="NavBar">
            <div >
                <a href="#"><img src="../../Admin/customerimage/<?php echo $pic;?>" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="../Home.php">Home</a></li>
                    <li class="Navlist"><a href="category.php">Fashion</a></li>
                    <li class="Navlist"><a href="../AboutUs.php">About Us</a></li>
        <li class="Navlist"><a href="../Order/order.php">Order</a></li>
                </ul>
            </div>
            <div class="search">
                <form action="<?php $SELF_PHP; ?>" method="POST">
                    <input type="search" class="SearchBar" name="search" placeholder="Search....">
                    <input type="button" value="Search" name="sub" class="srch-btn">
                </form>
            </div>
        </div>
        <div class="cart_icon">
                    <button class="cart_btn"><a class="cart_href" href="../Cart/cart.php"><i class="fa fa-cart-plus"></i></a></button>
        </div>
    </div>
        <!-- Category -->
        <div class="mt-3">
        <table class="table" style="margin: auto;">
            <th><a href="category.php" class='category'>Category</a></th>
        </table>
        </div> 
        <!-- Sort Product -->
        <form action="<?php $SELF_PHP; ?>" method="POST">
        <div class="sort">
            <select name="sort">
                <option value="null">sort by...</option>
                <option value='pname'>A to Z</option>
                <option value='pname desc'>Z to A</option>
                <option value='price'>Price from Low to High</option>
                <option value='price desc'>Price from High to Low</option>
            </select>
            <button name="sub">Submit</button>
        </div>
        </form>
       
        <!-- Display Product -->
        <div id="table">
<?php
require_once '../connection.php';
if(isset($_POST['sub']))
{
    if($sort != null)
    {
        if($ct != null)
        {
        $sql="select * from product where pch=$ct order by $sort";
        }
        else
        {
            $sql="select * from product order by $sort";
        }
    }
    else
    {
        if($ct != null)
        {
            $sql="select * from product where pch='$ct'";
        }
        else
        {
            $sql="SELECT * FROM product";
        }
    }
}
else {
if($ct != null)
{
    $sql="select * from product where pch=$ct";
}
else
{
    $sql="SELECT * FROM product";
}
}
$result=$conn->query($sql);
if($result->num_rows>0)
{   
 while ($row=$result->fetch_assoc())
{
     echo '<a href="view.php?pno=' . $row['pid'] .'&pch='.$row["pch"].' ">';
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

</body>
</html>

 
