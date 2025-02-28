<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados - Lista 03</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Resultados - Lista 03</h1>
    <?php
        $valores = explode(",", $_POST["valores"]);
        sort($valores);
        echo "Array ordenado: " . implode(", ", $valores) . "<br>";

        $nomes = ["Ana", "Carlos", "Bruno", "Diana", "Elisa"];
        $busca = $_POST["nomeBusca"];

        if (in_array($busca, $nomes)) {
            echo "$busca foi encontrado no array.";
        } else {
            echo "$busca NÃO foi encontrado no array.";
        }
    ?>
    <br><a href="lista03.php">Voltar</a>
</body>
</html>
