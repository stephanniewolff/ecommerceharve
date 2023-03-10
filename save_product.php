<?php

    include_once('include/header.php');

    if (!empty($_POST)) {
        $productName = $_POST['productName'] ?? null;
        $productNickName = $_POST['productNickName'] ?? null;
        $productPrice = $_POST['productPrice'] ?? null;
        $productSku = $_POST['productSku'] ?? null;

        include_once('include/connection.php');

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
    include_once('include/footer.php');
?>
