<?php include __DIR__. '/../header.php';?>

    <form action="../../../index.php?action=addProduct" id="productForm" method="POST">
        <div class="container-lg mt-3 col-sm-8">
            <h2 class="mb-5" >Cadastrar Produto</h2>
            <div class="mb-3">
                <label class="form-label fs-4">
                    Produto
                </label>
                <input type="text" class="form-control fs-5" required name="item" value="">
            </div>
            <div class="mb-3">
                <label class="form-label fs-4">Descrição</label>
                <textarea class="form-control fs-5" required name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
            <div class="row">
                <div class="col-sm-6">
                    <label class="form-label fs-4">Valor (R$)</label>
                    <input type="text" id="valor" class="form-control fs-5" required name="value">
                </div>
                <div class="col-sm-6">
                    <label class="form-label fs-4">Disponível para venda</label>
                    <select class="form-select" name="sell">

                        <option value="Sim" >Sim</option>

                        <option value="Não" >Não</option>

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

            <button type="submit" title="Finalizar" class="text-white m-2 btn btn-success">
                <i class="bi bi-check-circle-fill"></i>
                Finalizar
            </button>
        </div>
    </form>


<?php include_once __DIR__. '/../footer.php';?>