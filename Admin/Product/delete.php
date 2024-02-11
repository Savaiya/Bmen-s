<?php error_reporting(E_ALL ^ E_WARNING);
session_start();
$pno=$_REQUEST['pno'];
$email=$_REQUEST['email'];
if(isset($_POST['sub']))
{
require_once '../connection.php';
$sql="SELECT * FROM product ";

$result=$conn->query($sql);
if($result->num_rows>0)
{
    $sql="delete from product where pno=$pno";

 if($conn->query($sql) === TRUE)
 {
     header("location:product.php?email=$email");
 }
 else 
     echo"something went wrong";
 }
 $conn->close();
}
if(isset($_POST['can']))
{
    header("location:product.php?emai=$email");
}

?>
<html>
    <head>
        <title>Delete Product</title>
         <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <link rel="stylesheet" href="css/navbar.css" type="text/css"/>
            <style>
                #Delete
                {
                    display: flex;
                    justify-content: center;
                }
            </style>
    
    </head>
    <body>
        <!-- Navbar-->
        <div class="navout">
        <div class="NavBar">
            <div >
                <a href="../Profile.php"><img src="../customerimage/images/it.jpg" class="dp"/></a>
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
        
        <!-- Delete Confirmation -->
        <div class="container mt-5" id="Delete">
        <form action="<?php $SELF_PHP; ?>" method="POST">
            <h3>DELETE Customer <?php echo $pno;?></h3>
        <table>
           <th>Do you really want to delete Data!!!!</th>
           <td>
               <button class="btn btn-primary" type="submit" name="sub">Yes</button>
               <button class="btn btn-danger" type="submit" name="can">NO!!!!</button>
           </td>
        </table>         
        </form>  
        </div> 
            
           
</body>
</html>
 
