<?php 
error_reporting(E_ALL ^ E_WARNING);
session_start();
$email=$_REQUEST['email'];
$ct=$_REQUEST['pch'];
?>
<html>
    <head>
        <title>Customer Table(Admin)</title>
         <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- Body and NavBar -->
            <link rel="stylesheet" href="css/product.css" type="text/css" />
            <link rel="stylesheet" href="css/navbar.css"/>
            
            <!-- /// -->
    <style>
        
        
    </style>
    </head>
    <body>
        
        <!-- Navbar Starts from here..... -->
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
            <div class="search">
                <form action="<?php $SELF_PHP; ?>" method="POST">
                    <input type="text" class="SearchBar" name="search" placeholder="Search....">
                    <input type="button" value="Search" name="sub" class="srch-btn">
                </form>
            </div>
        </div>
        </div>
        <!-- Navbar Ends here..... -->
        <!-- Add new Product -->
        <div class="mt-3">
            <table class="table" style="margin: auto;">
            <th>ADD New Product <a href="create.php?email=<?php echo $email; ?>"><button class="btn btn-outline-dark"><i class="fa fa-plus"></i>ADD</button></a></th>
            <th><a href="category.php?email=<?php echo $email; ?>" class='category'>Category</a></th>
        </table>
        </div>   
        <!-- Fetch Product  -->
        <div id="table">
<?php
require_once '../connection.php';
if($ct != null)
{
    $sql="select * from product where pch=$ct";
}
else
{
    $sql="SELECT * FROM product";
}
$result=$conn->query($sql);
if($result->num_rows>0)
{   
 while ($row=$result->fetch_assoc())
 {
     echo '<a href="view.php?pno='.$row['pid'].'&email='.$email.' ">';
     echo "<div class='table-con' >";
     echo '<table class="table-content" style="margin-top: 5px;">';
     echo '<th id="ro">';
     echo "<img src=" ."../productimage/". $row['image'] . " id='table-image' height='200px' width='200px'>";
     echo '</th>';
     echo '<tr >';
     
     echo "<td>" . $row['pid'] . "</td>";
     echo '</tr>';
     echo '<tr >';
     
     echo "<td><b>" . $row['Company'] . "</b></td>";
     echo '</tr>';
     echo '<tr >';
     
     echo "<td>" . $row['pname'] . "</td>";
     echo '</tr>';
     echo '<tr >';
     
     echo "<td>" . $row['pch'] . "</td>";
     echo '</tr>';
     echo '<tr >';
     
     echo "<td>"."Rs. " . $row['price'] . "</td>";
     echo '</tr>';
     echo "<td>";
     echo '<a id="icon" href="view.php?pno=' . $row['pid'] .'&email='.$email.'" class="fa fa-eye" title="view"></a>'; 
     echo '<a id="icon" href="update.php?pno=' . $row['pid'].'&email='.$email.'"  class="fa fa-pencil " title="update"></a>' ;
     echo '<a id="icon" href="delete.php?pno=' . $row['pid'] .'&email='.$email.'" class="fa fa-trash" title="delete"></a>';
     echo "</td>";
     echo"</tbody>";
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