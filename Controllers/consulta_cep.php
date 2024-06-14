<?php
if (isset($_POST['cep'])) {
    $cep = trim($_POST['cep']);
    echo json_encode(consultarCep($cep));
    exit;
}

function consultarCep($cep) {
    $cep = preg_replace("/[^0-9]/", "", $cep);
    if(strlen($cep) != 8) {
        return ["erro" => "CEP inválido"];
    }

    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    
    // Verifica se houve erro na execução da consulta
    if (curl_errno($ch)) {
        return ["erro" => "Erro na requisição cURL: " . curl_error($ch)];
    }
    
    curl_close($ch);

    $data = json_decode($response, true);
    if(isset($data['erro'])) {
        return ["erro" => "CEP não encontrado"];
    }

    return $data;
}
?>
