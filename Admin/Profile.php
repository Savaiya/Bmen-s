<?php

session_start();
error_reporting(E_ALL ^ E_WARNING);
$email=$_REQUEST['email'];
$user=$_SESSION['username'];
$pic=$_SESSION['pic'];
$ans='';
$phn='';
$add='';
$var='';
$str='';
require_once 'connection.php';
// This is for updating profile picture
if(isset($_POST['up_img']))
{
        $target_path= "C:/xampp/htdocs/Men/Admin/customerimage/images/";
        $target_path = $target_path . basename($_FILES['up_file']['name']);
        move_uploaded_file($_FILES['up_file']['name'] , $target_path);
        $var="images/" . $_FILES['up_file']['name'];
        
        $sql="update login set image='$var' where email='$email'";
        
        if($conn->query($sql) === TRUE)
        {
            header("location:Profile.php");
        }
        else
        {
            header("location:Profile.php");
        }
}
//This is for updating user's personal detail
if(isset($_POST['pass']))
{
    $uname = $_POST['name'];
    $phn = $_POST['phn'];
    $add = $_POST['add'];
    
    $sql = "update login set uname='$uname' , phone='$phn' , address='$add' where email='$email'";
    if($conn->query($sql) === TRUE)
    {
        header("location:Profile.php");
    }
    else
    {
        echo "<script>"
            ."alert('Something went wrong');"
            ."</script>";
    }
            
}

//This is for updating password
if(isset($_POST["up_pass"]))
{
    $pass=$_POST["pass"];
    $ans=$_POST["ans"];
    
    if($ans == "Ankit Savaiya")
    {
        
        $sql="update login set pass='$pass' where email='$email' ";
        if($conn->query($sql) === TRUE)
        {
            header("location:Profile.php");
        }
        else
        {
             echo "<script>"
            ."alert('Something went wrong');"
            ."</script>";
        }
    }
    else 
    {
            echo '<script>alert("Your Answer is wrong")</script>'; 
    }
}



?>
<html>
    <head>
        <title>User's Profile</title>
        <meta charset = "utf-8">  
            <meta name = "viewport" content = "width=device-width, initial-scale=1">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <link rel="stylesheet" href="css/navbar.css">
    </head>
    <style>
        .profile_body
        {
            position: absolute;
            width: 100vw;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .profile_content{
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            
        }
        .display_picture
        {
            position: absolute;
            width: 250px;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;  
            background: linear-gradient(red,violet);
            border-radius: 50%;
        }
        img
        {
            border-radius: 50%;           
            border-image: url("../images/brdr1.jpg")30 stretch;
        }
        .upload_image
        {
            position: absolute;
            width: 50%;
            height: 30px;
            top: 270px;
            display: flex;
            justify-content: center;
        }
        .file
        {
            background-color: gray;
            width: 220px;
            margin-right: 5px;
            border-radius: 5px;
        }
        .upload , .wall_activate
        {
            border-radius: 5px;
            border: outset;
            background-color: #5dbea3;
        }
        .upload:hover
        {
            border: outset;
            margin: -1px -1px;
        }
        .detail_update
        {
          margin-top: 350px;   
          height: 550px;
          width: 100%;
        }        
        .update_other_detail
        {
            position: absolute;
            height: 550px;
            width: 100%;
            background-color: lightgrey;
            border-radius: 10px;
            display: flex;
            justify-content: center;
        }
                .form-btn
                {
                   border: outset;
                   background-color:#5dbea3;
                }
                td
                {
                    width: 40%;
                }
                #add
                {
                    width: 215%;
                }
                #login
                {
                    text-align:center;
                    width: 100%;
                }
                .wallet
                {
                    position: absolute;
                    margin: auto;
                }
    </style>
    <body>
        <div class='navout'>
        <div class="NavBar">
            <div >
                <a href="#"><img src="../Admin/customerimage/<?php echo $pic; ?>" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="Home.php?email=<?php echo $email; ?>">Home</a></li>
                    <li class="Navlist"><a href="Product/product.php?email=<?php echo $email; ?>">Product</a></li>
                    <li class="Navlist"><a href="customer/customer.php?email=<?php echo $email; ?>">Customers</a></li>
        
                </ul>
            </div>
            <?php
            
            if($email == "" )
            {
            ?>
            <div><a href="../login.php"><img src="../images/login.png" width="65px" height="65px" alt="alt"/></div></a>

            <?php
            }
            ?>   
        </div>
        </div>
        
        <!-- Profile Picture -->
        <div class='profile_body'>
            <div class="profile_content">
                <div class='display_picture'>
                    <img src="../Admin/customerimage/images/it.jpg" width="240px" height="240px"/>
                </div>
                <div class='upload_image'>
                    <form action="<?php $SELF_PHP; ?>" method="POST" enctype="multipart/form-data">
                        <input class='file' type='file' name="up_file" >
                        <button class="upload" name="up_img" >Upload</button>
                    </form>
                </div>
                <?php
                
                            $conn->close();
                    ?>
                </div>
                </div>
            </div>           
        </div>
    </body>
</html>

