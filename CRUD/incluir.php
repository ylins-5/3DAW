<?php
    $msg = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $nome = $_POST["nome"];
        $sigla = $_POST["sigla"];
        $carga = $_POST["carga"];
        $msg = "";

        if (!file_exists("disciplinas.txt")){
            $arqDisc = fopen("disciplinas.txt","w") or die("erro ao criar arquivo");
            $linha = "Nome;Sigla;Carga\n";
            fwrite($arqDisc,$linha);
            fclose($arqDisc);
        }
        
        // echo "nome: " . $nome . " sigla: " . " carga: " . $carga;
        $arqDisc = fopen("disciplinas.txt","a") or die("erro ao criar arquivo");
        $linha = $nome . ";" . $sigla . ";" . $carga . "\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);
        $msg = "Deu tudo certo!!!";
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
                flex-direction: column;
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
            <h1>Criar Nova Disciplina</h1>

            <form action="incluir.php" method="POST">
                Nome: <input type="text" name="nome">
                <br><br>
                Sigla: <input type="text" name="sigla">
                <br><br>
                Carga Horaria: <input type="text" name="carga">
                <br><br>
                <input type="submit" value="Criar Nova Disciplina">
            </form>
            <p><?php echo $msg ?></p><br>
        </main>
    </body>
</html>