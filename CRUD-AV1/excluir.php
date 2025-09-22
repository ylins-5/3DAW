<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $matriculaExcluir = $_POST["matricula"];

    $arqVelho = fopen("usuario.txt", "r") or die("Erro ao abrir arquivo");
    $arqNovo = fopen("novoUsuario.txt", "w") or die("Erro ao criar arquivo");

    while(($linha = fgets($arqVelho)) !== false)
    {
        $linha = trim($linha);
        if(empty($linha)) continue;

        $coluna = explode(";", $linha);

        if($coluna[0] == "matricula") {
            fwrite($arqNovo, $linha."\n");
            continue;
        }

        if ($coluna[0] != $matriculaExcluir) {
            fwrite($arqNovo, $linha."\n");
        }
    }

    fclose($arqVelho);
    fclose($arqNovo);

    rename("novoUsuario.txt", "usuario.txt");

    echo "Registro excluido com sucesso!";
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
    <form action="excluir.php" method="POST">
        Matricula: <input type="text" name="matricula">
        <br>
        <input type="submit" value="Excluir">
    </form>
</main>
</body>
</html>
