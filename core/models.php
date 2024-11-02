<?php 
    //Category Table Crud
    function insertCategory ($pdo, $category_name, $description) {

        $sql = "INSERT INTO Category (category_name, description) VALUES (?,?)";

        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$category_name, $description]);

        if ($executeQuery) {
            return true;
        }
    }

    function updateCategory ($pdo, $category_name, $Description, $category_id) {

        $sql = "UPDATE Category
				SET category_name = ?,
					description = ?
				WHERE category_id = ?
			";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$category_name, $Description, $category_id]);

        if ($executeQuery) {
            return true;
        }
    }

    function deleteCategory($pdo, $category_id) {
        $deleteCategoryproduct = "DELETE FROM Products WHERE category_id = ?";
        $deleteStmt = $pdo->prepare($deleteCategoryproduct);
        $executeDeleteQuery = $deleteStmt->execute([$category_id]);
    
        if ($executeDeleteQuery) {
            $sql = "DELETE FROM Category WHERE category_id = ?";
            $stmt = $pdo->prepare($sql);
            $executeQuery = $stmt->execute([$category_id]);
    
            if ($executeQuery) {
                return true;
            }
    
        }
        
    }

    function getAllCategory($pdo) {
        $sql = "SELECT * FROM Category";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute();
    
        if ($executeQuery) {
            return $stmt->fetchAll();
        }
    }
    
    function getCategorybyID($pdo, $category_id) {
        $sql = "SELECT * FROM Category WHERE category_id = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$category_id]);
    
        if ($executeQuery) {
            return $stmt->fetch();
        }
    }

    function getProductsByCategory($pdo, $category_id) {
	
        $sql = "SELECT 
                    products.products_id AS products_id,
                    products.product_name AS product_name,
                    products.price AS price,
                    products.stock AS stock,
                    products.category_id AS category_id
                FROM products
                JOIN category ON products.category_id = category.category_id
                WHERE products.category_id = ? 
                GROUP BY products.products_id;
                ";
    
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$category_id]);
        if ($executeQuery) {
            return $stmt->fetchAll();
        }
    }

    //Products Table CRUD
    function insertProducts($pdo,$product_name, $price, $stock, $category_id) {

	$sql = "INSERT INTO Products (product_name, price, stock, category_id) VALUES(?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$product_name, $price, $stock, $category_id]);

        if ($executeQuery) {
            return true;
        }
    }
    function getProductsByID($pdo, $products_id) {
        $sql = "SELECT 
                    products.products_id AS products_id,
                    products.product_name AS product_name,
                    products.price AS price,
                    products.stock AS stock
                FROM products
                JOIN category ON products.category_id = category.category_id
                WHERE products.products_id = ? 
                GROUP BY products.products_id";
        
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$products_id]);
        if ($executeQuery) {
            return $stmt->fetch();
        }
    }
    

    function updateProducts($pdo, $product_name, $price, $stock, $products_id) {
        $sql = "UPDATE products
                SET product_name = ?,
                    price = ?,
                    stock = ?
                WHERE products_id = ?
                ";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$product_name, $price, $stock, $products_id]);
    
        if ($executeQuery) {
            return true;
        }
    }

    function deleteProducts($pdo, $products_id) {
        $sql = "DELETE FROM products WHERE products_id = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$products_id]);
        if ($executeQuery) {
            return true;
        }
    }

    function getAllInfoByCategoryID($pdo, $category_id) {
        $sql = "SELECT category_id, category_name, Description FROM Category WHERE category_id = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$category_id]);
    
        if ($executeQuery) {
            return $stmt->fetch();  // Fetch a single row with the category information
        }
        return null;  // Return null if the query fails
    }
    

?>
