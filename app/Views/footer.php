<script>

    function voltarPagina() {
        window.history.back();
    }
    
    //formata o valor enquanto está sendo digitado pelo usuário
    $(document).ready(function(){
        $('#valor').mask('000.000.000,00', {reverse: true});
    });

    //tratamento de formatação do valor antes de ser enviado para o banco de dados
    $(document).ready(function(){
        $('#productForm').submit(function(event){
            var valor = $('#valor').val();

            //verifica se há vírgula e ponto no valor
            if (valor.includes(',') && valor.includes('.')) {
                //se houver, substitui vírgula por ponto e o ponto é removido
                valor = valor.replace('.', '');
            }
            
            //verifica se há dois pontos no valor  
            if (valor.includes('..')) {
                //se houver, os pontos são removidos
                valor = valor.replace(/^(\.\.)/, '');
            }
            
            //verifica se há virgula no valor.
            if (valor.includes(',')) {
                //se houver, troca a vírgula por ponto
                valor = valor.replace(',', '.');
            }
            
            //substitui o valor recebido pelo valor tratado
            $('#valor').val(valor);
        });
    });

    $(document).ready(function() {
        $('.delete-product').click(function() {
            // obtém o valor do atributo "data-product-id" de elementos da classe "delete-product"
            var productId = $(this).data('product-id');

            //atribui o valor do obtido no "data-product-id" ao botão de excluir do modal
            $('#confirmDeleteModal').find('#confirmDeleteButton').attr('data-product-id', productId);
        });
    
        //guarda o id do produto que será excluìdo quando o botão de confirmação for clicado
        $('#confirmDeleteButton').click(function() {
            var productId = $(this).data('product-id');

            //envia a requisição junto com o id do produto que será excluído
            window.location.href = 'index.php?action=deleteProduct&id=' + productId;
        });
    });

    //adciona animação ao toast de mensagem informativa
    document.addEventListener('DOMContentLoaded', function() {
        var toast = new bootstrap.Toast(document.querySelector('.toast'));
        toast.show();
    });
    
</script>

</body>
</html>