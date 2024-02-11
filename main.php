 <?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "men");

// Check connection

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the current page number from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * 10;

// Get the products from the database
$sql = "SELECT * FROM product LIMIT 10 OFFSET $offset";
$result = $mysqli->query($sql);

// Check if there are any products
if ($result->num_rows > 0) {
    // Loop through the products and display them on the page
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<p>" . $row["price"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No products found";
}

// Display the next button if there are more products to display
if ($page < 2) {
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) . "'>Next</a>";
}

// Close the connection to the database
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>
        .product {
            margin: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Products</h1>
    <?php include('products.php'); ?>
</body>
</html>