<?php
require_once('../fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->image('../imgs/let.jpeg', 92, 7, 30); // X, Y, Tamaño
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(60);
        $this->Cell(70, 30, 'TABELA DE PRODUTOS', 0, 0, 'C');
        $this->Ln(30);
        $this->SetFont('Arial', 'B', 8);
        $this->SetX(8);
        $this->Cell(10, 10, 'ID', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'PRODUTO', 1, 0, 'C', 0,);
        $this->Cell(30, 10, 'EMPRESA', 1, 0, 'C', 0);
        $this->Cell(20, 10, 'QUANTIDADE', 1, 1, 'C', 0);
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
$consulta = "SELECT id_produtos, nome_produto, qtda_produtos, empresa FROM produtos ORDER BY id_produtos asc";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(8);
    $pdf->Cell(10, 10, $row['id_produtos'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['nome_produto'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['empresa'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['qtda_produtos'], 1, 1, 'C', 0);
}

$pdf->Output();
