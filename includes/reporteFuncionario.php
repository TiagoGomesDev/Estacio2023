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
        $this->Cell(0, 10, 'TABELA DE USUÁRIOS', 0, 1, 'C');
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 8);
        $this->SetX(8);
        $this->Cell(20, 10, 'ID', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'NOME', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'E-MAIL', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'ROL', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'CARGO', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'USUÁRIO', 1, 1, 'C', 0);
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

$consulta = "SELECT id, nombre, correo, rol, cargo, usuario FROM user ORDER BY id ASC";

$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(8);
    $pdf->Cell(20, 10, $row['id'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['nombre'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['correo'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['rol'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['cargo'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['usuario'], 1, 1, 'C', 0);
}

$pdf->Output();
