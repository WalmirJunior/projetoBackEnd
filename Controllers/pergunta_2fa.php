<?php
session_start();
require_once '../config.php'; // Inclua a conexão com o banco de dados

// Array com as perguntas
$perguntas = [
    'mother_name' => 'Qual o nome da sua mãe?',
    'data_nasc' => 'Qual a data do seu nascimento?',
    'cep' => 'Qual o CEP do seu endereço?'
];

// Seleciona uma pergunta aleatória
$chave_pergunta = array_rand($perguntas);
$pergunta = $perguntas[$chave_pergunta];

// Salva a chave da pergunta na sessão para verificação posterior
$_SESSION['pergunta'] = $chave_pergunta;
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <title>Autenticação 2FA</title>
</head>
<body>
    <form action="verificar_2fa.php" method="post">
        <label for="resposta"><?php echo $pergunta; ?></label>
        <input type="text" name="resposta" id="resposta" required>
        <input type="submit" value="Enviar">
    </form>
    <script defer>
        $(document).ready(function() {
            var pergunta = "<?php echo $chave_pergunta; ?>";
            if (pergunta == 'data_nasc') {
                $('#resposta').mask('0000/00/00');
            } else if (pergunta == 'cep') {
                $('#resposta').mask('00000-000');
            }
        });
    </script>
</body>
</html>