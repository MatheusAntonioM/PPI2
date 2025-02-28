<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista 02 - Condicionais e Laços</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Lista 02 - Exercícios</h1>
    <form action="processa_lista02.php" method="POST">
        <label>Digite um número para verificar se é positivo, negativo ou zero:</label>
        <input type="number" name="num1" required><br>

        <label>Digite dois números para comparar:</label>
        <input type="number" name="num2" required>
        <input type="number" name="num3" required><br>

        <label>Digite um número para verificar se é par ou ímpar:</label>
        <input type="number" name="num4" required><br>

        <label>Digite sua nota (0 a 10):</label>
        <input type="number" name="nota" step="0.1" required><br>

        <label>Digite um número para ver a tabuada:</label>
        <input type="number" name="tabuada" required><br>

        <button type="submit">Enviar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
