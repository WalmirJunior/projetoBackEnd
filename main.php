<?php
session_start();
$tipo_perfil = isset($_SESSION['tipo_perfil']) ? $_SESSION['tipo_perfil'] : 'comum';

if (!isset($_SESSION['usuario'])) {
    header("Location: error/401.php");
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
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="script/modoNoturno.js" defer></script>
    <script src="script/script.js" defer></script>
    <script src="script/acessibilidade.js" defer></script>
    <title>CPaaS</title>
</head>
<body class="mainBody">
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
    <main>
        <div class="m-3 mb-5 d-flex justify-content-center ">
            <div id="demo" class="carousel slide w-100 " data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                </div>
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                        <img src="img/2FA.jpg" alt="Los Angeles" class="d-block w-100 ">
                    </div>
                    <div class="carousel-item">
                        <img src="img/GoogleVerified.jpg" alt="Chicago" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="img/SMSProgramavel.png" alt="New York" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="img/NumeroMascara.png" alt="New York" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
        <article>
            <div class="container">
                <section class="py-5">
                    <div class="row row-cols-2">
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <img src="img/icone2FA.png" class="card-img-top" alt="icone 2FA">
                                </div>
                                <div class="card-body" style="min-height: 270px">
                                    <h3 class="card-title py-2 changeable-text-container">2FA</h3>
                                    <p style="min-height: 100px!important" class="card-text changeable-text-container">Adicionar um número de
                                        telefone de recuperação a uma conta individual.</p>
                                    <a href="servicos/2FA.php" class="btn btn-danger changeable-text-container">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <img src="img/SMSProgramavel_Icon.png" class="card-img-top" alt="SmS programavel">
                                </div>
                                <div class="card-body" style="min-height: 270px">
                                    <h3 class="card-title py-2 changeable-text-container">SMS Programável</h3>
                                    <p style="min-height: 100px!important" class="card-text changeable-text-container">Com essa ferramenta você
                                        envia mensagens de SMS com as informações que o seu cliente precisa e com a
                                        segurança, a velocidade e a confiabilidade que você espera.</p>
                                    <a href="servicos/smsprogramavel.php" class="btn btn-danger changeable-text-container">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <img src="img/GoogleVerifiedCallsIcon.png" class="card-img-top"
                                        alt="Google Verified Calls">
                                </div>
                                <div class="card-body" style="min-height: 270px">
                                    <h3 class="card-title py-2 changeable-text-container">Google Verified Calls</h3>
                                    <p style="min-height: 100px!important" class="card-text changeable-text-container">Permite que empresas exibam
                                        para o cliente na hora da chamada sua marca,
                                        logotipo e até mesmo o motivo da chamada.</p>
                                    <a href="servicos/gvc.php" class="btn btn-danger changeable-text-container">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <img src="img/NumeroMascaraIcon.png" class="card-img-top"
                                        alt="Numero Mascara">
                                </div>
                                <div class="card-body" style="min-height: 270px">
                                    <h3 class="card-title py-2 changeable-text-container">Número Máscara</h3>
                                    <p style="min-height: 100px!important" class="card-text changeable-text-container">Garante aos seus clientes a capacidade de fazer chamadas e enviar 
                                        mensagens sem expor seus números de telefone pessoais. </p>
                                    <a href="servicos/numeromascara.php" class="btn btn-danger changeable-text-container">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </article>
        <div class="d-flex justify-content-center my-2 ">
            <div class="">
                <h1 class="d-flex justify-content-center changeable-text-container">Quem usa o CPaas?</h1>
                <img src="img/QuemUsaOCpaas.png" alt="Empresas que usam o CPaaS" class="img-fluid">
            </div>  
        </div>
        <div>
            <input type="checkbox" class="checkbox"  id="chk">
            <label for="chk" class="label">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
                <div class="ball"></div>
            </label>
        </div>
        <div class="accessibility-panel">
            <button id="increase-font">Aumentar Fonte</button>
            <button id="decrease-font">Diminuir Fonte</button>
        </div>
    <footer class="d-flex justify-content-center align-items-center p-3"
        style="background:linear-gradient(to left, #EB0008, #B81E23); color:white;">
        <h5>CPaaS &#169;</h5>
    </footer>
</body>
<script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
</html>
