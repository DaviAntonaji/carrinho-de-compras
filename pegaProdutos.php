<?

include "controllers/Connection.php";
          
$carrinho = str_replace("'", "", $_GET["carrinho"]);


$sql = "SELECT * FROM carrinho_produtos INNER JOIN cadastro ON cadastro.id = carrinho_produtos.produto_id  WHERE carrinho_id='$carrinho'";

$stmt = $conexao->prepare($sql);
$stmt->execute();

$dados = $stmt->fetchAll();

echo json_encode($dados);