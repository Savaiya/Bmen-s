<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$str='';
if(isset($_POST['sub']))
{
    
$conn=new mysqli("localhost", "root", "", "men");
if($conn->connect_error)
{
    die("connection failed" . $conn->connect_error);
}
$email=$_POST['email'];
$pass=$_POST['pass'];
if($email=="admin@gmail.com" && $pass=="Password123")
{
    header("location:Admin/Home.php?email=$email");
}
else {
$sql="select * from login where email='$email' and pass='$pass'";

$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($rows=$result->fetch_assoc())
    {
        $_SESSION['username']=$rows['uname'];
        $_SESSION['pic']=$rows['image'];
        $_SESSION['email']=$rows['email'];
    }
    echo "Registered";
    header("location:User/Home.php");
}
else 
{
    $str ="Email and Password wrong";
}
}
$conn->close();
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
      .container_fluid1
      { 
          height: 100vh;
          background-image: url(images/bgcl1.jpg);
          background-size: cover;
      }
      label
      {
         font-family: "Sofia", sans-serif;
         font-size: 20px;
         text-shadow: 3px 3px 3px #ababab;
      }
      
  </style> 
</head>
<body>
    <div class="container_fluid1" >
    <div>
        <div class="container-fluid" style="height:30px;background-color:rgb(180, 180, 180);">            
        </div>
        <div class="container-fluid" style="height:30px;background-color:rgb(210, 210, 210);">            
        </div>
        <div class="container-fluid" style="height:30px;background-color:rgb(240, 240, 240);">            
        </div>
   </div>  
    <div class="container mt-5 mb-5" style="height: auto;width:400px;background-color:rgba(210, 210, 210,0.5);color:black;border-radius:10px; border-style: outset;">
        <a href="User/Home.php">Home</a>
  <form action="<?php $SELF_PHP; ?>" method="POST">         
         
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
    </div>
    <label style="color:darkslategray;width: 100%;font-size: 15px;"><?php echo $str;?></label>
    <button type="submit" class="btn btn-dark mb-3" name="sub">SignIn</button>
    <i><a href="Registration.php" style="float:right;text-decoration: none;color: #cb1b58">Registration</a></i>
  </form>
</div>
    <div style="position: absolute; bottom: 0; width: 100vw;">
          <div class="container-fluid" style="height:30px;background-color:rgb(240, 240, 240);">            
        </div>
          <div class="container-fluid" style="height:30px;background-color:rgb(210, 210, 210);">            
        </div>
        <div class="container-fluid" style="height:30px;background-color:rgb(180, 180, 180);">            
        </div>        
   </div>
    </div>
</body>
</html>