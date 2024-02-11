<?php error_reporting(E_ALL ^ E_WARNING);
session_start();
$user=$_SESSION['username'];
$email=$_REQUEST['uemail'];
$ademail=$_REQUEST['email'];
if($email != null)
{
require_once '../connection.php';
$sql="SELECT * FROM login where email='$email'";

$result=$conn->query($sql);
if($result->num_rows>0)
{
 while ($row=$result->fetch_assoc())
 {
    $email=$row['email']; 
    $cname=$row['uname'];
    $phn=$row['phone'];
    $img=$row['image'];
    $add=$row['address'];
}
}
$conn->close();
}
else
{
    $str="Go to&ensp;<a href='customer.php?email= $ademail'>Customer page</a>&ensp;to view Data";
}
?>
<html>
    <head>
        <title>Customer Table</title>
         <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/navbar.css" type="text/css"/>
            <style>
                img
                {
                    width: auto;
                    height:250px;
                }
                body
                {
                    background: black;
                }
                table
                {   
                    align-content: center;
                    margin:2%;
                    font-size: 30px;
                }
                th,h1
                {
                    color: Grey;
                }
                td
                {
                    color: lightgrey;
                }
                a
                {
                    text-decoration: none;
                    margin-left:2px; 
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
                    <li class="Navlist"><a href="../Home.php?email=<?php echo $ademail; ?>">Home</a></li>
                    <li class="Navlist"><a href="../Product/product.php?email=<?php echo $ademail; ?>">Product</a></li>
                    <li class="Navlist"><a href="customer.php?email=<?php echo $ademail; ?>">Customer</a></li>
                    
                </ul>
            </div>
        </div>
        </div>
        <!--Customer Detail-->
        <div class="container-fluid" > 
            <h1>These Values are of Customer <?php echo $cno;?></h1>
        <table>
            <label style='display:flex; font-size: 30px; justify-content: center; color: white;'><?php echo $str; ?></label>
            <tr>
            <th>Customer EMail:-</th>
            </tr>
            <td><?php echo $email; ?></td>
        </table>
        <table>
            <tr>
            <th>Customer Name:-</th>
            </tr>
            <td><?php echo $cname;?></td>
        </table>
        <table>
            <tr>
            <th>Customer phone:-</th>
            </tr>
            <td><?php echo $phn;?></td>
        </table>
        <table>
            <tr>
            <th>Customer Photo:-</th>
            </tr>
            <td id="img"><img src="../customerimage/<?php echo $img; ?>" alt="alt"/></td>
        </table>
        <table>
            <tr>
            <th>Customer Address:-</th>
            </tr>
            <td><?php echo $add; ?></td>
        <!-- Crud-->
            <tr>          
            <td><?php echo '<a href="update.php?uemail=' . $row['email'].'&email='.$ademail.'" title="update"><button class="btn btn-primary mt-3"><i class="fa fa-pencil">Update</i></button></a>' ;
                        echo '<a href="delete.php?uemail=' . $row['email'] .'&email='.$ademail.'" title="delete"><button class="btn btn-danger mt-3"><i class="fa fa-trash">Delete!</i></button></a>';
                        echo '<a href="customer.php?email='.$ademail.'" title="Home"><button class="btn btn-info mt-3"><i class="fa fa-home"></i></button></a>'; ?></td>
             </tr>
        </table>
        </div>
</body>
</html>
 
