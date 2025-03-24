<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redireciona para a página de login se não estiver logado
    exit();
}

// Se o usuário estiver logado, exibe o conteúdo da página segura
?>

<html>
<head>
    <title>Página Segura</title>
</head>
<body>
    <h2>Bem-vindo à Página Segura!</h2>
    <p>Este conteúdo só é visível para usuários logados.</p>
    <a href="logout.php">Sair</a>
</body>
</html>
