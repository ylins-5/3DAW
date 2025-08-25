<?php
    $v1 = $_GET["a"] ?? null;
    $v2 = $_GET["b"] ?? null;
    $result = $v1 + $v2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma</title>
</head>
<body>
    <form action="soma.php" method="get" name="soma">
        a:<input type="text" name="a"> 
        <br>
        b:<input type="text" name="b"> 
        <br>
        <input type="submit" value="Calcular">
    </form>
    <br><br>
    <?php 
            echo "O resultado é: $result";
    ?>
</body>
</html>
