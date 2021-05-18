<?

include "controllers/Connection.php";
          
$produto = $_POST["produto"];
$carrinho = $_POST["carrinho"];
$qtde =$_POST["qtde"]; 


$sql = "INSERT INTO carrinho_produtos VALUES (NULL,'$produto', '$carrinho', '$qtde')";

$stmt = $conexao->prepare($sql);
$stmt->execute();


echo "OK";