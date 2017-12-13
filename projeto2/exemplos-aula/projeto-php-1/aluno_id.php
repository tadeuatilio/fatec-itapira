<?php

$id = $_GET['valor'];

try 
{
    $conn = new PDO("mysql:host=localhost;dbname=projeto-teste", 'root', '');
        
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
    
}
catch(PDOException $e)
{
    echo "Conexão falhou: " . $e->getMessage();
} 


$sql = "select * from alunos where id = :id";
$query = $conn->prepare($sql);

$query->bindParam(':id', $id);

 try
 {
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);
 }
 catch(PDOException $e)
 {
    echo "Erro: " . $e->getMessage();
 } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

 <p>Nome do aluno: <?= $dados['nome']?></p>
 <p>Idade do aluno: <?= $dados['idade']?></p>

</body>
</html>