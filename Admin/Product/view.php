<?php 
error_reporting(E_ALL ^ E_WARNING);
session_start();
$email=$_REQUEST['email'];
$pno=$_REQUEST['pno'];
require_once '../connection.php';
if($pno != null)
{
$sql="SELECT * FROM product where pid=$pno";

$result=$conn->query($sql);
if($result->num_rows>0)
{
 while ($row=$result->fetch_assoc())
 {
    $name=$row['pname']; 
    $ct=$row['pch'];
    $img="<img src=". "../productimage/". $row['image'] .">";
    $pr=$row['price'];
    $br=$row['Company'];
    $dt=$row['pdt'];
    $dtl=$row['detail'];
}
}
}
else
{
    $str='To view details go to<a href="product.php">&ensp;Product page</a>';
}
$conn->close();
?>
<html>
    <head>
        <title>Product Table</title>
         <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <link rel="stylesheet" href="css/navbar.css" type="text/css"/>
            <link rel="stylesheet" href="css/view.css" type="text/css">
    
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
                    <li class="Navlist"><a href="../Home.php">Home</a></li>
                    <li class="Navlist"><a href="product.php">Product</a></li>
                    <li class="Navlist"><a href="../Customer/customer.php">Customer</a></li>
                    
                </ul>
            </div>
        </div>
        </div>
        
        <!-- Product Detail-->
        <div class="container-fluid" > 
            <h1>These Values are of Product <?php echo $pno ;?></h1>
            <label style="color: white;display: flex;justify-content: center;font-size: 40px;"><?php echo $str;?></label>
        <table>
            <tr>
            <th>Product Brand:-</th>
            </tr>
            <td><?php echo $br; ?></td>
        </table>
        <table>
            <tr>
            <th>Product Name:-</th>
            </tr>
            <td><?php echo $name; ?></td>
        </table>
        <table>
            <tr>
            <th>Product Category:-</th>
            </tr>
            <td><?php echo $ct;?></td>
        </table>
        <table>
            <tr>
            <th>Product Image:-</th>
            </tr>
            <td id="img"><?php echo $img; ?></td>
        </table>
        <table>
            <tr>
            <th>Product Upload Date:-</th>
            </tr>
            <td><?php echo $dt; ?></td>
        </table>    
        <table>
            <tr>
            <th>Product Price:-</th>
            </tr>
            <td><?php echo $pr; ?></td>
            <tr> 
                <!-- Crud -->
            <td><?php echo '<a href="update.php?pno=' . $row['pno']. '&email='.$email.'" title="update"><button class="btn btn-primary mt-3"><i class="fa fa-pencil ">Update</i></button></a>';
                    echo '<a href="delete.php?pno=' . $row['pno'] . '&email='.$email.'" title="delete"><button class="btn btn-danger mt-3"><i class="fa fa-trash ">Delete!</i></button></a>'; 
                    echo '<a href="product.php?email='.$email.'" title="Home"><button class="btn btn-info mt-3"><i class="fa fa-home"></i></button></a>'; ?></td>
            </tr>
        </table>
        </div>
</body>
</html>
 
