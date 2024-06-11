<?php
include 'config.php';


// Verifica se o usuário está logado e se é um usuário master
session_start();
$tipo_perfil = isset($_SESSION['tipo_perfil']) ? $_SESSION['tipo_perfil'] : 'comum';
if (!isset($_SESSION['tipo_perfil']) || $_SESSION['tipo_perfil'] !== 'master') {
    header('HTTP/1.1 403 Forbidden');
    include('error/403.php');
    // header("Location: login.php"); // Redireciona para a página de login se não for master
    exit();
}

// Processa a exclusão se o parâmetro 'excluir' estiver presente no GET
if (isset($_GET['excluir'])) {
    $idExcluir = $_GET['excluir'];
    $stmtExcluir = $conexao->prepare("DELETE FROM usuarios WHERE id = ? AND tipo_perfil = 'comum'");
    $stmtExcluir->bind_param("i", $idExcluir);
    $stmtExcluir->execute();
    $stmtExcluir->close();
}

// Processa a pesquisa
$pesquisa = "";
if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
}

$sql = "SELECT * FROM usuarios WHERE tipo_perfil = 'comum' AND nome LIKE ?";
$stmt = $conexao->prepare($sql);
$pesquisa = "%" . $pesquisa . "%";
$stmt->bind_param("s", $pesquisa);
$stmt->execute();
$result = $stmt->get_result();
$usuarios = $result->fetch_all(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <title>Consulta de Usuários</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        form { display: inline; }
        
        /* Estilos para a janela modal */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px; 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light changeable-text-container"
            style="box-shadow: 1px 1px 6px #959595; background-color: #B81E23; padding: 0px!important">
            <div class="container-fluid" style="padding-left: 0px!important;">
                <div><img src="img/cropped-navbartelecall-e1664888635140.png" style="height: 3rem;" alt=""></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="font-weight: 600;">
                            <button class="nav-link active" aria-current="page"
                                onclick="window.location.href='main.php'" style="color: white;">Home</button>
                        </li>
                        <li class="nav-item dropdown" style="font-weight: 600;">
                            <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style="color: white;">
                                Serviços
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item"
                                        onclick="window.location.href='servicos/2FA.html'">2FA</button></li>
                                <li><button class="dropdown-item"
                                        onclick="window.location.href='servicos/smsprogramavel.html'">Sms Programável</button></li>
                                <li><button class="dropdown-item"
                                        onclick="window.location.href='servicos/gvc.html'">Google Verified Calls</button></li>
                                <li><button class="dropdown-item"
                                        onclick="window.location.href='servicos/numeromascara.html'">Número Máscara</button></li>
                            </ul>
                        </li>
                        <li class="nav-item" style="font-weight: 600;">
                            <button class="nav-link" onclick="window.location.href='sobre.php'"
                                style="color: white;">Sobre Nós</button>
                        </li>
                        <?php if ($tipo_perfil == 'master'): ?>
                        <li class="nav-item" style="font-weight: 600;">
                            <button class="nav-link" onclick="window.location.href='consulta.php'"
                                style="color: white;">Consulta usuários</button>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item" style="font-weight: 600;">
                            <button class="nav-link" onclick="window.location.href='modeloBD.php'"
                                style="color: white;">Modelo BD</button>
                        </li>
                        <li class="nav-item" style="font-weight: 600;">
                            <button class="nav-link" onclick="window.location.href='Controllers/logout.php'"
                                style="color: white;">Sair</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h1>Consulta de Usuários</h1>
    <form method="GET" action="consulta.php">
        <label for="pesquisa">Pesquisar usuário:</label>
        <input type="text" id="pesquisa" name="pesquisa" value="<?php echo htmlspecialchars(isset($_GET['pesquisa']) ? $_GET['pesquisa'] : ''); ?>">
        <button type="submit">Pesquisar</button>
        <a href="Controllers/gerar_pdf.php" target="_blank"><button type="button">Baixar PDF</button></a>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
            <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
            <td>
                <button onclick="showModal(<?php echo htmlspecialchars($usuario['id']); ?>)">Excluir</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Janela Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>Tem certeza que deseja excluir este usuário?</p>
            <form method="GET" action="consulta.php">
                <input type="hidden" id="idExcluir" name="excluir" value="">
                <button type="submit">Excluir</button>
                <button type="button" onclick="closeModal()">Cancelar</button>
            </form>
        </div>
    </div>

    <script>
        // Função para mostrar a janela modal
        function showModal(id) {
            document.getElementById('idExcluir').value = id;
            document.getElementById('modal').style.display = 'block';
        }

        // Função para fechar a janela modal
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        // Fecha a janela modal se o usuário clicar fora dela
        window.onclick = function(event) {
            if (event.target == document.getElementById('modal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>

<?php
$stmt->close();
$conexao->close();
?>
