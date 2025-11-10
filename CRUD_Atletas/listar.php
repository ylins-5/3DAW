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
                <li><a href = "incluir.php">Incluir</a></li>
                <li><a href = "alterar.php">Alterar</a></li>
                <li><a href = "excluir.php">Excluir</a></li>
                <li><a href = "listar.php">Listar</a></li>
            </ul>
    </header>
    <h1>Lista de alunos</h1>
    <table>
        <tr>
            <th>Matricula</th>
            <th>Nome</th>
            <th>Modalidade</th>
            <th>Idade</th>
            <th>Email</th>
            
        </tr>
        <?php 
        $arquivo = fopen("atletas.txt", "r") or die ("Erro ao abrir arquivo");

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
                echo "<td>$dados[4]</td>";
                echo "</tr>";

            }
        }
        
        fclose($arquivo);
        ?>

    </table>
</body>
</html>