<?php
// Start session to show success messages
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- NAVBAR  -->
<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container">
    <span class="navbar-brand">Product Management System</span>
    <div>
      <!-- Link to Product Table -->
      <a href="products.php" class="btn btn-outline-light btn-sm">
        Product Table
      </a>
    </div>
  </div>
</nav>

<div class="container">

<!--  SUCCESS ALERT  -->
<?php
// Display success message after insert/update/delete
if (isset($_SESSION['message'])) {
    echo '<div id="msg" class="alert alert-success py-1 px-2 mb-3"
          style="font-size:13px; width:fit-content;">'
          . $_SESSION['message'] .
         '</div>';

    // Remove message after displaying once
    unset($_SESSION['message']);
}
?>

<!--  ADD PRODUCT FORM  -->
<div class="card">

  <!-- Card Header -->
  <div class="card-header bg-primary text-white">
    <h6 class="mb-0">ADD PRODUCT</h6>
  </div>

  <!-- Card Body -->
  <div class="card-body">
    <form method="post" action="insert.php">

      <!-- Product Name -->
      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <!-- Product Price -->
      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control" required>
      </div>

      <!-- Product Category -->
      <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category" class="form-control" required>
          <option value="">Select Category</option>
          <option>Electronics</option>
          <option>Grocery</option>
          <option>Stationery</option>
        </select>
      </div>

      <!-- Submit Button -->
      <button class="btn btn-primary">Add Product</button>

    </form>
  </div>
</div>

</div>

<!-- AUTO HIDE MESSAGE  -->
<script>
// Automatically remove success message after 2.5 seconds
setTimeout(() => {
  const msg = document.getElementById("msg");
  if (msg) msg.remove();
}, 2500);
</script>

</body>
</html>