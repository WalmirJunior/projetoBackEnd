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
            $_SESSION['tipo_perfil'] = $user['tipo_perfil']; 
            echo "Login bem-sucedido!";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = '../main.php';
                    }, 2000); // Redireciona após 2 segundos (2000 milissegundos)
                  </script>";
        } else {
            echo "Senha incorreta!";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = '../login.html';
                    }, 2000); // Redireciona após 2 segundos (2000 milissegundos)
                  </script>";
        }
    } else {
        echo "Usuário não encontrado!";
        echo "<script>
                setTimeout(function() {
                    window.location.href = '../login.html';
                }, 2000); // Redireciona após 2 segundos (2000 milissegundos)
              </script>";
    }
    $sql->close();
} else {
    echo "Preencha todos os campos!";
    echo "<script>
            setTimeout(function() {
                window.location.href = '../login.html';
            }, 2000); // Redireciona após 2 segundos (2000 milissegundos)
          </script>";
}

$conexao->close();
?>
