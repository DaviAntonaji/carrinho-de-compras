<!doctype html>
<html>
    <head>
        
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title> Vitrine de produtos</title>
        <link rel="stylesheet" href="style.css">
           <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>

    <?php include "header.php" ?>

    <div class="container-fluid header">
               <div class="container" style="margin-top:150px;">
               

               
               <h1>Relátorio de vendas</h1>
               <hr>

               <div class="row">

               <div class="col-md-2">
               <h4>Nome:</h4>
               </div>
               <div class="col-md-2">
                <h4> CPF:</h4>
               </div>
               <div class="col-md-2">
               <h4>Telefone:</h4>
               </div>
                <div class="col-md-2">
                <h4>Preço Total:</h4>
                </div>
                <div class="col-md-2">
                <h4>Momento:</h4>
                </div>
                <div class="col-md-2">
                <h4> Detalhes:</h4>
                </div>
              

               <?php
           include "controllers/Connection.php";
          
         
           $sql = "SELECT vendas.venda_id, vendas.carrinho_id, vendas.momento,vendas.preco_total, carrinhos.carrinho_nome,carrinhos.carrinho_tel,carrinhos.carrinho_cpf FROM vendas INNER JOIN carrinhos ON carrinhos.carrinho_id = vendas.carrinho_id;";

           $stmt = $conexao->prepare($sql);
           $stmt->execute();
         
           $res = $stmt->fetchAll();

           foreach($res as $linha) {
               ?>
                 <div class="col-md-2">
                 <?=$linha["carrinho_nome"]?>
               </div>
               <div class="col-md-2">
               <?=$linha["carrinho_cpf"]?>
               </div>
               <div class="col-md-2">
               <?=$linha["carrinho_tel"]?>
               </div>
                <div class="col-md-2">
                <?=$linha["preco_total"]?>
                </div>
                <div class="col-md-2">
                <?=date("d/m/Y H:i:s",strtotime($linha["momento"]))?>
                </div>
                <div class="col-md-2">
                <button onclick="visualizar('<?=$linha["carrinho_id"]?>')" class="btn btn-success">Visualizar</button>
                </div>
              
               <?
           }

           ?>

           
        </div>
        

        
               
               </div>
    </div>
                        
              



    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>


function visualizar(id,) {
  
    $.get("pegaProdutos.php?carrinho="+id, function(success) {
        let dados = JSON.parse(success);
        console.log("Dados",dados)
        var html = "<div class='row'>"

        html += "<div class='col-md-3' style='padding:6px;'><h4>Produto</h4></div>"
        html += "<div class='col-md-3' style='padding:6px;'><h4>Quantidade</h4></div>"
        html += "<div class='col-md-3' style='padding:6px;'><h4>Preço Unitário</h4></div>"
        html += "<div class='col-md-3' style='padding:6px;'><h4>Preço total</h4></div>"

        for(key in dados) {
            dado = dados[key];
            let valorTotal = parseFloat(dado.qtde) * parseFloat(dado.valor)


            html += "<div class='col-md-3' style='padding:6px;'> "+dado.produto+" </div>"
            html += "<div class='col-md-3' style='padding:6px;'> "+dado.qtde+" </div>"
            html += "<div class='col-md-3' style='padding:6px;'> "+dado.valor+" </div>"
            html += "<div class='col-md-3' style='padding:6px;'> "+valorTotal+" </div>"
        }


        html += "</div>"
        Swal.fire({
 
  html: html
 
})
   
        
    })
}

</script>

</html>