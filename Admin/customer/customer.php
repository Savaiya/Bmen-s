<?php

error_reporting(E_ALL ^ E_WARNING);
session_start();
$email=$_REQUEST['email'];
$pic=$_SESSION['pic'];

?>
<html>
    <head>
        <title>Customer Table</title>
         <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/navbar.css" type="text/css    "/>
    <style>
        th
        {
            height: 40px;
        }
        a
        {
            text-decoration: none;
            margin: 5px;
        }
        .fa-eye
        {
            color: goldenrod;
        }
        .fa-trash
        {
            color: red;
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
                    <li class="Navlist"><a href="../Product/product.php?email=<?php echo $email; ?>">Product</a></li>
                    <li class="Navlist"><a href="customer.php?email=<?php echo $email; ?>">Customer</a></li>
                    
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
        
        <!--Add new Customer-->
        <div class="mt-3">
            <table style="margin: auto;" class="stripped">
            <th>ADD New Customer <a href="create.php?email=<?php echo $email; ?>"><button class="btn btn-outline-primary"><i class="fa fa-plus">ADD</i></button></a></th>
        </table>
        </div>  
        <!--Customer Detail-->
            <table class="table table-bordered table-responsive" style="margin-top: 5px;">
                <thead>
                <tr class="table table-info">
                <th>Customer Number</th>
                <th>Customer Email</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Customer Photo</th>
                <th>Customer Address</th>
                <th></th>
                <th>Action</th>
                </tr>
            </thead>
            
<?php
require_once '../connection.php';
$sql="SELECT * FROM login";
$result=$conn->query($sql);
if($result->num_rows>0)
{
 while ($row=$result->fetch_assoc())
 {
     echo'<tbody >';
     echo'<tr class="table table-success">';
     echo "<td>" . $row['uno'] . "</td>";
     echo "<td>" . $row['email'] . "</td>";
     echo "<td>" . $row['uname'] . "</td>";
     echo "<td>" . $row['phone'] . "</td>";
     echo "<td>" . "<img src=" . "../customerimage/" . $row['image'] . " height='50px' width='50px'>". "</td>";
     echo "<td>" . $row['address'] . "</td>";
     echo "<td>"."<a href='../Order/order.php?uemail=".$row['email']."&uname=".$row['uname']."&email=".$email."' style='color:grey'><b>Orders</b></a>" ."</td>";
     echo "<td>";
     echo '<a href="view.php?uemail=' . $row['email'] .'&email='.$email.'" class="fa fa-eye" title="view"></a>'; 
     echo '<a href="update.php?uemail=' . $row['email']. '&email='.$email.'"  class="fa fa-pencil " title="update"></a>' ;
     echo '<a href="delete.php?uemail=' . $row['email'] . '&email='.$email.'" class="fa fa-trash" title="delete"></a>';
     echo "</td>";
     echo "</tr>";
     echo"</body>";
 }                   
 } 
 $conn->close();
?>
</table>            
</body>
</html>
 
