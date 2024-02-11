<?php

if(isset($_POST['sub']))
{
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $pass=$_POST['pwd'];
    $phn=$_POST['phn'];
$conn=new mysqli("localhost", "root", "", "men");
if($conn->connect_error)
{
    die("connection failed" . $conn->connect_error);
}
$sql="insert into login(uname,email,pass,phone) value('$uname','$email','$pass','$phn')";

if($conn->query($sql) === TRUE)
{
    echo "Registered";
    header("location:login.php");
}
else 
{
    echo"something is wrong";
}
$conn->close();
}
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration page</title>
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
    <div class="container mt-3 mb-3 " style="width:400px;background-color:rgba(210, 210, 210,0.5);color:black;border-radius:10px; border-style: outset;">
        <a href="User/Home.php">Home</a>
    <form action="<?php $SELF_PHP; ?>" method="POST" enctype="multipart/form-data">         
    <div class="mb-3 mt-3">
      <label for="uname">Enter Name</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Name" name="uname">
    </div>
    <div class="mb-3 mt-3 table">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="mb-3">
      <label for="phn">Phone:</label>
      <input type="tel" class="form-control" id="phn" placeholder="Enter Phone number" name="phn">
    </div>
    <button type="submit" class="btn btn-dark mb-3" name="sub">SignUp</button>
    <i><a href="login.php" style="float:right; text-decoration: none;color: #cb1b58">Go back to LogIn</a></i>
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
