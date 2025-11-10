<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
{    
    $arqVelho = fopen("atletas.txt","r") or die("Erro ao abrir arquivo");
    $arqNovo  = fopen("novoAtletas.txt","w") or die("Erro ao criar arquivo");

    // valores atuais enviados pelo form
    $matricula = $_POST["matricula"];

    // novos valores
    $novoNome       = $_POST["novonome"];
    $novoEmail      = $_POST["novoemail"];
    $novoModalidade = $_POST["novomodalidade"];
    $novoIdade      = $_POST["novoidade"];
    $novoMatricula  = $_POST["novomatricula"];

    while(($linha = fgets($arqVelho)) !== false)
    {   
        $linha = trim($linha);
        if ($linha === "") continue;

        $coluna = explode(";", $linha);

        // mantém cabeçalho
        if ($coluna[0] == "nome") {
            fwrite($arqNovo, $linha . PHP_EOL);
            continue;
        }

        // se matrícula bate, troca a linha inteira
        if ($coluna[0] == $matricula) {
            $linha = $novoMatricula . ";" . $novoNome . ";" . $novoModalidade . ";" . $novoIdade . ";" . $novoEmail ;
        }

        fwrite($arqNovo, $linha . PHP_EOL);
    }

    fclose($arqVelho);
    fclose($arqNovo);

    rename("novoAtletas.txt", "atletas.txt");

    echo "Linha alterada com sucesso!";
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
            <form action="alterar.php" method="POST">
                Matrícula (atual): <input type="text" name="matricula">
                <br><br>
                Novo Nome: <input type="text" name="novonome">
                <br><br>
                Novo Email: <input type="text" name="novoemail">
                <br><br>
                Nova Modalidade: <input type="text" name="novomodalidade">
                <br><br>
                Nova Idade: <input type="text" name="novoidade">
                <br><br>
                Nova Matrícula: <input type="text" name="novomatricula">
                <br><br>

    <input type="submit" value="Alterar">
</form>
        </main>
    </body>
</html>