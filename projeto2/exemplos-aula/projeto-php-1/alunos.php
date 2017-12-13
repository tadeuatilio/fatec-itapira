<?php

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


$sql = "select * from alunos";
$query = $conn->prepare($sql);

 try
 {
    $query->execute();
    $dados = $query->fetchAll(PDO::FETCH_ASSOC);
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
<table >
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Idade</th>
            
        </tr>
    </thead>   

    <tbody>
        <?php foreach ($dados as $v) { ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= $v['nome'] ?></td>
                <td><?= $v['idade'] ?></td>
               
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>