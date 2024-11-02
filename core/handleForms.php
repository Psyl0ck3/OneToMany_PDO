<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';
//one 
if (isset($_POST['insertcategory_btn'])) {

	$query = insertCategory($pdo, $_POST['category_name'], $_POST['Description']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editcategory_btn'])) {
	$query = updateCategory($pdo, $_POST['category_name'], $_POST['description'], 
    $_POST['category_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}


if (isset($_POST['deletecategory_btn'])) {
	$query = deleteCategory($pdo, $_GET['category_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}



//many

if (isset($_POST['insertproducts_btn'])) {
	$query = insertProducts($pdo, 
	$_POST['product_name'], 
	$_POST['price'],
	$_POST['stock'], 
	 $_GET['category_id']);

	if ($query) {
		header("Location: ../viewproducts.php?category_id=" .$_GET['category_id']);
	}
	else {
		echo "Insertion failed";
	}
}

if (isset($_POST['insertNewproducts_btn'])) {
	$query = insertProducts($pdo, 
	$_POST['product_name'], 
	$_POST['price'],
	$_POST['stock'], 
	 $_GET['category_id']);

	if ($query) {
		header("Location: ../viewproducts.php?category_id=" .$_GET['category_id']);
	}
	else {
		echo "Insertion failed";
	}
}


if (isset($_POST['editproducts_btn'])) {
	$query = updateProducts($pdo, $_POST['product_name'], $_POST['price'], $_POST['stock'], $_GET['products_id']);

	if ($query) {
		header("Location: ../viewproducts.php?category_id=" .$_GET['category_id']);
	}
	else {
		echo "Update failed";
	}

}

if (isset($_POST['deleteProductBtn'])) {
	$query = deleteProducts($pdo, $_GET['products_id']);

	if ($query) {
		header("Location: ../viewproducts.php?category_id=" .$_GET['category_id']);
	}
	else {
		echo "Deletion failed";
	}
}

?>