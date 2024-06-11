<?php
include '../config.php';
define('FPDF_FONTPATH', '../fpdf/font/');
require('fpdf.php'); // Certifique-se de que o caminho está correto

// Consulta os usuários comuns
$sql = "SELECT * FROM usuarios WHERE tipo_perfil = 'comum'";
$result = $conexao->query($sql);
$usuarios = $result->fetch_all(MYSQLI_ASSOC);

class PDF extends FPDF
{
    // Cabeçalho do PDF
    function Header()
    {
        $this->SetFont('Arial', 'B', 12); // Alterado para Arial
        $this->Cell(0, 10, 'Lista de Usuarios', 0, 1, 'C');
        $this->Ln(10);
    }

    // Rodapé do PDF
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Tabela de usuários
    function UserTable($header, $data)
    {
        $this->SetFont('Arial', 'B', 12);
        foreach ($header as $col)
            $this->Cell(60, 7, $col, 1);
        $this->Ln();
        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(60, 6, $col, 1);
            $this->Ln();
        }
    }
}

// Instancia PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$header = array('ID', 'Nome', 'Email');
$data = [];
foreach ($usuarios as $usuario) {
    $data[] = [$usuario['id'], $usuario['nome'], $usuario['email']];
}
$pdf->UserTable($header, $data);
$pdf->Output();
?>
