<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleb.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="script/modoNoturno.js" defer></script>
    <!-- <script src="script/script.js" defer></script> -->
    <script src="script/acessibilidade.js" defer></script>
</head>
<body class="login-panel">
    <div class="container mt-5 my-5 changeable-text-container">
        <div class="card">
            <img src="img/telecall-logo.svg" alt="" srcset="" class="w-50  mb-3 ">
            <div id="msgError" class="my-3"></div>
            <form action="Controllers/testLogin.php" method="POST">
                <div class="mb-3">
                    <label id="userLabel" class="form-label" for="usuario">Usuário</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>

                <div class="mb-2">
                    <label id="senhaLabel" class="form-label" for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>                    
                </div>
                <span><a href="Controllers/esqueceu_senha.php">Esqueceu sua senha?</a></span>
                <div class="d-grid gap-2 my-3">
                    <!-- <button class="btn btn-danger changeable-text-container" type="button" onclick="entrar()">Entrar</button> -->
                    <input type="submit" value="Entrar" id="submit">
                </div>
            </form>
            <p class="mt-3 changeable-text-container">Não tem uma conta? <button onclick="window.location.href='cadastro.php'" class="btn btn-link" style="color: blue; text-decoration: none;">Cadastre-se</button>
            </p>
        </div>
    </div>
    
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
</html>
