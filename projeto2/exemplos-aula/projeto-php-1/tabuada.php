<?php
$valor = $_POST['valor'];

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
   

    <tbody>
        <?php for($i = 0; $i <= 10; $i++) { ?>
            <tr>
                <td><?= $i ?></td>
                <td>x</td>
                <td><?= $valor?></td>
                <td>=</td>
                <td><?= $i * $valor ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    
</body>
</html>