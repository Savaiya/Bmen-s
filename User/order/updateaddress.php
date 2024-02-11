<?php 
error_reporting(E_ALL ^ E_WARNING);
session_start();
$user=$_SESSION['username'];
$email=$_SESSION['email'];
$pic=$_SESSION['pic'];
$pno=$_REQUEST['pno'];

require_once '../connection.php';
    if(isset($_POST['sub']))
    {
        $add=$_POST['add'];
        $phn=$_POST['phn'];
        $name=$_POST['uname'];       
        $sql="update login set uname='$name',phone='$phn',address='$add' where email='$email'";
        if($conn->query($sql)===TRUE)
        {
            $str="Details succesfully updated";
        }
        else
        {
            $str="Something went wrong";
        }
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Check Address</title>
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0">  
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
            <style>
                
                .form
                {
                    position: relative;
                    width: 100vw;
                    height: 50vw;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .form-content
                {
                    position: relative;
                    height: 80%;
                    border: outset;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                }
                label
                {
                    margin-top: 10px;
                }
                #btn
                {
                    border-radius: 5px;
                    margin-top: 10px;
                    background-color: #86b7fe;
                    border:groove; 
                }
                .head
                {
                    position: relative;
                    width: 50%;
                    height: 40px;
                    margin-top: 10px;
                }
                .form-detail
                {
                    position: absolute;
                    width: 50%;
                    height: 90%;
                    margin-top: 40px;
                    display: flex;
                    justify-content: center;
                }
                #href-btn
                {
                    height: 30px;
                    width: 80px;
                    background-color: #86b7fe;
                    text-decoration: none;
                    border-radius: 5px;
                    color: black;
                    padding-left: 5px;
                    border: solid 1px;
                }
            </style>
    </head>
    <body>
        <?php 
        $sql="select * from login where email='$email'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
        ?>
        
        <!--  Form Starts from Here-->
        <div class="form">
            <div class="form-content">
                <div class="head">
                    <h6>Confirm details...</h6>
                </div>
                <div class="form-detail">
                <form action="<?php $SELF_PHP; ?>" method="post">
                    <label for="name"><b>Name:-</b> &ensp;<?php echo $row['uname']; ?></label><br>
                    <input type="text" name="uname" placeholder="Update your name here...." size="50"><br><br>
                    
                    <label for="phn"><b>Phone Number:-</b> &ensp;<?php  echo $row['phone']?></label><br>
                    <input type="text" name="phn" placeholder="Update your Phone number here...." size="50"><br><br>
                    
                    <label for="add"><b> Address:-</b> &ensp;<?php echo $row['address']; ?></label><br>
                    <input type="text" name="add" placeholder="Update your Address here...." size="80"><br>
                    
                    <button id="btn" name="sub">Update</button>
                    <label><?php echo $str; ?></label>
                </form>
                </div>
                
                <?php echo '<a href="payment.php?pno='.$pno.'" id="href-btn">continue</a>'; ?>
            </div>    
        </div>    
        <?php
        }
        }
        else {
            header('location:../../login.php');
        }
        $conn->close();
        ?>
    </body>
</html>
