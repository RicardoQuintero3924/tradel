<?php 
require 'fpdf/fpdf.php';
$nroComodato = $_GET['nroComodato'];
require_once 'control/controlAsignacion.php';
require_once 'control/controlEquipo.php';
require_once 'modelo/actualizaDE.php';
require_once 'control/controlImpresora.php';
require_once 'modelo/actualizaDI.php'; 
$data = new controlAsignacion();
$comodato = $data->consultaComodato($nroComodato);
$data->actualizaComodato($nroComodato);
$disponible = 1;
$equipoControl = new controlEquipo();
foreach($comodato as $dato):
    $responsable = $dato->nombreR;
    $cedula = $dato->cedula;
    $equipo = $dato->imei;
    $impresora = $dato->serial;
    $ruta = $dato->ruta;
    $fecha = $dato->fecha;
endforeach;
$estado = new actualizaEDisponible($disponible, $equipo);
$equipoControl->actualizarDisponible($estado);
$estadoI = new actualizaIDisponible($disponible, $impresora);
$impresoraControl = new controlImpresora();
$impresoraControl->actualizarDisponible($estadoI);

$pdf = new FPDF('P','mm','A4');
$pdf->SetMargins(20,15,20);
$pdf->AddPage();
$pdf->SetY(30);
$pdf->Image('images/tradel.jpg',170,15,30,30,'jpeg');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,30, "PAZ Y SALVO EQUIPOS",0,1,'c');
$pdf->Cell(40,10, 'Comodato: ',0,0,'c');
$pdf->Cell(40,10,"$nroComodato",0,1);
$pdf->Cell(40,10,'Comodatario: ',0,0,'r');
$pdf->Cell(40,10,"$responsable",0,1);
$pdf->Cell(40,10,'Cedula:',0,0);
$pdf->Cell(40,10,"$cedula",0,1);
$z = $pdf->GetY();
$pdf->SetY($z+10);
$pdf->Cell(20,10,'OBJETO:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(160,10,"En este documento se afirma que los equipos se entregaron en perfectas condiciones al area encargada de la administracion.",0);
$y = $pdf->GetY();
$pdf->SetY($y+20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,5,'EQUIPOS: ',0,1);

//inicio de tabla con los equipos.
$w = $pdf->GetY();
$pdf->SetY($w+10);
$pdf->Cell(40,5,'Equipo',1,0);
$pdf->Cell(45,5,'Impresora',1,0);
$pdf->Cell(45,5,'Ruta',1,0);
$pdf->Cell(45,5,'Fecha',1,1);
$pdf->Cell(40,5,$equipo,1,0);
$pdf->Cell(45,5,$impresora,1,0);
$pdf->Cell(45,5,$ruta,1,0);
$pdf->Cell(45,5,$fecha,1,0);
//--------------------------------------
$a = $pdf->GetY();
$pdf->SetY($a+80);
$pdf->Line(100,250,20,250);
$pdf->cell(60,10,"Nombre:",0,1);
$pdf->Cell(65,10,"Firma Responsable");
$pdf->Output();

?>