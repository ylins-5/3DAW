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
</body>
</html>