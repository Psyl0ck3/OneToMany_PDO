<?php 
require_once 'core/handleForms.php'; 
require_once 'core/models.php'; 

if (!isset($_GET['category_id'])) {
    die("Error: Category ID is not provided.");
}
$getCategorybyID = getCategorybyID($pdo, $_GET['category_id']);

if ($getCategorybyID === false) {
    die("Error: Category not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="categorystyle.css">
</head>
<body>
	<img src="blackglowmuse.png" alt="Logo" href="index.php" style="height: 95px; width: auto; margin-left: 3%;">
	<div class="container my-4 fill-up-area">
		<?php $getCategorybyID = getCategorybyID($pdo, $_GET['category_id']); ?>
		<h1>Edit form for cosmetic products</h1>
		<form action="core/handleForms.php?category_id=<?php echo $_GET['category_id']; ?>" method="POST">
			<label for="firstName">Category name</label> 
			<p>
				<input type="text" name="category_name" value="<?php echo $getCategorybyID['category_name']; ?>">
			</p>
			<label for="firstName">Description</label> 
			<p>
				<input type="text" name="description" value="<?php echo $getCategorybyID['Description']; ?>">
				<input type="hidden" name="category_id" value="<?php echo $_GET['category_id']; ?>">
				<input type="submit" name="editcategory_btn">
			</p>
		</form>
	</div>
</body>
</html>