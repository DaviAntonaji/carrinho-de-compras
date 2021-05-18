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
               

               
               <h1>Vitrine de produtos - Dinamica</h1>
               <hr>

               <div class="row">
           
           <?php
           include "controllers/Connection.php";
          
           $LoopH=5;
           $sql = "SELECT * FROM cadastro";

           $stmt = $conexao->prepare($sql);
           $stmt->execute();
         
           $res = $stmt->fetchAll();
           
           foreach($res as $lista) {
                $nome = $lista["produto"];
                $nome = str_replace("'", '"', $nome);

                if(strlen($nome) >= 15) {
                    $nome = substr($nome, 0 ,15);
                    $nome .= "...";
                }
                ?>
                <div class="col-md-4 col-lg-3 text-center">
                
                <img src="<?=$lista["caminho_foto"]?>" style="width:150px; height:125px;"/><br>
                <h3><?=$nome?></h3>
                <h4>R$ <?=$lista["valor"]?></h4>
                <button onclick="detalheProdutos(<?=$lista["id"]?>,'<?=str_replace(array("\n", "\r"),"",str_replace("'", "", $lista["descricao"]))?>','<?=str_replace("'", "", $lista["produto"])?>', '<?=$lista["caminho_foto"]?>') " class="btn btn-success">Detalhes</button><br><br>
                <button onclick="addCarrinho(<?=$lista['id']?>, '<?=$lista["valor"]?>', '<?=str_replace("'", '', $lista['produto'])?>');" class="btn btn-primary">Adicionar ao carrinho</button>
                <div style="margin-bottom:55px;"></div>
                </div>
                <?

                $i++;
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

           function detalheProdutos(id,descricao,nome, imagem) {

             
            Swal.fire({
                title: nome,
                text: descricao,
                imageUrl: imagem,
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Imagem do produto',
            })

           } 

    function comprar() {
        window.location.href = "comprar.php";
    }

    function addCarrinho(id, preco, nome) {
        if(localStorage.getItem(id) != undefined) {
            let res = localStorage.getItem(id);
            res = res.split("|");
            let qtde = res[0];
            qtde = parseInt(qtde);
            newqtde = qtde +1;
        }else {
            newqtde = 1;
        }
        localStorage.setItem(id, newqtde+"|"+nome + "|" + preco);

                Swal.fire(
            'Sucesso!',
            'Item adicionado ao seu carrinho!',
            'success'
            )
        
      
    }
   
   

    


</script>
</html>