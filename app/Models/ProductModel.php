<?php 
session_start();
    class ProductModel{

        //atributo privado para armazenar a conexão com o banco de dados
        private $db;

        //método construtor da classe, recebe a conexão com o banco de dados e atribui ao atributop "$db"
        public function __construct($db){
            $this->db = $db;
        }

        //método que exibe todos os produtos
        public function getAllProducts(){
            //query para selecionar todos os produtos ordenados por ordem crescente
            $query = "SELECT * FROM products ORDER BY valor ASC";
            //executa a query 
            $stmt = $this->db->query($query);

            //verifica se a query retornou algum dado
            if ($stmt->rowCount() > 0){
                //retorna os produtos em forma de array
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                //retorna vazio
                return null;
            }

        }

        //método para exibir produto específico
        public function getProductById($id){
            //query para selecionar um produto referente ao id passado por parâmetro
            $query = "SELECT * FROM products WHERE id = :id";
            //prepara a query
            $stmt = $this->db->prepare($query);
            //executa a query e substitui o valor de ":id" pelo de "$id"
            $stmt->execute(array(":id" => $id));
            
            if ($stmt->rowCount() > 0){
                //retorna o produto em forma de array
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                //retorna falso
                return false;
            }
            
        }

        //método para editar um produto específico
        public function updateProduct($productData){
            //query para alterar os campos do produto 
            $query = "UPDATE products SET item = :item, valor = :value, descricao = :description, venda = :sell  WHERE id = :id";
            //prepara a query
            $stmt = $this->db->prepare($query);
            //executa a query substituindo os campos ":x" pelos valores do array "productData"
            $stmt->execute(array(":id" => $productData['id'], ":item" => $productData['item'], ":description" => $productData['description'], ":value" => $productData['value'], ":sell" => $productData['sell']));
            
            if ($stmt->rowCount() > 0){
                //adcionar uma mensagem de sucesso ao toast informativo
                $_SESSION['msg'] = "Item editado com sucesso";
                //redireciona o usuário para o index
                header('Location:index.php');
                exit;
            } else {
                $_SESSION['msg'] = "Nenhum campo foi alterado";
                //redireciona o usuário ao index
                header('Location:index.php');
            }
        }

        // método para deletar um produto
        public function dropProduct($id){
            //query para selecionar o produto referente ao id passado por parâmetro
            $query = "DELETE FROM products WHERE id = :id";
            //prepara a query
            $stmt = $this->db->prepare($query);
            //executa a query e substitui o valor de ":id" pelo de "$id"
            $stmt->execute(array(":id" => $id));

            if ($stmt->rowCount() > 0){
                $_SESSION['msg'] = "Item excluído com sucesso";
                header('Location:index.php');
                exit;
            } else {
                $_SESSION['msg'] = "Falha ao deletar item";
                header('Location:index.php');
            }
        }

        public function insertProduct($productData){
            //query para inserir os dados do produto
            $query = "INSERT INTO products SET item = :item, valor = :value, descricao = :description, venda = :sell";
            //prepara a query
            $stmt = $this->db->prepare($query);
            //executa a query e adciona os dados do array "productData"
            $stmt->execute(array(":item" => $productData['item'], ":description" => $productData['description'], ":value" => $productData['value'], ":sell" => $productData['sell']));

            if ($stmt->rowCount() > 0){
                $_SESSION['msg'] = "Item adcionado com sucesso";
                header('Location:index.php');
                exit;
            } else {
                $_SESSION['msg'] = "Falha ao adcionar item";
                header('Location:index.php');
            }
        }
    }



?>