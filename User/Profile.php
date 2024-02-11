<?php

session_start();
error_reporting(E_ALL ^ E_WARNING);
$email=$_SESSION['email'];
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
        .cart_icon
                {   
                    width: 65px;
                    height: 65px;
                }
                .cart_btn
                {
                    height: 100%;
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border: none;
                    background-color: white;
                }
                .fa-cart-plus
                {
                    font-size: 30px;
                    color: black;
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
                <a href="Profile.php"><img src="../Admin/customerimage/<?php echo $pic; ?>" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="Home.php">Home</a></li>
                    <li class="Navlist"><a href="Product/product.php">Fashion</a></li>
                    <li class="Navlist"><a href="AboutUs.php">About Us</a></li>
                    <li class="Navlist"><a href="Order/order.php">Order</a></li>
                </ul>
            </div>
            <?php
            
            if($user == "" )
            {
            ?>
            <div><a href="../login.php"><img src="../images/login.png" width="45px" height="45px" alt="alt"/></div></a>

            <?php
            }
            ?>  
        </div>
        <div class="cart_icon">
                    <button class="cart_btn"><a class="cart_href" href="Cart/cart.php"><i class="fa fa-cart-plus"></i></a></button>
        </div>
                
    </div>
        <div class='profile_body'>
            <div class="profile_content">
                <div class='display_picture'>
                    <img src="../Admin/customerimage/<?php echo $pic; ?>" width="240px" height="240px"/>
                </div>
                <div class='upload_image'>
                    <form action="<?php $SELF_PHP; ?>" method="POST" enctype="multipart/form-data">
                        <input class='file' type='file' name="up_file" >
                        <button class="upload" name="up_img" >Upload</button>
                    </form>
                </div>
                
                <div class="detail_update" >
                    
                <?php
                if($email != ""){
                $sql1="select * from login where email='$email'";
                $result=$conn->query($sql1);
                if($result->num_rows>0)
                {
                    while($rows=$result->fetch_assoc())
                    {
                        $name=$rows['uname'];
                        $phn=$rows['phone'];
                        $add=$rows['address'];
                        $pay=$rows['payment'];
                echo "<div class='update_other_detail'>";
                
                echo '<div class="wallet">';
                    if($pay != null)
                    {
                        echo "<label id='pay_here'><b>Your waller balance is : &#8377 </b>".$pay."</label>";
                    }
                    else
                    {
                        echo "<form action="."$SELF_PHP;"." method='POST'>".
                                "<label><b>To Activate Wallet click on button</b></label>".
                                "<a href='wall_activate.php' class='wall_activate'>Activate</a>".
                        "</form>";      
                    }
                    echo "</div>"
                        ?>
                                
                
                    <form action="<?php $SELF_PHP; ?>" method="post" style="width:100%;">
                        <p> <?php echo $str; ?></p>
                        <table style="width:90%; margin: auto; border-spacing: 50px; border-collapse: separate;">
                            <tr >
                                <td >
                                <label><b>Name : </b></label>
                                <input type="text" class="form-control" name="name" value="<?php echo $name;?>" >
                                </td>
                                <td >
                                <label><b>Phone : </b></label>
                                <input type="text" class="form-control" name="phn" value="<?php echo $phn; ?>">
                                </td>
                            </tr>
                            <tr >
                                <td >
                                <label><b>Address : </b></label>
                                <input type="text" id="add" class="form-control" name="add" value="<?php echo $add; ?>">
                                </td> 
                            </tr>
                            <?php 
                            }
                    }
                            else {
                                $str="Login first.....";
                            }
                            ?>
                            <tr>
                                <td><button type="submit" class="form-btn" name="up">Update</button></td>                                    
                            </tr>
                            <tr>
                                <td >
                                    <label><b>Password : </b></label>
                                <input type="password" class="form-control" name="pass" value="password">
                                </td>
                                <td >
                                <label ><b>What is your full name(Answer to update password ): </b></label>
                                <input type="text" id="ans" class="form-control" name="ans" placeholder="Answer" Autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td><button type="submit" id="up_pass" class="form-btn" name="up_pass">Update</button></td>                                    
                            </tr>
                        </table>
                    </form>
                    <?php
                }
                else
                {
                    echo "<label id='login'><b>To see details login first</b></label>";
                }
                        
                            $conn->close();
                    ?>
                </div>
                </div>
            </div>           
        </div>
    </body>
</html>
