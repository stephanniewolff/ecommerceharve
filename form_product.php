
<?php 
    include_once('include/header.php'); 

    $productName = null;
    $productNickName = null;
    $productSku = null;
    $productImage = null;
    $productPrice = null;
    $action="save_product.php";
    $textButton = "Cadastrar";
    $classButton = "btn btn-success";

    if (isset($_GET['id']) && $_GET['id'] != "") {
        include_once('include/connection.php');

        $query = "
            SELECT
                *
            FROM
                products
            WHERE
                id = :productId    
            ";
    
        $sql = $pdo->prepare($query);
        $sql->bindValue(":productId", $_GET['id'], PDO::PARAM_INT);
        $sql->execute();
        $resultArray = $sql->fetch(PDO::FETCH_ASSOC);

        $productName = $resultArray['name'];
        $productNickName = $resultArray['nickname'];
        $productSku = $resultArray['sku'];
        $productImage = $resultArray['image'];
        $productPrice =  $resultArray['price'];
        $action = "update_product.php?id=" . $_GET['id'];
        $textButton = "Atualizar";
        $classButton = "btn btn-warning";

    }
?>
    <div class="container">
        <form action= "<?php echo $action?>" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mt-3">
                        <span>Nome do Produto</span>
                        <input type="text" name="productName" class="form-control" value = <?php echo $productName; ?>></input>
                    </div>

                    <div class="form-group mt-3">
                        <span>Apelido do Produto</span>
                        <input type="text" name="productNickName" class="form-control" value = <?php echo $productNickName; ?>></input>
                    </div>

                    <div class="form-group mt-3">
                        <span>SKU do Produto<span>
                        <input type="text" name="productSku" class="form-control" value = <?php echo $productSku; ?>></input>
                    </div>

                    <div class="form-group mt-3">
                        <span>Image do Produto</span>
                        <input type="file" name="productImage" class="form-control" value = <?php echo $productImage; ?>></input>
                    </div>

                    <div class="form-group mt-3">
                        <span>Preço do Produto</span>
                        <input type="number" name="productPrice" class="form-control" value = <?php echo $productPrice; ?>></input>
                    </div>
                </div>
            <div class="card-footer">
                <input type="submit" class="<?php echo $classButton;?>" value="<?php echo $textButton;?> Formulário">
                <input type="reset" class="btn btn-secondary" value="Limpar Formulário">
            </div>
        </div>
        </form>
    </div>
<?php include_once('include/footer.php'); ?>

