<?php
session_start();
require_once '../config.php'; // Inclua a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['pergunta'])) {
        echo "Erro na autenticação. Tente novamente.";
        exit;
    }

    $pergunta_chave = $_SESSION['pergunta'];
    $resposta = trim($_POST['resposta']);

    $userId = $_SESSION['user_id'];

    // Consulta ao banco de dados para obter a resposta correta
    $stmt = $conexao->prepare("SELECT $pergunta_chave FROM usuarios WHERE id = ?");
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $stmt->bind_result($resposta_correta);
    $stmt->fetch();
    $stmt->close();

    // Adicione depuração aqui
    // echo ("Resposta correta: " . $resposta_correta);

    if ($pergunta_chave == 'data_nasc') {
        $resposta_correta = date('Y/m/d', strtotime($resposta_correta));
        
    }

    if ($pergunta_chave == 'endereco') {
        // Formata a resposta correta do CEP 
        $resposta_correta = preg_replace('/[^0-9]/', '', $resposta_correta); // Remove qualquer caractere não numérico
        $resposta_correta = substr($resposta_correta, 0, 5) . '-' . substr($resposta_correta, 5); // Formate para 00000-000
        
    }



    if (strcasecmp($resposta, $resposta_correta) === 0) {
        echo "Autenticação bem-sucedida!";
        echo "<script>
                    setTimeout(function() {
                        window.location.href = '../main.php';
                    }, 2000);
                  </script>";
    } else {
        echo "Resposta incorreta. Tente novamente.";
    }

    // Limpa a pergunta da sessão após a verificação
    unset($_SESSION['pergunta']);
} else {
    echo "Método de requisição inválido.";
}
?>
