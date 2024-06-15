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
                    window.location.href = 'login.php';
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
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/botoes.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="script/modoNoturno.js" defer></script>
    <script src="script/acessibilidade.js" defer></script>
</head>
<body class="CadLog">
    <form action="cadastro.php" method="POST">
      <section class="h-100 h-custom gradient-custom-2">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body p-0">
                  <div class="row g-0">
                    <div class="col-lg-6">
                      <div class="p-5">
                        <h3 class="fw-normal mb-5" style="color: #4835d4;">Informações Gerais</h3>
                        <div class="row">
                          <div class="col-md-6 mb-4 pb-2">

                            <div data-mdb-input-init class="form-outline">
                              <input type="text" id="nome" name="nome" class="form-control form-control-lg" required />
                              <label class="form-label" id="labelNome" for="nome">Nome Completo</label>
                            </div>

                          </div>
                          <div class="col-md-6 mb-4 pb-2">

                            <div data-mdb-input-init class="form-outline">
                              <input type="text" id="bornDate" name="bornDate" class="form-control form-control-lg" required />
                              <label class="form-label" id="labelDate" for="bornDate">Data de Nascimento</label>
                            </div>

                          </div>
                        </div>

                        <div class="mb-4 pb-2">
                          <div data-mdb-input-init class="form-outline">
                            <input type="text" id="motherName" name="motherName" class="form-control form-control-lg" required />
                            <label class="form-label" id="labelMother" for="motherName">Nome Materno</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">

                            <div data-mdb-input-init class="form-outline mb-4">
                              <input type="text" id="telFixo" name="telFixo" class="form-control form-control-lg" placeholder="(+55)xxxxxxxxxx" required />
                              <label class="form-label" id="labelFixo" for="telFixo">Telefone Fixo</label>
                            </div>

                          </div>
                          <div class="col-md-6">

                          <div data-mdb-input-init class="form-outline mb-4">
                              <input type="text" id="cel" name="cel" class="form-control form-control-lg" placeholder="(+55)xxxxxxxxxx" required />
                              <label class="form-label" id="labelCelular" for="cel">Celular</label>
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

                      </div>
                    </div>
                    <div class="col-lg-6 bg-indigo text-white">
                      <div class="p-5">
                        <h3 class="fw-normal mb-5">Informações Adicionais</h3>

                        <div class="mb-4">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="text" id="email" name="email" class="form-control form-control-lg" required />
                            <label class="form-label" id="labelEmail" for="email">Email</label>
                          </div>
                        </div>

                        <div class="mb-4 pb-2">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="text" id="CadastroPessoaFisica" name="CadastroPessoaFisica" class="form-control form-control-lg" required />
                            <label class="form-label" id="labelCadastroPessoa" for="CadastroPessoaFisica">CPF</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-5 mb-4 pb-2">

                            <div data-mdb-input-init class="form-outline form-white">
                              <input type="text" id="cep" name="cep" class="form-control form-control-lg" required />
                              <label class="form-label" id="labelCep" for="cep">CEP</label>
                            </div>

                            <button type="button" id="verificarCep" class="btn btn-primary">Verificar CEP</button>
                            <div id="resultadoCep"></div>

                          </div>
                          <div class="col-md-7 mb-4 pb-2">

                            <div data-mdb-input-init class="form-outline form-white">
                              <input type="text" id="endereco" name="endereco" class="form-control form-control-lg" required />
                              <label class="form-label" id="labelEndereco" for="endereco">Endereço</label>
                            </div>

                          </div>
                        </div>

                        <div class="mb-4 pb-2">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="text" id="login" name="login" class="form-control form-control-lg" required />
                            <label class="form-label" id="labelLogin" for="login">Nome de usuário</label>
                          </div>
                        </div>

                        
                        <div class="row">
                          <div class="col-md-6 mb-4 pb-2">
                            <div data-mdb-input-init class="form-outline form-white password-toggle">
                              <input type="password" id="senha" name="senha" class="form-control form-control-lg" required />
                              <label class="form-label" id="labelSenha" for="senha">Senha</label>
                              <i class="toggle-icon fas fa-eye text-dark" id="toggleSenha"></i>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4 pb-2">
                            <div data-mdb-input-init class="form-outline form-white password-toggle">
                              <input type="password" id="confirmaSenha" name="confirmaSenha" class="form-control form-control-lg" required></input>
                              <i class="toggle-icon fas fa-eye text-dark" id="toggleConfirmaSenha"></i>
                              <label class="form-label" id="labelConfirma" for="confirmaSenha">Confirmar Senha</label>
                            </div>
                          </div>
                        </div>

                        <div class="text-center">
                          <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Cadastre-se">
                      </div>
                      <p class="text-center mt-3">Já possui login? <a href="login.php">Clique aqui.</a></p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#cep').mask('00000-000');
            $('#CadastroPessoaFisica').mask('000.000.000-00');
            $('#bornDate').mask('0000-00-00');
        });
        function togglePasswordVisibility(inputId, toggleId) {
          const passwordInput = document.getElementById(inputId);
          const toggleIcon = document.getElementById(toggleId);

          toggleIcon.addEventListener('click', function () {
              const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
              passwordInput.setAttribute('type', type);
              toggleIcon.classList.toggle('fa-eye');
              toggleIcon.classList.toggle('fa-eye-slash');
          });
        }

  togglePasswordVisibility('senha', 'toggleSenha');
  togglePasswordVisibility('confirmaSenha', 'toggleConfirmaSenha');

   $('#verificarCep').click(function() {
            var cep = $('#cep').val().replace("-", "");
            console.log("CEP digitado: " + cep);
            
            if (cep.length === 8) {
                $.ajax({
                    url: 'Controllers/consulta_cep.php', 
                    type: 'POST',
                    data: { cep: cep },
                    success: function(response) {
                        console.log("Resposta da API: " + response);
                        
                        try {
                            var data = JSON.parse(response);
                            
                            if (data.erro) {
                                $('#resultadoCep').html('<div class="alert alert-danger">' + data.erro + '</div>');
                            } else {
                                var endereco = data.bairro + ', ' + data.localidade + ', ' + data.uf;
                                $('#endereco').val(endereco);
                                $('#resultadoCep').html('<div class="alert alert-success">Endereço encontrado e preenchido!</div>');
                            }
                        } catch (e) {
                            $('#resultadoCep').html('<div class="alert alert-danger">Erro ao processar a resposta: ' + e.message + '</div>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Erro AJAX: " + error);
                        $('#resultadoCep').html('<div class="alert alert-danger">Erro ao consultar o CEP: ' + error + '</div>');
                    }
                });
            } else {
                $('#resultadoCep').html('<div class="alert alert-warning">Por favor, insira um CEP válido</div>');
            }
      });

    </script>
    <script src="script/script.js" ></script>
    
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous" defer></script>
</body>
</html>
