<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pergunta = $_POST["pergunta"];
    $id = $_POST["idPergunta"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];
    $e = $_POST["e"];
    $correta = $_POST["resposta"];

    $linha = $pergunta . ";". $id . ";" . $a . ";" . $b . ";" . $c . ";" . $d . ";" . $e . ";" . $correta . "\n";

    if(!file_exists("perguntas.txt")){
        $arquivo = fopen("perguntas.txt", "w") or die ("Erro ao abrir arquivo!");
        fwrite($arquivo,$linha);
        fclose($arquivo);
    } else {
    
        $arquivo = fopen("perguntas.txt", "a") or die ("Erro ao abrir arquivo!");
        fwrite($arquivo, $linha);
        fclose($arquivo);
        $msg = "Deu tudo certo!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Perguntas e Respostas</title>
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

<?php if (!empty($msg)) echo "<p>$msg</p>"; ?>

<form action="incluirPerguntasRespostas.php" method="POST">
    Pergunta: <input type="text" name="pergunta"> <br>
    Id: <input type="text" name="idPergunta"> <br>
    Alternativa A: <input type="text" name="a"> <br>
    Alternativa B: <input type="text" name="b"> <br>
    Alternativa C: <input type="text" name="c"> <br>
    Alternativa D: <input type="text" name="d"> <br>
    Alternativa E: <input type="text" name="e"> <br>
    Alternativa correta: <input type="text" name="resposta"> <br>
    <input type="submit" value="Enviar">
</form>
</body>
</html>
