<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $matricula = $_POST["matricula"];
        $msg = "";

        $padraoMatricula = "/^[0-9]+$/";
        $padraoEmail = "/^[\w\.-]+@[\w\.-]+\.\w+$/";
        $padraoNome = "/^[a-zA-ZÀ-ÿ\s]+$/u";;
        
        if (empty($nome) || empty($email) || empty($matricula)) {
            $msg = "Todos os campos são obrigatórios.";
            exit($msg);
        }
        
        if (!preg_match($padraoNome,$nome)){
            $msg = "O nome deve conter apenas letras e espaços.";
            exit($msg);
        }

        if (!preg_match($padraoMatricula, $matricula)) {
        $msg = "A matrícula deve conter apenas números.";
        exit($msg);
    }

        if (!preg_match($padraoEmail,$matricula)) {
        $msg = "E-mail inválido.";
        exit($msg);
        }

        if(!file_exists("alunos.txt")){
            $arquivo = fopen("alunos.txt", "w") or die ("erro ao abrir arquivo");
            $linha = "matricula;nome;email\n";
            fwrite($arquivo,$linha);
            fclose($arquivo);
        }

        $arquivo = fopen("alunos.txt", "a") or die ("erro ao abrir arquivo");
        $linha = "\n". $matricula . ";" . $nome . ";" . $email;
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
    <title>Incluir aluno</title>
</head>
<body>
    <form action = "incluir.php" method = "POST">
        Nome: <input type = "text" name = "nome"> <br>
        Email: <input type = "text" name = "email"> <br>
        Matricula: <input type = "number" name = "matricula"> <br>
        <input type="submit" value = "Criar novo aluno"></button>
    </form>
</body>
</html>