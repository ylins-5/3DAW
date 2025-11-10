<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $arqVelho = fopen("usuario.txt","r") or die("Erro ao abrir arquivo");
    $arqNovo = fopen("novoUsuario.txt","w") or die("Erro ao criar arquivo");

    $matricula = $_POST["matricula"];

    $novoNome = $_POST["novoNome"];
    $novoEmail = $_POST["novoEmail"];
    $novoCargo = $_POST["novoCargo"];
    $novoMatricula = $_POST["novoMatricula"];

    while(($linha = fgets($arqVelho)) !== false) {
        $linha = trim($linha);
        if(empty($linha)) continue;

        $coluna = explode(";", $linha);

        if ($coluna[0] == "nome") {
            fwrite($arqNovo, $linha . "\n");
            continue;
        }

        if ($coluna[0] == $matricula) {
            $linha = $novoMatricula . ";" . $novoNome . ";" . $novoCargo . ";" . $novoEmail ;
        }

        fwrite($arqNovo, $linha . "\n");
    }

    fclose($arqVelho);
    fclose($arqNovo);

    rename("novoUsuario.txt", "usuario.txt");

    echo "Linha alterada com sucesso!";
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

<main>
    <form action="alterar.php" method="POST">
        Matricula (atual): <input type="text" name="matricula">
        <br>
        Novo Nome: <input type="text" name="novoNome">
        <br>
        Novo Email: <input type="text" name="novoEmail">
        <br>
        Novo Cargo: <input type="text" name="novoCargo">
        <br>
        Nova Matricula: <input type="text" name="novoMatricula">
        <br>
        <input type="submit" value="Alterar">
    </form>
</main>
</body>
</html>
