<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {  
        $arqVelho = fopen("disciplinas.txt","r") or die("erro ao criar arquivo");
        $arqNovo = fopen("novoDisciplinas.txt","w") or die("erro ao criar arquivo");

        $Nome = $_POST["nome"];
        $Sigla = $_POST["sigla"];
        $Carga = $_POST["carga"];

        while(!feof($arqVelho))
        {   
            $linha = fgets($arqVelho);

            $coluna = explode(";", $linha); //explode separa uma string em posicoes de um array separando por determinado delimitador

            if (($Nome =! $coluna[0]) && ($Sigla =! $coluna[1]) && ($Carga =! $coluna[2]))
            {
                fwrite($arqNovo,$linha);
            }
        }

        fclose($arqVelho);
        fclose($arqNovo);

        $arqVelho = fopen("disciplinas.txt","w") or die("erro ao criar arquivo");
        $arqNovo = fopen("novoDisciplinas.txt","r") or die("erro ao criar arquivo");

        while(!feof($arqNovo))
        {   
            $linha = fgets($arqNovo);
            fwrite($arqVelho,$linha);
        }

        fclose($arqVelho);
        fclose($arqNovo);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            html, body{
                height: 100%;
                padding: 0;
                margin: 0;
            }

            main{
                display: flex;
                justify-content: center;
                align-items: center; 
            }

            header{
                padding: 10px;
            }

            ul{
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
                list-style: none;
                margin: 0;
            }

            li{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 150px;
                height: 30px;
                border: 2px solid black;
            }

            a{
                font-size: 1.2em;
                text-decoration: none;
                background-color: white;
                color: black;
            }
        </style>
    </head>

    <body>
        <header>
            <ul>
                <li><a href = "incluir.php">Incluir</a></li>
                <li><a href = "alterar.php">Alterar</a></li>
                <li><a href = "excluir.php">Excluir</a></li>
                <li><a href = "listaTodos.php">Listar Todos</a></li>
            </ul>
        </header>

        <main>
            <form action="excluir.php" method="POST">
                Nome: <input type="text" name="nome">
                <br><br>
                Sigla: <input type="text" name="sigla">
                <br><br>
                Carga Horaria: <input type="text" name="carga">
                <br><br>
                <input type="submit" value="Excluir">
            </form>
        </main>
    </body>
</html>