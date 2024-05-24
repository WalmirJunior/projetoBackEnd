<?php
if (isset($_POST['submit'])) {
    include_once('config.php');

    $nome = trim($_POST['nome']);
    $bornDate = trim($_POST['bornDate']);
    $motherName = trim($_POST['motherName']);
    $telFixo = trim($_POST['telFixo']);
    $cel = trim($_POST['cel']);
    $endereco = trim($_POST['endereco']);
    $email = trim($_POST['email']);
    $CPF = trim($_POST['CadastroPessoaFisica']);
    $login = trim($_POST['login']);
    $senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT);
    $gender = trim($_POST['gender']);

    switch ($gender) {
        case '1':
            $genderDB = 'M';
            break;
        case '2':
            $genderDB = 'F';
            break;
        case '3':
            $genderDB = 'O';
            break;
        case '4':
            $genderDB = 'P';
            break;
        default:
            $genderDB = ''; 
            break;
    }

    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, data_nasc, mother_name, telefone_fixo, celular, endereco, email, cpf, username, senha, gender)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $nome, $bornDate, $motherName, $telFixo, $cel, $endereco, $email, $CPF, $login, $senha, $genderDB);

    if ($stmt->execute()) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro ao registrar usuário: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="script/modoNoturno.js" defer></script>
    <script src="script/script.js" defer></script>
    <script src="script/acessibilidade.js" defer></script>
</head>
<body class="CadLog">
    <form action="cadastro.php" method="POST">
        <div class="container changeable-text-container">
            <div class="cardCD card m-auto">
                <h1>Cadastre-se</h1>
                <div id="msgError"></div>
                <div id="msgSuccess"></div>
                <div class="grupos row">
                    <div class="group1 col-md-6">
                        <div class="form-group">
                            <label for="nome" id="labelNome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo">
                        </div>
                        <div class="form-group">
                            <label for="bornDate" id="labelDate" >Data de nascimento:</label>
                            <input class="form-control datanasc" type="date" id="bornDate" name="bornDate" required>
                        </div>
        
                        <div class="form-group">
                            <label for="motherName" id="labelMother" >Nome Materno:</label>
                            <input type="text" class="form-control" id="motherName" name="motherName" placeholder="Digite o nome da sua mãe">
                        </div>
                        <div class="form-group">
                            <label for="telFixo" id="labelFixo" >Telefone Fixo:</label>
                            <input type="text" class="form-control" id="telFixo" name="telFixo" placeholder="(+55)XXXXXXXXXX">
                        </div>
                        <div class="form-group">
                            <label for="cel" id="labelCelular" >Celular:</label>
                            <input type="text" class="form-control" id="cel" name="cel" placeholder="(+55)XXXXXXXXXX.">
                        </div>
                    </div>
                    <div class="group2 col-md-6">
                        <div class="form-group">
                            <label for="endereco" id="labelEndereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite seu endereço">
                        </div>
                        <div class="form-group">
                            <label for="email" id="labelEmail">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email">
                        </div>
                        <div class="form-group">
                            <label for="CadastroPessoaFisica" id="labelCadastroPessoa">CPF:</label>
                            <input type="text" class="form-control" id="CadastroPessoaFisica" name="CadastroPessoaFisica" placeholder="123.123.123-12">
                        </div>
                        <div class="form-group">
                            <label for="login" id="labelLogin">Nome de Usuário:</label>
                            <input type="text" class="form-control" id="login" name="login">
                        </div>
                        <div class="form-group">
                            <label for="senha" id="labelSenha">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha">
                        </div>
                        <div class="form-group">
                            <label for="confirmaSenha" id="labelConfirma">Confirmar Senha:</label>
                            <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha">
                        </div>
                    </div>
                </div>
                <div class="gender-group">
                    <h4>Gênero: </h4>
                    <div class="genders" style="padding-left: 18px;">
                        <input type="radio" class="form-check-input" name="gender" id="masculino" value="1" required checked>
                        <label class="form-check-label" for="masculino"> Masculino</label>
                    </div>
                    <div class="genders" style="padding-left: 18px;">
                        <input type="radio" class="form-check-input" name="gender" id="feminino" value="2">
                        <label class="form-check-label" for="feminino"> Feminino</label>
                    </div>
                    <div class="genders" style="padding-left: 18px;">
                        <input type="radio" class="form-check-input" name="gender" id="outros" value="3">
                        <label class="form-check-label" for="outros"> Outros</label>
                    </div>
                    <div class="genders" style="padding-left: 18px;">
                        <input type="radio" class="form-check-input" name="gender" id="pnd" value="4">
                        <label class="form-check-label" for="pnd"> Prefiro não dizer</label>
                    </div>
                </div>
                <div class="justify-center">
                    
                    <input type="submit" name="submit" id="submit">
                </div>
            <p class="text-center">Já possui login? <a href="login.html">Clique aqui.</a></p>
        </div>
    </div>
</form>
    <input type="checkbox" class="checkbox"  id="chk">

    <label for="chk" class="label">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
        <div class="ball"></div>
    </label>
    <div class="accessibility-panel">
        <button id="increase-font">+</button>
        <button id="decrease-font">-</button>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
<script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
</html>
