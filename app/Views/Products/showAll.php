<?php include __DIR__. '/../header.php';

?>
    <div class="container-lg mt-3">
    <div class="alert alert-success position-fixed top-0 end-0 m-3" role="alert" id="confirmationAlert" style="display: none;">
        Item excluído com sucesso!
    </div>
        <div class="table-title">
            <div class="row">
                <div class="col-xs col-sm mb-2">
                    <h2>
                        Listagem de produtos
                    </h2>
                </div>
                <div class=" col-sm-4 d-flex justify-content-end mb-2">
                    <a href="app/Views/products/addProd.php" class="text-center text-white btn btn-info add-new add-new d-flex align-items-center justify-content-center " title="Adcionar Produto">
                        <i class="bi bi-plus-circle-fill text-white"></i> <span class="d-none d-sm-inline m-1 ">Adicionar Produto</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th class = "d-none d-sm-table-cell col-2" >Opções</th>
                </tr>
            </thead>
                <tbody>
                    <?php if (isset($products)){ foreach ($products as $product){?>
                    <tr>
                        <td class="fs-5">
                            <a id="tda" class="text-black" href="index.php?action=showDetails&id=<?= $product['id']?>">
                                <span id=""><?= $product['item']?></span>
                            </a>
                        </td>
                
                        <td class="fs-5 col-4">
                            R$ <span><?= number_format($product['valor'], 2, ',', '.') ?></span>
                
                        </td>
                
                        <td class="center d-none d-sm-table-cell col-2" >
                            <a href="index.php?action=showDetails&id=<?= $product['id']?>" class="m-2" title="Detalhes" data-toggle="tooltip">
                                <i class="bi bi-info-circle-fill fs-4"></i>
                            </a>
                            <a href="" class="m-2 delete-product text-black" title="Excluir" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-product-id="<?= $product['id'] ?>">
                                <i class="bi bi-x-circle-fill text-danger fs-4"></i>
                            </a>
                        </td>
                    </tr>
                    <?php }} else {$null = "Lista vazia";?>
                        <td></td>
                        <td class="fs-5"><span class="ml-4" ><?= $null?></span>
                        </td>
                        <td></td>
                        <?php
                    }?>
                </tbody>
        </table>
    </div>
<?php include_once __DIR__. '/../footer.php';?>