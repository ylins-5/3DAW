<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $arqVelho = fopen("perguntas.txt","r") or die("Erro ao abrir arquivo");
    $arqNovo = fopen("novoPerguntas.txt","w") or die("Erro ao criar arquivo");

    $idPergunta = $_POST["idPergunta"];
    $novaPergunta = $_POST["nPergunta"];
    $tipo = $_POST["tipo"];

    if($tipo == "multipla"){
        $novoA = $_POST["nA"];
        $novoB = $_POST["nB"];
        $novoC = $_POST["nC"];
        $novoD = $_POST["nD"];
        $novoE = $_POST["nE"];
        $novoCorreta = $_POST["nCorreta"];
    } else {
        $novaRespostaTexto = $_POST["nRespostaTexto"];
    }

    while(($linha = fgets($arqVelho)) !== false) {
        $linha = trim($linha);
        if(empty($linha)) continue;

        $coluna = explode(";", $linha);

        if ($coluna[1] == $idPergunta) {
            if($tipo == "multipla"){
                $linha = $novaPergunta . ";" . $idPergunta . ";" . $tipo . ";" . $novoA . ";" . $novoB . ";" . $novoC . ";" . $novoD . ";" . $novoE . ";" . $novoCorreta;
            } else {
                $linha = $novaPergunta . ";" . $idPergunta . ";" . $tipo . ";" . $novaRespostaTexto;
            }
        }

        fwrite($arqNovo, $linha . "\n");
    }

    fclose($arqVelho);
    fclose($arqNovo);

    rename("novoPerguntas.txt", "perguntas.txt");

    echo "Pergunta alterada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Perguntas e Respostas</title>
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
    <form action="alterarPerguntasRespostas.php" method="POST">
        ID Pergunta: <input type="text" name="idPergunta"><br>
        Nova Pergunta: <input type="text" name="nPergunta"><br>
        Tipo:
        <select name="tipo">
            <option value="multipla">Múltipla Escolha</option>
            <option value="texto">Resposta em Texto</option>
        </select>
        <br>

        Nova Alternativa (A): <input type="text" name="nA"><br>
        Nova Alternativa (B): <input type="text" name="nB"><br>
        Nova Alternativa (C): <input type="text" name="nC"><br>
        Nova Alternativa (D): <input type="text" name="nD"><br>
        Nova Alternativa (E): <input type="text" name="nE"><br>
        Nova Alternativa Correta: <input type="text" name="nCorreta"><br>

        Nova Resposta Texto: <input type="text" name="nRespostaTexto"><br>

        <input type="submit" value="Alterar">
    </form>
</main>
</body>
</html>
