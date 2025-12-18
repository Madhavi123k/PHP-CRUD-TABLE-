<?php
// Include database connection
include "db.php";

// Get product ID safely
$id = (int)$_GET['id'];

// Fetch product data from database
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$row = $result->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- NAVBAR  -->
<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container">
    <span class="navbar-brand">Product Management System</span>
    <div>
      <a href="index.php" class="btn btn-outline-light btn-sm me-2">Add Product</a>
      <a href="products.php" class="btn btn-outline-light btn-sm">Product Table</a>
    </div>
  </div>
</nav>

<div class="container">

<!-- EDIT PRODUCT CARD  -->
<div class="card">
    <div class="card-header bg-primary text-white">
        <h6 class="mb-0">EDIT PRODUCT</h6>
    </div>

    <div class="card-body">
        <form method="post" action="update.php">

            <!-- Hidden Product ID -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <!-- Product Name -->
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control"
                       value="<?php echo $row['name']; ?>" required>
            </div>

            <!-- Product Price -->
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control"
                       value="<?php echo $row['price']; ?>" required>
            </div>

            <!-- Product Category -->
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-control" required>
                    <option value="">Select Category</option>
                    <option <?php if ($row['category']=="Electronics") echo "selected"; ?>>Electronics</option>
                    <option <?php if ($row['category']=="Grocery") echo "selected"; ?>>Grocery</option>
                    <option <?php if ($row['category']=="Stationery") echo "selected"; ?>>Stationery</option>
                </select>
            </div>

            <!-- Action Buttons -->
            <button class="btn btn-success">Update Product</button>
            <a href="products.php" class="btn btn-secondary ms-2">Cancel</a>

        </form>
    </div>
</div>

</div>

</body>
</html>