<?php 

include __DIR__. '/../header.php';

//superglobal $_SESSION recebe os dados da variável product para serem usados no formulário de edição
$_SESSION['product'] = $product;

?>

    <div class="container-lg mt-3 col-sm-8">
        <h2 class="mb-5" >Detalhes do produto</h2>
        <a href="index.php" title="Voltar" class="text-white mb-3 btn btn-primary text-white">
            <i class="text-white bi bi-arrow-left-circle-fill"></i>
            Voltar
        </a>

        <div class="mb-3">
            <label class="form-label fs-4">Produto</label>
            <input type="text" Disabled readonly class="form-control fs-5" value="<?= $product['item']?>">
        </div>
        <div class="mb-3">
            <label class="form-label fs-4">Descrição</label>
            <textarea class="form-control fs-5" Disabled readonly rows="3"><?= $product['descricao']?></textarea>
        </div>

        <div class="mb-3">
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label fs-4">Valor</label>
                <input type="text" id="" disabled readonly class="form-control  fs-5 valorFormatado" value="R$ <?= number_format($product['valor'], 2, ',','.')?>">
            </div>
            <div class="col-sm-6">
                <label class="form-label fs-4">Disponível para venda</label>
                <input type="text" disabled readonly class="form-control fs-5" value="<?= $product['venda']?>" >
            </div>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <a class="btn btn-danger m-2 delete-product" title="Excluir" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-product-id="<?= $product['id']?>">
                <i class="text-white bi bi-x-circle-fill"></i> Excluir
            </a>

            <a href="app/views/products/edit.php" title="Editar" class="btn btn-warning m-2 text-white">
                <i class="text-white bi bi-pencil-square text-warning">
                </i>
                Editar
            </a>
        </div>
    </div>
    
        
<?php include_once __DIR__. '/../footer.php';?>