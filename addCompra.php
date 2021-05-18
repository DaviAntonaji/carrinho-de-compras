<?

include "controllers/Connection.php";
          

$carrinho = $_POST["carrinho"];
$preco_total = $_POST["preco_total"];

$sql = "INSERT INTO vendas VALUES (NULL,'$carrinho', NOW(),'$preco_total')";


$stmt = $conexao->prepare($sql);
$stmt->execute();

echo "OK";


