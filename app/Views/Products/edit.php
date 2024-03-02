<?php 
include __DIR__. '/../header.php';

session_start();

if (isset($_SESSION['product'])) {
    // acessando os dados do produto
    $product = $_SESSION['product'];

    //variáveis locais recebem os dados vindos da sessão
    $productId = $product['id'];
    $productItem = $product['item'];
    $productDescription = $product['descricao'];
    $productValue = $product['valor'];
    $productSell = $product['venda'];
} else {

    echo "erro na função SESSION"; 
    exit;

}

?>
<form action="../../../index.php?action=editProduct" id="productForm" method="POST">
    <div class="container-lg mt-3 col-sm-8">
        <h2 class="mb-5" >Editar</h2>
        <div class="mb-3">
            <label class="form-label fs-4">Produto</label>
            <input type="text" class="form-control fs-5" required name="item" value="<?= $productItem?>">
        </div>
        <div class="mb-3">
            <label class="form-label fs-4">Descrição</label>
            <textarea class="form-control fs-5" required name="description" rows="3"><?= $productDescription?></textarea>
        </div>
        <div class="mb-3">
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label fs-4">Valor (R$)</label>
                <input type="text" id="valor" class="form-control fs-5" required name="value" value="<?=$productValue?>">
            </div>
            <div class="col-sm-6">
                <label class="form-label fs-4">Disponível para venda</label>
                <select class="form-select" value="<?=$productSell?>" name="sell">

                    <option value="Sim" <?= ($productSell == 'Sim') ? 'selected' : '' ?>>Sim</option>

                    <option value="Não" <?= ($productSell == 'Não') ? 'selected' : '' ?>>Não</option>

                </select>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">

        <a onclick="voltarPagina()" title="Cancelar" class="text-white m-2 btn btn-danger">
            <i class="text-white bi bi-x-circle-fill">
            </i>
            Cancelar
        </a>
        <input type="hidden" name="id" value="<?=$productId?>">

        <button type="submit" title="Finalizar" class="text-white m-2 btn btn-success">
            <i class="bi bi-check-circle-fill"></i>
            Finalizar
        </button>
    </div>
</form>







<?php 
include __DIR__. '/../footer.php';
?>