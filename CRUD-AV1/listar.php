<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
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

<h1>Lista de Usuários</h1>
<table>
<tr>
    <th>Matricula</th>
    <th>Nome</th>
    <th>Cargo</th>
    <th>Email</th>
</tr>
<?php
$arquivo = fopen("usuario.txt", "r") or die ("Erro ao abrir arquivo");

if($arquivo){
    $linha = fgets($arquivo);

    while(!feof($arquivo)){
        $linha = fgets($arquivo);

        if(empty($linha)) continue;

        $dados = explode(";", $linha);

        echo "<tr>";
        echo "<td>$dados[0]</td>";
        echo "<td>$dados[1]</td>";
        echo "<td>$dados[2]</td>";
        echo "<td>$dados[3]</td>";
        echo "</tr>";
    }
}

fclose($arquivo);
?>
</table>
</body>
</html>
