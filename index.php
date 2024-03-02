<?php 

    include 'app/Controllers/ProductController.php';
    include 'app/Models/ProductModel.php';

    //estabelece conexão com o banco de dados
    $db = new PDO('mysql:host=localhost;dbname=oak-database','root','');

    //cria uma instância que concede acesso ao banco de dados para o model
    $model = new ProductModel($db);

    //cria uma instância que concede acesso ao model para o controller
    $controller = new ProductController($model);

    //atribui os parâmetros ao action e ao id por método GET caso existam parâmetros
    $action = $_GET['action'] ?? "showProducts";
    $id = $_GET['id'] ?? null;

    //verifica se o método da requisição é POST e a existência de dados dos formulários de edição e cadastro de produtos, em seguida atribui esses dados no array "productData"
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item'], $_POST['description'], $_POST['value'], $_POST['sell'])) {
        $productData = [
            'id' => $_POST['id'],
            'item' => $_POST['item'],
            'description' => $_POST['description'],
            'value' => $_POST['value'],
            'sell' => $_POST['sell']
        ];
    }

    //switch-case que é responsável por realizar o roteamento com base na variável "action"
    switch ($action){

        //chama o método do controlador para exibir todos os produtos
        case 'showProducts':
            $controller -> showProducts();
            break;

        //chama o método do controlador para exibir os detalhes do produto referente ao id fornecido
        case 'showDetails':
            $controller -> showDetails($id);
            break;

        //... para editar o produto com os dados fornecidos pelo array $productData
        case 'editProduct':
            $controller -> editProduct($productData);
            break;

        //... para deletar os dados do produto referente ao id fornecido
        case 'deleteProduct':
            $controller -> deleteProduct($id);
            break;

        //... para adcionar um produto com os dados fornecidos pelo array $productData
        case 'addProduct':
            $controller -> addProduct($productData);
            break;
    }

?>