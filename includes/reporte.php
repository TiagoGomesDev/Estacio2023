<?php

require_once('../fpdf/fpdf.php');
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {

        $this->image('../imgs/let.jpeg', 92, 7, 30); // X, Y, Tamaño
        $this->Ln(20);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 20);

        // Movernos a la derecha
        $this->Cell(60);

        // Título
        $this->Cell(70, 30, 'TABELA DE PEDIDOS', 0, 0, 'C');
        // Salto de línea

        $this->Ln(30);
        $this->SetFont('Arial', 'B', 8);
        $this->SetX(8);
        $this->Cell(10, 10, 'ID', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'PRODUTO', 1, 0, 'C', 0,);
        $this->Cell(30, 10, 'EMPRESA', 1, 0, 'C', 0);
        $this->Cell(20, 10, 'QUANT.', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'FORNECEDOR', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'FUNCIONARIO', 1, 0, 'C', 0);
        $this->Cell(28, 10, 'STATUS', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);

        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página

        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        //$this->SetFillColor(223, 229,235);
        //$this->SetDrawColor(181, 14,246);
        //$this->Ln(0.5);
    }
}

$conexion = mysqli_connect("localhost", "root", "", "Gerenciamentol");
$consulta = "SELECT
id_pedidos, qtda_produto_solicitado, fk_produto, fk_fornecedor, fk_funcionario, status, 
id_produtos, nome_produto, qtda_produtos, empresa, 
id_fornecedor, nome_forn, cnpj,
id_status, nome_status,
id, nombre, correo, fecha, cargo, usuario
from pedidos as pedid
inner join produtos as prod on prod.id_produtos = pedid.fk_produto
inner join status as st on st.id_status = pedid.status
inner join fornecedor as forn on forn.id_fornecedor = pedid.fk_fornecedor
inner join user as u ON u.id = pedid.fk_funcionario
ORDER BY id_pedidos ASC;";

$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row = $resultado->fetch_assoc()) {

    $pdf->SetX(8);

    $pdf->Cell(10, 10, $row['id_pedidos'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['nome_produto'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['empresa'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['qtda_produto_solicitado'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['nome_forn'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['nombre'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['nome_status'], 1, 1, 'C', 0);
}


$pdf->Output();
