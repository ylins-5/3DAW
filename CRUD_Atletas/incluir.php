<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST["nome"];
        $modalidade = $_POST["modalidade"];
        $email = $_POST["email"];
        $idade = $_POST["idade"];
        $matricula = $_POST["matricula"];

        if(!file_exists("atletas.txt")){
            $arquivo = fopen("atletas.txt", "w") or die ("Erro ao abrir arquivo!");
            $linha = "matricula;nome;modalidade;idade;email;";
            fwrite($arquivo,$linha);
            fclose($arquivo);
        }

        $arquivo = fopen("atletas.txt", "a") or die ("Erro ao abrir arquivo!");
        $linha = "\n" . $matricula . ";" . $nome . ";" . $modalidade . ";" . $idade . ";" . $email;
        fwrite($arquivo,$linha);
        fclose($arquivo);
        $msg = "Deu tudo certo!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
            <ul>
                <li><a href = "incluir.php">Incluir</a></li>
                <li><a href = "alterar.php">Alterar</a></li>
                <li><a href = "excluir.php">Excluir</a></li>
                <li><a href = "listar.php">Listar</a></li>
            </ul>
    </header>
    <form action = "incluir.php" method = "POST">
        Nome: <input type ="text" name = "nome"> <br>
        Email: <input type ="text" name = "email"> <br>
        Modalidade: <input type ="text" name = "modalidade"> <br>
        Idade: <input type ="number" name = "idade"> <br>
        Matricula: <input type ="number" name = "matricula"> <br>
        <input type = "submit" value = "Enviar">
    </form>
</body>
</html>