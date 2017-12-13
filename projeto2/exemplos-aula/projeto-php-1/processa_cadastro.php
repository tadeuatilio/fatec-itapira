<?php

$nome = $_POST['nome'];
$idade = $_POST['idade'];

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


$sql = "insert into alunos (nome, idade) values(:nome, :idade)";
$query = $conn->prepare($sql);

$query->bindParam(':nome', $nome);
$query->bindParam(':idade', $idade);



 try
 {
    $query->execute();
    header('Location: alunos.php');
 
 }
 catch(PDOException $e)
 {
    echo "Erro: " . $e->getMessage();
 } 
