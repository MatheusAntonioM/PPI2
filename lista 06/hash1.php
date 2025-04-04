<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["senha"])) {
    $senha = $_POST["senha"];

    // Função para verificar a força da senha
    function verificarForcaSenha($senha) {
        $forca = 0;
        if (strlen($senha) >= 8) $forca++;
        if (preg_match('/[A-Z]/', $senha)) $forca++;
        if (preg_match('/[a-z]/', $senha)) $forca++;
        if (preg_match('/[0-9]/', $senha)) $forca++;
        if (preg_match('/[@$!%*?&]/', $senha)) $forca++;
    
        $mensagens = ["Muito fraca", "Fraca", "Média", "Forte", "Muito forte"];
        return $mensagens[$forca];
    }

    echo "<strong>Senha informada:</strong> $senha <br><br>";

    // Verificação de força da senha
    echo "<strong>Força da senha:</strong> " . verificarForcaSenha($senha) . "<br><br>";

    // Hashes MD5 e SHA-256
    echo "<strong>MD5:</strong> " . md5($senha) . "<br>";
    echo "<strong>SHA-256:</strong> " . hash("sha256", $senha) . "<br><br>";

    // Comparação de hashes MD5 e SHA-256
    $md5 = md5($senha);
    $sha256 = hash("sha256", $senha);
    echo "<strong>Comparação MD5 vs SHA-256:</strong> " . (($md5 === $sha256) ? "Iguais" : "Diferentes") . "<br><br>";

    // Comparação de 5 algoritmos de hash
    $algoritmos = array_slice(hash_algos(), 0, 5);
    echo "<strong>Comparação entre 5 algoritmos:</strong><br>";
    foreach ($algoritmos as $alg) {
        echo "$alg: " . hash($alg, $senha) . "<br>";
    }
    echo "<br>";

    // Hash com salt aleatório
    $salt = bin2hex(random_bytes(16));
    $hashSalt = hash("sha256", $salt . $senha);
    echo "<strong>Salt:</strong> $salt <br>";
    echo "<strong>Hash com salt (SHA-256):</strong> $hashSalt <br><br>";

    // Uso de password_hash() e password_verify()
    $hashBcrypt = password_hash($senha, PASSWORD_BCRYPT);
    echo "<strong>Hash com password_hash (BCRYPT):</strong> $hashBcrypt <br>";

    echo "<strong>Verificação de senha:</strong> " . (password_verify($senha, $hashBcrypt) ? "Senha correta" : "Senha incorreta") . "<br><br>";

    // Geração de dois hashes para a mesma senha usando password_hash()
    $hash1 = password_hash($senha, PASSWORD_BCRYPT);
    $hash2 = password_hash($senha, PASSWORD_BCRYPT);
    echo "<strong>Dois hashes diferentes para a mesma senha:</strong><br>";
    echo "Hash 1: $hash1 <br>";
    echo "Hash 2: $hash2 <br>";
}
?>

<html>
<head>
    <title>Verificar Senha</title>
</head>
<body>
    <form action="verificar_senha.php" method="POST">
        <label>Digite a senha:</label>
        <input type="password" name="senha" required>
        <input type="submit" value="Verificar">
    </form>
</body>
</html>
