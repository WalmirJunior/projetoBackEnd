<?php
session_start();
require_once '../config.php'; // Inclua a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();

    if ($user_id) {
        $token = bin2hex(random_bytes(50)); // Gera um token seguro

        // Salva o token e o user_id na sessão
        $_SESSION['reset_token'] = $token;
        $_SESSION['reset_user_id'] = $user_id;

        // Ajuste para localhost
        $reset_link = "http://localhost/projetoBackEnd/Controllers/reset_senha.php?token=$token";

        // Simula o envio de e-mail
        $log_file = 'email_log.txt';
        $subject = "Redefinição de Senha";
        $message = "Clique no link a seguir para redefinir sua senha: $reset_link";
        $log_message = "To: $email\r\nSubject: $subject\r\n\r\n$message\r\n\r\n";
        
        // Escreve o log no arquivo
        file_put_contents($log_file, $log_message, FILE_APPEND);

        echo "Um e-mail com o link para redefinição de senha foi enviado (simulado).";
    } else {
        echo "E-mail não encontrado.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
