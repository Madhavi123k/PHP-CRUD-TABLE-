<?php
// Start session to store success message
session_start();

// Include database connection
include "db.php";

// Get form data
$name = $_POST['name'];
$price = $_POST['price'];
$category = $_POST['category'];

/*  VALIDATION  */

// Allow only letters and spaces in product name
$name_check = str_replace(" ", "", $name);
if (!ctype_alpha($name_check)) {
    die("Product name should contain only letters");
}

// Price must be numeric
if (!is_numeric($price)) {
    die("Price should be numeric");
}

/*  INSERT DATA  */

$sql = "INSERT INTO products (name, price, category)
        VALUES ('$name', '$price', '$category')";

$conn->query($sql);

/*  SUCCESS MESSAGE  */

// Set success message after successful insert
$_SESSION['message'] = "Product added successfully";

// Redirect to main page
header("Location: index.php");
exit();
?>