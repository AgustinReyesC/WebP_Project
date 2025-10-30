<?php
require('../LIB/fpdf186/fpdf.php');

// Datos de ejemplo (usualmente los obtienes de tu base de datos o del carrito)
$cliente = "Juan Pérez";
$fecha = date("d/m/Y");
$productos = [
    ['nombre' => 'Camisa', 'cantidad' => 2, 'precio' => 250],
    ['nombre' => 'Pantalón', 'cantidad' => 1, 'precio' => 500],
];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

// Título
$pdf->Cell(0,10,'Recibo de Compra',0,1,'C');
$pdf->Ln(5);

// Datos del cliente
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,"Cliente: $cliente",0,1);
$pdf->Cell(0,10,"Fecha: $fecha",0,1);
$pdf->Ln(5);

// Tabla de productos
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,10,'Producto',1);
$pdf->Cell(30,10,'Cantidad',1);
$pdf->Cell(30,10,'Precio',1);
$pdf->Cell(30,10,'Subtotal',1);
$pdf->Ln();


$pdf->SetFont('Arial','',12);
$total = 0;
foreach($productos as $item){
    $subtotal = $item['cantidad'] * $item['precio'];
    $total += $subtotal;
    $pdf->Cell(80,10,$item['nombre'],1);
    $pdf->Cell(30,10,$item['cantidad'],1,0,'C');
    $pdf->Cell(30,10,'$'.$item['precio'],1,0,'R');
    $pdf->Cell(30,10,'$'.$subtotal,1,0,'R');
    $pdf->Ln();
}

// Total
$pdf->Cell(140,10,'Total',1);
$pdf->Cell(30,10,'$'.$total,1,0,'R');

$pdf->Output('I','recibo.pdf'); // 'I' = inline en el navegador
?>
