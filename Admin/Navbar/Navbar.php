<html>
    <head>
        <title>NavPractise</title>
        <meta charset = "utf-8">  
        <meta name = "viewport" content = "width=device-width, initial-scale=1">  
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet">  
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            /* NavBar Start*/
        .navout
        {
            display: flex;
            justify-content: center;
        }
            .NavBar
            {
                position: relative;
                width: 90%;
                height: auto;
                background-color: black;
                border-radius: 5px;
                padding-left: 10px;
                padding-right: 10px;
            }
            .Nav-content
            {
                color: white;
            }
            .Navlist
            {
                display: inline;
                margin: 10px;
            }
            .dp
            {
                position: relative;
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }
            a
            {
                text-decoration: none;
                color: white;
            }
            a:hover
            {
                color: grey;
            }
            .dp:hover
            {
                opacity: 0.5;
            }
 /* NavBar End*/
        </style>
      
    </head>
    <body>
        <div class='navout'>
        <div class="NavBar">
            <div >
                <a href="#"><img src="../../images/it.jpg" class="dp"/></a>
            </div>
            <div class="Nav-content">
                <ul>
                    <li class="Navlist"><a href="Home.php">Home</a></li>
                    <li class="Navlist"><a href="product.php">Product</a></li>
                    <li class="Navlist"><a href="customer.php">Customer</a></li>
                    <li class="Navlist"><a href="order.php">Order</a></li>
                </ul>
            </div>
            <div class="search">
                <form action="<?php $SELF_PHP; ?>" method="POST">
                    <input type="text" class="SearchBar" name="search" placeholder="Search....">
                    <input type="button" value="Search" name="sub" class="srch-btn">
                </form>
            </div>
        </div>
        </div>
    </body>
</html>


