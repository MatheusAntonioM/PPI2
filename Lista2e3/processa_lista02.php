<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados - Lista 02</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Resultados - Lista 02</h1>
    <?php
        function verificarNumero($num) {
            return ($num > 0) ? "O número $num é positivo." : (($num < 0) ? "O número $num é negativo." : "O número é zero.");
        }

        function compararNumeros($a, $b) {
            return ($a > $b) ? "$a é maior que $b." : (($b > $a) ? "$b é maior que $a." : "Os números são iguais.");
        }

        function parOuImpar($num) {
            return ($num % 2 == 0) ? "$num é par." : "$num é ímpar.";
        }

        function statusNota($nota) {
            if ($nota >= 7) return "Aprovado";
            elseif ($nota >= 5) return "Recuperação";
            else return "Reprovado";
        }

        function tabuada($num) {
            echo "<h2>Tabuada do $num</h2>";
            for ($i = 1; $i <= 10; $i++) {
                echo "$num x $i = " . ($num * $i) . "<br>";
            }
        }

        echo verificarNumero($_POST["num1"]) . "<br>";
        echo compararNumeros($_POST["num2"], $_POST["num3"]) . "<br>";
        echo parOuImpar($_POST["num4"]) . "<br>";
        echo "Status da nota: " . statusNota($_POST["nota"]) . "<br>";
        tabuada($_POST["tabuada"]);
    ?>
    <br><a href="lista02.php">Voltar</a>
</body>
</html>
