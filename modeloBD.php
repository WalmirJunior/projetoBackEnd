<?php
    session_start();
    $tipo_perfil = isset($_SESSION['tipo_perfil']) ? $_SESSION['tipo_perfil'] : 'comum';

    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/styleb.css">
    <script src="script/modoNoturno.js" defer></script>
    <script src="script/script.js" defer></script>
    <script src="script/acessibilidade.js" defer></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Modelo do Banco de Dados</title>
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
                                        onclick="window.location.href='servicos/2FA.php'">2FA</button></li>
                                <li><button class="dropdown-item"
                                        onclick="window.location.href='servicos/smsprogramavel.php'">Sms Programável</button></li>
                                <li><button class="dropdown-item"
                                        onclick="window.location.href='servicos/gvc.php'">Google Verified Calls</button></li>
                                <li><button class="dropdown-item"
                                        onclick="window.location.href='servicos/numeromascara.php'">Número Máscara</button></li>
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

    <div class="container d-flex justify-content-center align-items-center"><img src="img/modeloBD.jpeg" alt="" class></div>
    <input type="checkbox" class="checkbox"  id="chk">
    <label for="chk" class="label">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
        <div class="ball"></div>
    </label>
    <div class="accessibility-panel">
        <button id="increase-font">Aumentar Fonte</button>
        <button id="decrease-font">Diminuir Fonte</button>
    </div>
        



    <div class="card-footer fixed-bottom">
        <footer class="d-flex justify-content-center align-items-center p-3 " style="background:linear-gradient(to left, #EB0008, #B81E23); color:white;">
            <h5>CPaaS &#169;</h5>
        </footer>
    </div>
</body>
<script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
</html>