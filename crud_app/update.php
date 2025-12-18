<?php
// Start session to store success message
session_start();

// Include database connection file
include "db.php";

// Get updated product data from form
$id = (int)$_POST['id'];   // Product ID
$name = $_POST['name'];   // Product name
$price = $_POST['price']; // Product price
$category = $_POST['category']; // Product category

// Update product details in the database
$conn->query("UPDATE products SET
              name='$name',
              price='$price',
              category='$category'
              WHERE id=$id");

// Set success message after update
$_SESSION['message'] = "Product updated successfully";

// Redirect to main page
header("Location: index.php");
exit();
?>