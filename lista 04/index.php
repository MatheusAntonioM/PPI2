<?php
    session_start();

    // Definição de credenciais fixas (para simplificação)
    $usuario_correto = "admin";
    $senha_correta = "1234";

    // Se já estiver logado via sessão ou cookie, redireciona para o dashboard
    if (isset($_SESSION['usuario']) || isset($_COOKIE['usuario'])) {
        header("Location: pagina_segura.php");
        exit();
    }

    // Processamento do login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $lembrar = isset($_POST['lembrar']);

        if ($usuario === $usuario_correto && $senha === $senha_correta) {
            $_SESSION['usuario'] = $usuario; // Armazena na sessão
            
            if ($lembrar) {
                setcookie("usuario", $usuario, time() + 60, "/"); // Cookie válido por 7 dias
            }
            header("Location: pagina_segura.php");
            exit();
        } else {
            $erro = "Usuário ou senha incorretos!";
        }
    }
?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form method="post">
            Usuário: <input type="text" name="usuario" required><br>
            Senha: <input type="password" name="senha" required><br>
            <input type="checkbox" name="lembrar"> Lembrar-me<br>
            <button type="submit">Entrar</button>
        </form>
    </body>
</html>