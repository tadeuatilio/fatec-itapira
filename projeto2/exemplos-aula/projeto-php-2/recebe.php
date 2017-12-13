<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$nome = $_REQUEST['nome'];
$idade = $_REQUEST['idade'];

try 
{
    $conn = new PDO("mysql:host=localhost;dbname=projeto-teste", 'root', '');
        
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
    
}
catch(PDOException $e)
{
    echo json_encode("Conexão falhou: " . $e->getMessage());
} 

$sql = "insert into alunos (nome, idade) values(:nome, :idade)";
$query = $conn->prepare($sql);

$query->bindParam(':nome', $nome);
$query->bindParam(':idade', $idade);

try{
    $query->execute();
    echo json_encode('Ok');

}catch(Exception $e){
    echo json_encode($e->getMessage());
    
}