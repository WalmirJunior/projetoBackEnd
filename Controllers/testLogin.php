<?php
if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
    include_once('../config.php');

    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);

    $sql = $conexao->prepare("SELECT * FROM usuarios WHERE username = ? LIMIT 1");
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($senha, $user['senha'])) {
            
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['tipo_perfil'] = $user['tipo_perfil']; 
            echo "Login bem-sucedido!";

            if ($user['tipo_perfil'] === 'master') {
                header("Location: pergunta_2fa.php");
            } else {
                header("Location: ../main.php");
            }
            exit;
        } else {
            echo "Senha incorreta!";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = '../login.html';
                    }, 2000);
                  </script>";
        }
    } else {
        echo "Usuário não encontrado!";
        echo "<script>
                setTimeout(function() {
                    window.location.href = '../login.html';
                }, 2000);
              </script>";
    }
    $sql->close();
} else {
    echo "Preencha todos os campos!";
    echo "<script>
            setTimeout(function() {
                window.location.href = '../login.html';
            }, 2000);
          </script>";
}

$conexao->close();
?>
