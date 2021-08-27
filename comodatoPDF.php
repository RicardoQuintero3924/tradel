<?php
require 'fpdf/fpdf.php';
$nroComodato = $_GET['nroComodato'];
require_once 'control/controlAsignacion.php';
//LLAMANDO LA CONSULTA DE COMODATO
$data = new controlAsignacion();
$comodato = $data->consultaComodato($nroComodato);
foreach($comodato as $dato):
    $responsable = $dato->nombreR;
    $cedula = $dato->cedula;
endforeach;

$pdf = new FPDF('P','mm','A4');
$pdf->SetMargins(20,15,20);
$pdf->AddPage();
$pdf->SetY(30);
$pdf->SetFont('Arial','B',12);
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
$pdf->MultiCell(160,10,"Entregar en prestamo de uso bienes muebles de propiedad de la sociedad comercial TRADEL S.A.S para apoyar las actividades, comerciales, logisticas, operativas y/o administrativas.",0);
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
$pdf->Cell(40,5,'Fecha',1,0);

$pdf->Output();

?>