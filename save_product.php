<?php
    if (!empty($_POST)) {
        $productName = $_POST['productName'] ?? null;
        $productNickName = $_POST['productNickName'] ?? null;
        $productPrice = $_POST['productPrice'] ?? null;
        $productSku = $_POST['productSku'] ?? null;

        $dbConnection = "mysql:dbname=ecommerce;host=localhost";
        $dbUser = "root";
        $dbPassword = "";
        $dbOptions = [];

        try {
            $pdo = new PDO($dbConnection, $dbUser, $dbPassword, $dbOptions);
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
        }

        $query = "
        INSERT INTO 
            products 
                (name, nickname, sku, price) 
        VALUES 
            (:name, :nickname, :sku, :price)
        ";
        
        $sql = $pdo->prepare($query);
        $sql->bindValue(":name", $productName, PDO::PARAM_STR);
        $sql->bindValue(":nickname", $productNickName, PDO::PARAM_STR);
        $sql->bindValue(":sku", $productSku, PDO::PARAM_STR);
        $sql->bindValue(":price", $productPrice, PDO::PARAM_INT);

        $sql->execute();
    }
?>
