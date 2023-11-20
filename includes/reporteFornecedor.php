<?php

require_once('../fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->image('../imgs/let.jpeg', 92, 7, 30); // X, Y, Tamaño
        $this->Ln(40);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(0, 10, 'TABELA DE FORNECEDORES', 0, 1, 'C');
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 8);
        $this->SetX(8);
        $this->Cell(20, 10, 'ID', 1, 0, 'C', 0);
        $this->Cell(60, 10, 'NOME', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'CNPJ', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");

$consulta = "SELECT id_fornecedor, nome_forn, cnpj FROM fornecedor ORDER BY id_fornecedor ASC";

$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(8);
    $pdf->Cell(20, 10, $row['id_fornecedor'], 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['nome_forn'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['cnpj'], 1, 1, 'C', 0);
}

$pdf->Output();
