<?php 
session_start();
error_reporting(E_ALL ^ E_WARNING);
$email=$_REQUEST['email'];
$pno=$_REQUEST['pno'];
$str="";
if(isset($_POST['sub']))
{
require_once '../connection.php';   
$target_path="C:/xampp/htdocs/Men/Admin/productimage/images/";
$target_path = $target_path . basename($_FILES['up']['name']);
move_uploaded_file($_FILES['up']['tmp_name'],$target_path);
$var="images/" . $_FILES["up"]["name"];
$name=$_POST['name'];
$ct=$_POST['ct'];
$pr=$_POST['pr'];
$br=$_POST['Bname'];
$pdt=$_POST['pdt'];
$dtl=$_POST['dtl'];
$sql="update product set pname='$name',pch='$ct',image='$var',price='$pr',Company='$br',pdt='$pdt',detail='$dtl' where pno='$pno'";
 if($conn->query($sql) === TRUE)
 {
     header("location:product.php?email= $email");
 }
 else {
     $str="Something went wrong";
}

$conn->close();
}

?>
<html>
    <head>
        <title>Update Product</title>
         <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/navbar.css" type="text/css"/>
            <style>
                
                .homebtn
                {
                    float: right;
                }
                .container
                {
                  width: 40%; 
                  border:outset; 
                  border-radius: 4px; 
                  box-shadow: 5px 5px 10px grey;
                }
                #textarea
                {
                    width: 90%;
                }
                textarea
                {
                    width: 100%;
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
                    <li class="Navlist"><a href="product.php?email=<?php echo $email; ?>">Product</a></li>
                    <li class="Navlist"><a href="../Customer/customer.php?email=<?php echo $email; ?>">Customer</a></li>
                    
                </ul>
            </div>
        </div>
        </div>
           <!-- Form starts form here -->
<div class="container mt-3">
            <h3>Update Product <?php echo $pno;?> <a href="product.php" title="Home" class="homebtn"><button class="btn btn-info mt-3"><i class="fa fa-home"></i></button></a></h3>
            <form action="<?php $SELF_PHP ;?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="Bname">Enter Brand Name:</label>
      <input type="text" class="form-control" id="Bname" placeholder="Enter Brand Name" name="Bname">
    </div>
    <div class="mb-3 mt-3">
      <label for="name">Enter Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="ct">Enter Category:</label>
      <input type="text" class="form-control" id="ct" placeholder="Enter Category" name="ct">
    </div>
    <div class="mb-3 mt-3">
      <label for="file">Upload Photo:</label>
      <input type="file" class="form-control" id="file" name="up">
    </div>
    <div class="mb-3 mt-3">
      <label for="pr">Enter Price:</label>
      <input type="text" class="form-control" id="pr" placeholder="Enter Price" name="pr">
    </div>
    <div class="mb-3 mt-3">
      <label for="pdt">Enter Upload Date:</label>
      <input type="date" class="form-control" id="pdt" name="pdt">
    </div>
    <div class="mb-3 mt-3" id="textarea">
      <label for="dtl">Enter Detail:</label>
      <textarea placeholder="Enter Detail..." name="dtl"></textarea>
    </div>
       <label><?php echo $str;?></label>
      <button type="submit" class="btn btn-outline-dark" name="sub"><a1 class="fa fa-plus"></a1>Update</button>
  </form>
</div>            
    </body>
</html>