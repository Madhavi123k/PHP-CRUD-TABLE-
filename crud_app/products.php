<?php
// Include database connection
include "db.php";

// Fetch all products from database
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Table</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!--  NAVBAR  -->
<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container">
    <span class="navbar-brand">Product Management System</span>
    <div>
      <!-- Redirect to Add Product page -->
      <a href="index.php" class="btn btn-outline-light btn-sm">
        Add Product
      </a>
    </div>
  </div>
</nav>

<div class="container">

<!--  PRODUCT TABLE CARD  -->
<div class="card">

  <!-- Card Header -->
  <div class="card-header bg-primary text-white">
    <h6 class="mb-0">PRODUCT TABLE</h6>
  </div>

  <!-- Card Body -->
  <div class="card-body p-0">
    <table class="table table-bordered table-striped mb-0 text-center">
      
      <!-- Table Head -->
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Category</th>
          <th>Action</th>
        </tr>
      </thead>

      <!-- Table Body -->
      <tbody>
      <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><?php echo $row['category']; ?></td>
          <td>
            <!-- Edit Button -->
            <a href="edit.php?id=<?php echo $row['id']; ?>" 
               class="btn btn-sm btn-warning">
               Edit
            </a>

            <!-- Delete Button -->
            <a href="delete.php?id=<?php echo $row['id']; ?>" 
               class="btn btn-sm btn-danger"
               onclick="return confirm('Are you sure you want to delete this product?');">
               Delete
            </a>
          </td>
        </tr>
      <?php } ?>
      </tbody>

    </table>
  </div>
</div>

</div>

</body>
</html>