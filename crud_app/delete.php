<?php
session_start();           
include "db.php";          // Database connection

$id = (int)$_GET['id'];    // Get product ID

$conn->query("DELETE FROM products WHERE id=$id");  // Delete product

$_SESSION['message'] = "Product deleted successfully"; // Alert message
header("Location: index.php"); 
exit();
?>