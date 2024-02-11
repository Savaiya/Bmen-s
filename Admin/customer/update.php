<?php 
session_start();
error_reporting(E_ALL ^ E_WARNING);
$user=$_SESSION['username'];
error_reporting(E_ALL ^ E_WARNING);
$oldemail=$_REQUEST['uemail'];
$ademail = $_REQUEST['email'];
$name="";
$email="";
$phn="";
$str="";
if(isset($_POST['sub']))
{
require_once '../connection.php';   

$target_path="C:/xampp/htdocs/Men/Admin/customerimage/images/";
$target_path = $target_path . basename($_FILES['up']['name']);
move_uploaded_file($_FILES['up']['tmp_name'],$target_path);
$var="images/" . $_FILES["up"]["name"];

$name=$_POST['name'];
$email=$_POST['email'];
$phn=$_POST['phn'];
$pwd=$_POST['pswd'];
$add=$_POST['add'];
$sql="update login set uname='$name',email='$email',phone='$phn',pass='$pwd',image='$image',address='$add' where email='$oldemail'";
 if($conn->query($sql) === TRUE)
 {
     header("location:customer.php?email=$ademail");
 }
 else {
     $str="Something went wrong";
 }
$conn->close();
}

?>
<html>
    <head>
        <title>UPdate Customer</title>
         <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <link href="css/navbar.css" rel="stylesheet" type="text/css"/>
            <style>
                .btn-home
                {
                    float: right;
                }
                h3
                {
                    margin-top: 10px;
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
                    <li class="Navlist"><a href="../Customer/customer.php?email=<?php echo $email; ?>">Customer</a></li>
                    
                </ul>
            </div>
        </div>
        </div>
        <!-- Form starts form here -->
        <div class="container mt-3" style="width: 40%; border:outset; border-radius: 4px; box-shadow: 10px 10px 10px grey;">
            <h3>Update Customer <?php echo $cno; ?> <a href="customer.php?email=<?php echo $email; ?>" class='btn-home' title="Home"><button class="btn btn-info "><i class="fa fa-home"></i></button></a></h3>
            <form action="<?php $SELF_PHP ;?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="email">Enter Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3 mt-3">
      <label for="name">Enter Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="pswd">Enter Password:</label>
      <input type="password" class="form-control" id="pswd" placeholder="Enter Password" name="pswd">
    </div>    
    <div class="mb-3 mt-3">
      <label for="phn">Enter Phone:</label>
      <input type="tel" class="form-control" id="phn" placeholder="Enter Phone" name="phn">
    </div>

    <div class="mb-3 mt-3">
      <label for="file">Upload Photo:</label>
      <input type="file" class="form-control" id="file" name="up">
    </div>
      <div class="mb-3 mt-3">
      <label for="add">Enter Address:</label>
      <input type="text" class="form-control" id="add" placeholder="Enter Address" name="add">
    </div>

       <label><?php echo $str;?></label>
      <button type="submit" class="btn btn-outline-dark" name="sub"><a1 class="fa fa-plus"></a1>Update</button>
  </form>
</div>            
    </body>
</html>