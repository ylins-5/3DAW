<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Disciplinas</title>
</head>
<body>
    <h1>Listar Disciplinas</h1>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Sigla</th>
            <th>Carga Horária</th>
        </tr>

        <?php
        $arquivo = fopen("disciplinas.txt", "r");

        if ($arquivo) {
            while (!feof($arquivo)) {
                $linha = trim(fgets($arquivo));

                if ($linha == "") {
                    continue;
                }

                $dados = explode(";", $linha);

                if (count($dados) >= 3) {
                    echo "<tr>";
                    echo "<td>" . $dados[0] . "</td>";
                    echo "<td>" . $dados[1] . "</td>";
                    echo "<td>" . $dados[2] . "</td>";
                    echo "</tr>";
                }
            }
            fclose($arquivo);
        }
        ?>
    </table>

    <br>
    <a href="incluir.php">Incluir Disciplina</a> | 
    <a href="listaTodos.php">Listar Disciplinas</a> | 
    <a href="excluir.php">Excluir Disciplina</a>
</body>
</html>
