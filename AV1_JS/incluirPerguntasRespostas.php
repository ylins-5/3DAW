<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $pergunta = $_GET["pergunta"];
    $id = $_GET["idPergunta"];
    $tipo = $_GET["tipo"];

    if ($tipo == "multipla") {
        $a = $_GET["a"];
        $b = $_GET["b"];
        $c = $_GET["c"];
        $d = $_GET["d"];
        $e = $_GET["e"];
        $correta = $_GET["resposta"];

        $linha = $pergunta . ";" . $id . ";" . $tipo . ";" . $a . ";" . $b . ";" . $c . ";" . $d . ";" . $e . ";" . $correta . "\n";
        
    } else {
        $respostaTexto = $_GET["respostaTexto"];
        $linha = $pergunta . ";" . $id . ";" . $tipo . ";" . $respostaTexto . "\n";
    }

    if (!file_exists("perguntas.txt")) {
        $arquivo = fopen("perguntas.txt", "w") or die("Erro ao abrir arquivo!");
        fwrite($arquivo, $linha);
        fclose($arquivo);
        echo "Pergunta incluída com sucesso!<br>" . $linha;
    } else {
        $arquivo = fopen("perguntas.txt", "a") or die("Erro ao abrir arquivo!");
        fwrite($arquivo, $linha);
        fclose($arquivo);
        echo "Pergunta incluída com sucesso!<br>" . $linha;
    }
}
?>
