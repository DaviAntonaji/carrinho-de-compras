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
               
                <a href="carrinho.php" class="btn btn-primary">←</a>
               
               <h1>Suas informações</h1>
               <hr>

               <form method="POST" id ="form">
               

                        <input required type="text" class="form-control" placeholder="Digite seu Nome" id="nome" name="nome" style="margin-bottom:5px;">
                        <input required type="text" class="form-control" placeholder="Digite seu CPF" id="cpf" name="cpf" style="margin-bottom:5px;">
                        <input required type="text" class="form-control" placeholder="Digite seu Telefone" id="tel" name="tel" style="margin-bottom:5px;">
                       
               <hr>

           
               <div style="margin-top:90px"  class="container" >
        <h1>Carrinho</h1>
        <div class="row text-center"  style="border: 2px solid black; ">

        <div class="col-md-4">
           <h3>Produto</h3>
        
        </div>
        <div class="col-md-4">
        <h3>Quantidade</h3>
        </div>

        <div class="col-md-4">
        <h3>Preço</h3>
        </div>

        
        </div>

        <div class="row text-center"  style="border: 2px solid black;margin-bottom:15px; " id="carrinho">

        </div>
        <p>Preço total: <span id="precoTotal"></span></p>
         <button type="submit" class="btn btn-primary btn-lg" id="btnComprar" disabled>Comprar
         </button>
                 </div>
                 <div style="margin-bottom:120px;"></div>
                            
               
               </form>

            
               </div>
    </div>
                        
              



    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

var precoTotal =0;

function refreshTable() {
        $("#carrinho").html("");
        let storage = allStorage()

        let total = 0;
        

        for(let key in storage) {
           if(!isNaN(key)) {
            total++;
           result = localStorage.getItem(key);
           result = result.split("|");
           qtde = result[0];
           preco = result[2] * qtde;
           window.precoTotal = precoTotal + preco;
           console.log("QDTE",qtde)
           nome = result[1];
           console.log(key,result, "OK");
            let html = "<div class='col-md-4' style='padding:30px;'> "+nome+"  </div><div class='col-md-4' style='padding:30px;'> "+qtde+"  </div><div class='col-md-4' style='padding:30px;'> R$ "+preco+"  </div> </div>";
           $("#carrinho").append(html);
           }

        }
        window.precoTotal = precoTotal.toFixed(2)
        $("#precoTotal").html(window.precoTotal)
        console.log("TOTAL",total)
        if(total == 0) {
            $("#btnComprar").prop("disabled",true);
        }else {
            $("#btnComprar").prop("disabled",false);
        }
        
      
        
    }
    function allStorage() {

var archive = {}, // Notice change here
    keys = Object.keys(localStorage),
    i = keys.length;

while ( i-- ) {
    archive[ keys[i] ] = localStorage.getItem( keys[i] );
}


return archive;
}

$(document).ready(function() {
    refreshTable()  
    
     //option A
     $("#form").submit(function(e){
                e.preventDefault();
                console.log("SUBMIT");

                Swal.fire({
           title: 'Tem certeza?',
           text: "Deseja realmente efetuar essa compra?",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Sim!'
           }).then((result) => {
           if (result.isConfirmed) {
            console.log("CONFIRMOU");
            let nome = $("#nome").val()
            let cpf = $("#cpf").val();
            let tel = $("#tel").val()
            var carrinho_id = "";
            console.log(nome,cpf,tel)

            $.post("criarCarrinho.php", {nome: nome,cpf:cpf,tel:tel}, function(result){
                console.log("RESULT",result)
                carrinho_id = result;
                let storage = allStorage();

                $.post("addCompra.php", {carrinho: carrinho_id, preco_total: window.precoTotal},function(success) {
                console.log(success)
            })
           
            for(let key in storage) {
        
                if(!isNaN(key)) {
                    result = localStorage.getItem(key);
                result = result.split("|");
                qtde = result[0];
                preco = result[2] * qtde;
                
                $.post("addProdutoCarrinho.php", {qtde:qtde, produto:key, carrinho:carrinho_id}, function(success) {
                    console.log(success);
                })
                }
            
           

            }

           


            
            Swal.fire(
            'Sucesso!',
            'Compra efetuada com sucesso!',
            'success'
            )
        
            setTimeout(function() {
                localStorage.clear();
                refreshTable()
            },1000)
            });

            

            

            
           
           }
           })



           
       

        });

})
    


</script>
</html>