<?php
session_start();
require_once '../config.php'; // Inclua a conexão com o banco de dados

if (!isset($_GET['token']) || !isset($_SESSION['reset_token']) || !isset($_SESSION['reset_user_id'])) {
    echo "Token inválido.";
    exit;
}

$token = $_GET['token'];

// Verifica se o token é válido
if ($token !== $_SESSION['reset_token']) {
    echo "Token inválido.";
    exit;
}

// Se o formulário for enviado, redefina a senha
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['nova_senha'];

    // Valida se a senha tem exatamente 8 caracteres
    if (strlen($nova_senha) !== 8) {
        echo "<div class='container mt-5'><div class='alert alert-danger'>A senha deve ter exatamente 8 caracteres.</div></div>";
        exit;
    }

    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
    $user_id = $_SESSION['reset_user_id'];

    // Atualiza a senha no banco de dados
    $stmt = $conexao->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
    $stmt->bind_param('si', $nova_senha_hash, $user_id);
    if ($stmt->execute()) {
        echo "<div class='container mt-5'><div class='alert alert-success'>Senha redefinida com sucesso!</div></div>";
        echo "<script>
                    setTimeout(function() {
                        window.location.href = '../login.php';
                    }, 2000);
                </script>";

        // Limpa os dados da sessão
        unset($_SESSION['reset_token']);
        unset($_SESSION['reset_user_id']);
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Erro ao redefinir a senha.</div></div>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        .error {
            color: red;
            display: none;
        }
    </style>
    <script>
        function validarSenha(event) {
            var senha = document.getElementById('nova_senha').value;
            var errorMessage = document.getElementById('error-message');
            if (senha.length !== 8) {
                errorMessage.style.display = 'block';
                event.preventDefault();
            } else {
                errorMessage.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2>Redefinir Senha</h2>
        <form action="" method="post" onsubmit="validarSenha(event);">
            <div class="mb-3">
                <label for="nova_senha" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="nova_senha" name="nova_senha" required>
                <div id="error-message" class="error">A senha deve ter exatamente 8 caracteres.</div>
            </div>
            <button type="submit" class="btn btn-primary">Redefinir</button>
        </form>
    </div>
</body>
</html>

