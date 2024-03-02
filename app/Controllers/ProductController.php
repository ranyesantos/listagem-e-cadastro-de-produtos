<?php 

    class ProductController {

        //atributo privado para armazenar a instância do model
        private $model;

        //método construtor da classe, recebe uma instância do model e atribui ao atributo "$model"
        public function __construct($model){
            $this->model = $model;
        }
        
        //metódo para mostrar todos os produtos
        public function showProducts(){
            //o atributo privado "model" chama o método "getAllProducts" e atribui a varia´vel "$products". em seguida chama a view que lista todos os produtos
            $products = $this->model->getAllProducts();
            include __DIR__. '/../Views/products/showAll.php';
        }

        //método para exibir os detalhes do item referente ao id passado por parâmetro
        public function showDetails($id){
            try {
                //atributo privado "model" chama o método "getProductById" passando o id por parâmetro
                $product = $this->model->getProductById($id);

                //se o método não retornar falso, a view de detalhes do produto é chamada
                if ($product !== false){
                    include __DIR__. '/../Views/products/showDetails.php';
                } else {
                    //se o método retornar falso, é lançada uma exceção
                    throw new Exception("Produto não encontrado");
                }
            //bloco que captura a exceção de tipo "Exception"
            } catch (Exception $e){
                //atribui uma mensagem, via superglobal $_SESSION, que informa o erro. em seguida redireciona o usuário para o index
                $_SESSION['msg'] = "Erro ao exibir detalhes do produto: " . $e -> getMessage();
                header('Location:index.php');
            }
        }

        //método para editar um produto
        public function editProduct($productData){
            //atributo privado "model" chama o método "updateProduct", passando o array "$productData" como parâmetro
            $this->model->updateProduct($productData);
        }
        //método para deletar um produto
        public function deleteProduct($id){
            // ... chama o método "dropProduct", passando o id como parametro
            $this->model->dropProduct($id);
        }
        //método para adcionar um produto
        public function addProduct($productData){
            //... chama o método "insertProduct", passando o array "productData" como parâmtro
            $this->model->insertProduct($productData);
        }

    }


?>