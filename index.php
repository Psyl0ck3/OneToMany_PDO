<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="indexstyle.css?v=1.2">
</head>
<body>
	<!-- Navbar -->
    <!-- Sidebar -->
    <div class="sidebar">
		<img src="blackglowmuse.png" alt="Logo" style="height: 95px; width: auto; margin-left: 3%;">
        <a class="navbar-brand" href="#">Glowmuse Cosmetics Inventory System</a>
    </div>
	<div class="main-content">
		<div class="container my-4">
			<div class="row justify-content-center fill-up-area">
				<div class="col-12 text-center">
					<h1>Glowmuse Inc. Cosmetics Inventory System</h1>
				</div>
				<form action="core/handleForms.php" method="POST" class="col-8 d-flex flex-column align-items-center">
					<div class="d-flex gap-3">
						<div class="form-group">
							<label for="category_name" class="form-label">Category Name</label>
							<input type="text" name="category_name" class="form-control" id="category_name" style="width: 250px;">
						</div>
						<div class="form-group">
							<label for="Description" class="form-label">Description</label>
							<input type="text" name="Description" class="form-control" id="Description" style="width: 250px;">
						</div>
					</div>
					<div class="row mt-4 justify-content-center">
						<div class="col-auto">
							<input type="submit" name="insertcategory_btn" class="btn-submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>


		<div class="container my-4">
			<div class="row">
				<?php $getAllCategory = getAllCategory($pdo); ?>
				<?php foreach ($getAllCategory as $row) { ?>
					<div class="col-md-4 mb-4">
						<div class="category-box" style="border: 1px solid; border-radius: 8px; padding: 15px; height: 100%; width: 20vw;">
							<h5>Category Name: <?php echo $row['category_name']; ?></h5>
							<p>Description: <?php echo $row['Description']; ?></p>

							<div class="editAndDelete" style="margin-top: 20px;">
								<a href="viewproducts.php?category_id=<?php echo $row['category_id']; ?>" class="view">View Products</a>
								<a href="editcategory.php?category_id=<?php echo $row['category_id']; ?>" class="edit">Edit</a>
								<a href="deletecategory.php?category_id=<?php echo $row['category_id']; ?>" class="delete">Delete</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>	

	
</body>
</html>