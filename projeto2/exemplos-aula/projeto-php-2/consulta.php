<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

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

$sql = "select * from alunos";
$query = $conn->prepare($sql);

try{
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}catch(Exception $e){
    echo json_encode($e->getMessage());
    
}