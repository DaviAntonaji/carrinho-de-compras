<?

include "controllers/Connection.php";
          
$nome = str_replace("'", "", $_POST["nome"]);
$cpf = str_replace("'", "", $_POST["cpf"]);
$tel =str_replace("'", "", $_POST["tel"]); 

$sql = "INSERT INTO carrinhos VALUES (NULL,'$nome', '$tel', '$cpf')";

$stmt = $conexao->prepare($sql);
$stmt->execute();


$id = $conexao->lastInsertId();
echo $id;