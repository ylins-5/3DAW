<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pergunta e Respostas</title>
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

<h1>Lista de Pergunta e Respostas</h1>

<form method="POST">
    Digite o ID da pergunta: <input type="text" name="idPergunta">
    <button type="submit">Buscar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idBusca = $_POST["idPergunta"];
    $arquivo = fopen("perguntas.txt", "r") or die("Erro ao abrir arquivo");

    if ($arquivo) {
        while (!feof($arquivo)) {
            $linha = fgets($arquivo);
            if (empty(trim($linha))) continue;

            $dados = explode(";", trim($linha));

            if ($dados[1] == $idBusca) {
                echo "<table>";
                echo "<tr>
                        <th>Pergunta</th>
                        <th>Id</th>
                        <th>Alternativa A</th>
                        <th>Alternativa B</th>
                        <th>Alternativa C</th>
                        <th>Alternativa D</th>
                        <th>Alternativa E</th>
                        <th>Alternativa Correta</th>
                      </tr>";
                echo "<tr>";
                echo "<td>$dados[0]</td>";
                echo "<td>$dados[1]</td>";
                echo "<td>$dados[2]</td>";
                echo "<td>$dados[3]</td>";
                echo "<td>$dados[4]</td>";
                echo "<td>$dados[5]</td>";
                echo "<td>$dados[6]</td>";
                echo "<td>$dados[7]</td>";
                echo "</tr>";
                echo "</table>";
                break; 
            }
        }
        fclose($arquivo);
    }
}
?>
</body>
</html>
