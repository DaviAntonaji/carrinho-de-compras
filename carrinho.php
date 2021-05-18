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
               
                <a href="index.php" class="btn btn-primary">←</a>
               
              
               <hr>

           
               <div class="container" >
               <h1>Carrinho de compras</h1>
        <div class="row text-center"  style="border: 2px solid black; ">

        <div class="col-md-3">
           <h3>Produto</h3>
        
        </div>
        <div class="col-md-3">
        <h3>Quantidade</h3>
        </div>

        <div class="col-md-3">
        <h3>Preço</h3>
        </div>

        <div class="col-md-3">
        <h3>Ação</h3>
        </div>
        
        </div>

        <div class="row text-center"  style="border: 2px solid black;margin-bottom:15px; " id="carrinho">

        </div>
        <p>Preço total: <span id="precoTotal"></span></p>
         <button onclick="comprar()" class="btn btn-primary btn-lg" href="comprar.php" id="btnComprar" disabled>Comprar
         </button>
                 </div>
                 <div style="margin-bottom:120px;"></div>
                            
               
             

            
               </div>
    </div>
                        
              



    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

function removeCarrinho(id) {
       
       let res = localStorage.getItem(id);
       res = res.split("|");
       let preco = res[2]
       let nome = res[1]
       let qtde = res[0];
           qtde = parseInt(qtde);
       let newQtde = qtde -1;

       if(newQtde > 0) {
         
           localStorage.setItem(id, newQtde+"|"+nome + "|" + preco);
           refreshTable()
       }else if (newQtde < 0) {
        localStorage.removeItem(id);
               refreshTable()
       }else {

                       Swal.fire({
           title: 'Tem certeza?',
           text: "Deseja realmente apagar esse item do carrinho?",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Sim!'
           }).then((result) => {
           if (result.isConfirmed) {
               localStorage.removeItem(id);
               refreshTable()
           
           }
           })

          
       }
    
       
       
   }
  
   function comprar() {
       window.location.href = "comprar.php";
   }

  
   function refreshTable() {
        $("#carrinho").html("");
        let storage = allStorage()

        let total = 0;
        let precoTotal =0;

        for(let key in storage) {
            if(!isNaN(key)) {
                total++;
           result = localStorage.getItem(key);
           result = result.split("|");
           qtde = result[0];
           preco = result[2] * qtde;
           precoTotal+=preco;
           console.log("QDTE",qtde)
           nome = result[1];
           console.log(key,result, "OK");
            let html = "<div class='col-md-3' style='padding:30px;'> "+nome+"  </div><div class='col-md-3' style='padding:30px;'> "+qtde+"  </div><div class='col-md-3' style='padding:30px;'> R$ "+preco+"  </div><div class='col-md-3' style='padding:30px;'> <button class='btn btn-danger' onclick='removeCarrinho("+key+")'>x</button>  </div>";
           $("#carrinho").append(html);

            }
        }
        precoTotal = precoTotal.toFixed(2)
        $("#precoTotal").html(precoTotal)
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
})
    


</script>
</html>