<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cargo = $_POST["cargo"];
    $matricula = $_POST["matricula"];

    if(!file_exists("usuario.txt")){
        $arquivo = fopen("usuario.txt", "w") or die ("Erro ao abrir arquivo!");
        $linha = "matricula;nome;cargo;email;";
        fwrite($arquivo,$linha);
        fclose($arquivo);
    }

    $arquivo = fopen("usuario.txt", "a") or die ("Erro ao abrir arquivo!");
    $linha = "\n" . $matricula . ";" . $nome . ";" . $cargo . ";" . $email;
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
        <li><a href="incluir.php">Incluir Usuário</a></li>
        <li><a href="alterar.php">Alterar Usuário</a></li>
        <li><a href="excluir.php">Excluir Usuário</a></li>
        <li><a href="listar.php">Listar Usuário</a></li>
        <li><a href="incluirPerguntasRespostas.php">Incluir Perguntas e Respostas</a></li>
        <li><a href="alterarPerguntasRespostas.php">Alterar Perguntas e Respostas</a></li>
        <li><a href="excluirPerguntasRespostas.php">Excluir Perguntas e Respostas</a></li>
        <li><a href="listarPerguntasRespostas.php">Listar Perguntas e Respostas</a></li>
        <li><a href="listarUmaPergunta.php">Listar Uma Pergunta</a></li>
    </ul>
</header>

<form action = "incluir.php" method = "POST">
    Nome: <input type = "text" name = "nome"> <br>
    Email: <input type = "text" name = "email"> <br>
    Cargo: <input type = "text" name = "cargo"> <br>
    Matricula: <input type = "number" name = "matricula"> <br>
    <input type = "submit" value = "Enviar">
</form>
</body>
</html>
