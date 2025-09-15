<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar O ARQUIVO</title>
</head>
<body>

    <h1>Lista de Alunos</h1>

    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Matricula</th>
        </tr>

    <?php
        $arquivo = fopen ("alunos.txt","r") or die ("Falha ao abrir o arquivo");
        
        if($arquivo){

            $linha = fgets($arquivo);

            while(!feof($arquivo)){
                $linha = fgets($arquivo);

                $dados = explode(";", $linha);

                echo "<tr>";
                echo "<td>$dados[0]</td>";
                echo "<td>$dados[1]</td>";
                echo "<td>$dados[2]</td>";
                echo "</tr>";
            }
        }

        fclose ($arquivo);
    ?>

    </table>
</body>
</html>