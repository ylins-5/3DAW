<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{  
    $matriculaExcluir = $_POST["matricula"];

    $arqVelho = fopen("atletas.txt","r") or die("Erro ao abrir arquivo");
    $arqNovo = fopen("novoAtletas.txt","w") or die("Erro ao criar arquivo");

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

    rename("novoAtletas.txt", "atletas.txt");

    echo "Registro excluído com sucesso!";
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
                <li><a href = "incluir.php">Incluir</a></li>
                <li><a href = "alterar.php">Alterar</a></li>
                <li><a href = "excluir.php">Excluir</a></li>
                <li><a href = "listar.php">Listar</a></li>
            </ul>
        </header>

        <main>
            <form action="excluir.php" method="POST">
                Matrícula: <input type="text" name="matricula">
                <br>
                <input type="submit" value="Excluir">
            </form>

        </main>
    </body>
</html>