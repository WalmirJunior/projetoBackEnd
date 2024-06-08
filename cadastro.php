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
    $cep = trim($_POST['cep']);

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

    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, data_nasc, mother_name, telefone_fixo, celular, endereco, email, cpf, username, senha, gender, cep)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $nome, $bornDate, $motherName, $telFixo, $cel, $endereco, $email, $CPF, $login, $senha, $genderDB, $cep);

    if ($stmt->execute()) {
        echo "Usuário registrado com sucesso!";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'login.html';
                }, 2000);
              </script>";
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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="script/modoNoturno.js" defer></script>
    <script src="script/acessibilidade.js" defer></script>
</head>
<body class="CadLog">
    <form action="cadastro.php" method="POST">
        <div class="container changeable-text-container">
            <div class="card cardCD m-auto">
                <h1>Cadastre-se</h1>
                <div id="msgError"></div>
                <div id="msgSuccess"></div>
                <div class="row grupos">
                    <div class="col-md-6 group1">
                        <div class="form-group mb-3">
                            <label for="nome" id="labelNome">Nome:</label>
                            <input type="text" class="form-control" required id="nome" name="nome" placeholder="Digite seu nome completo">
                        </div>
                        <div class="form-group mb-3">
                            <label for="bornDate" id="labelDate">Data de nascimento:</label>
                            <input class="form-control" type="text" id="bornDate" name="bornDate" required placeholder="YYYY-MM-DD">
                        </div>
        
                        <div class="form-group mb-3">
                            <label for="motherName" id="labelMother">Nome Materno:</label>
                            <input type="text" class="form-control" required id="motherName" name="motherName" placeholder="Digite o nome da sua mãe">
                        </div>
                        <div class="form-group mb-3">
                            <label for="telFixo" id="labelFixo">Telefone Fixo:</label>
                            <input type="text" class="form-control" required id="telFixo" name="telFixo" placeholder="(+55)XXXXXXXXXX">
                        </div>
                        <div class="form-group mb-3">
                            <label for="cel" id="labelCelular">Celular:</label>
                            <input type="text" class="form-control" required id="cel" name="cel" placeholder="(+55)XXXXXXXXXX">
                        </div>
                    </div>
                    <div class="col-md-6 group2">
                        <div class="form-group mb-3">
                            <label for="endereco" id="labelEndereco">Endereço:</label>
                            <input type="text" class="form-control" required id="endereco" name="endereco" placeholder="Digite seu endereço">
                        </div>
                        <div class="form-group mb-3">
                            <label for="cep" id="labelCep">CEP:</label>
                            <input type="text" class="form-control" required id="cep" name="cep" placeholder="Digite seu CEP">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" id="labelEmail">Email:</label>
                            <input type="email" class="form-control" required id="email" name="email" placeholder="Digite seu email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="CadastroPessoaFisica" id="labelCadastroPessoa">CPF:</label>
                            <input type="text" class="form-control" required id="CadastroPessoaFisica" name="CadastroPessoaFisica" placeholder="123.123.123-12">
                        </div>
                        <div class="form-group mb-3">
                            <label for="login" id="labelLogin">Nome de Usuário:</label>
                            <input type="text" class="form-control" required id="login" name="login">
                        </div>
                        <div class="form-group mb-3">
                            <label for="senha" id="labelSenha">Senha:</label>
                            <input type="password" class="form-control" required id="senha" name="senha">
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirmaSenha" id="labelConfirma">Confirmar Senha:</label>
                            <input type="password" class="form-control" required id="confirmaSenha" name="confirmaSenha">
                        </div>
                    </div>
                </div>
                <div class="mb-3 gender-group">
                    <h4>Gênero: </h4>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="masculino" value="1" required checked>
                        <label class="form-check-label" for="masculino"> Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="feminino" value="2">
                        <label class="form-check-label" for="feminino"> Feminino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="outros" value="3">
                        <label class="form-check-label" for="outros"> Outros</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="pnd" value="4">
                        <label class="form-check-label" for="pnd"> Prefiro não dizer</label>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary">
                </div>
                <p class="text-center mt-3">Já possui login? <a href="login.html">Clique aqui.</a></p>
            </div>
        </div>
    </form>
    <input type="checkbox" class="checkbox" id="chk">

    <label for="chk" class="label">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
        <div class="ball"></div>
    </label>
    <div class="accessibility-panel">
        <button id="increase-font">+</button>
        <button id="decrease-font">-</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#cep').mask('00000-000');
            $('#CadastroPessoaFisica').mask('000.000.000-00');
            $('#bornDate').mask('0000-00-00');
        });
    </script>
    <script src="script/script.js" defer></script>
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
</body>
</html>
