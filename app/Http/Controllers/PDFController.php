<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Codedge\Fpdf\Fpdf\Fpdf;

class PDFController extends Controller
{
    protected $fpdf;

    public function __construct() {
        $this->fpdf = new Fpdf;
    }

    public function generatePDF()
    {
        $users = User::get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = PDF::loadView('myPDF', $data);

        $height = 43 * 2.835;

        $width = 70 * 2.835;

        $pdf->setPaper([0,0,$width,$height]);
     
        return $pdf->stream('itsolutionstuff.pdf');
    }

    public function he() {
        $pdf = $this->fpdf;
        $pdf->SetAutoPageBreak(true, 1);
        $pdf->AddPage();     

        // Layout
            $pdf->SetXY(10, 25);$pdf->Cell(190, 5, '', 'LTR');

            for($i = 0; $i < 11; $i++){
                $pdf->SetXY(10, 25+($i*5)); $pdf->Cell(190, 5, '', $i == 0 ? 'LTR' : 'LRB');
            }

            $pdf->SetXY(10, 80); $pdf->Cell(70, 45, '', 'LB');
            $pdf->SetXY(80, 80); $pdf->Cell(40, 45, '', 'LB');
            $pdf->SetXY(120, 80); $pdf->Cell(80, 45, '', 'LRB');
            $pdf->SetXY(10, 125); $pdf->Cell(190, 20, '', 'LRB');
            $pdf->SetXY(10, 145); $pdf->Cell(190, 10, '', 'LRB');

            for($i = 0; $i < 16; $i++){
                $i == 1 ? $i++ : "";
                $pdf->SetXY(10, 155+($i*5)); $pdf->Cell(120, 5, '', 'LB');
                $pdf->SetXY(130, 155+($i*5)); $pdf->Cell(70, 5, '', 'LRB');
            }

            for($i = 0; $i < 5; $i++){
                $pdf->SetXY(10, 235+($i*5)); $pdf->Cell(190, 5, '', 'LRB');
            }

        // Title
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetXY(10, 12); $pdf->MultiCell(190, 4,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'GOVERNO DO ESTADO DO AMAPÁ'), '', 'C');
            $pdf->SetXY(10, 16); $pdf->MultiCell(190, 4,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'SECRETARIA DE ESTADO DA SAÚDE'), '', 'C');
            $pdf->SetXY(10, 20); $pdf->MultiCell(190, 4,iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'HOSPITAL DE EMERGÊNCIA'), '', 'C');

            $pdf->SetXY(150, 12); $pdf->MultiCell(50, 4,iconv("UTF-8", "ISO-8859-1//TRANSLIT", '(     ) AMB I - CLÍNICO'));
            $pdf->SetXY(150, 16); $pdf->MultiCell(50, 4,iconv("UTF-8", "ISO-8859-1//TRANSLIT", '(     ) AMB II - TRAUMA'));
            $pdf->SetXY(150, 20); $pdf->MultiCell(50, 4,iconv("UTF-8", "ISO-8859-1//TRANSLIT", '(     ) INTERNAÇÃO'));

        // Subtitle
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetFillColor(245, 195, 195);
            $pdf->SetXY(10, 30); $pdf->MultiCell(190, 5, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'IDENTIFICAÇÃO DO PACIENTE'), 1, 'C', true);
            $pdf->SetXY(10, 160); $pdf->MultiCell(120, 5, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'PRESCRIÇÃO'), 1, 'C', true);
            $pdf->SetXY(130, 160); $pdf->MultiCell(70, 5, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'HORÁRIO'), 1, 'C', true);


        // Fields
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(10,25);$pdf->MultiCell(130,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'DATA E HORA DE EMISSÃO:'));
            $pdf->SetXY(140,25);$pdf->MultiCell(60,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'NÚMERO BPA:'));

            $pdf->SetXY(10,35);$pdf->MultiCell(100,5,'NOME:');
            $pdf->SetXY(110,35);$pdf->MultiCell(32,5,'D. NASCIMENTO:');
            $pdf->SetFont('Arial','B',15);
            $pdf->SetXY(142,35);$pdf->MultiCell(28,5,"    /     /");
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(175,35);$pdf->MultiCell(30,5,'IDADE:');

            $pdf->SetXY(10,40);$pdf->MultiCell(50,5,'CNS:');
            $pdf->SetXY(60,40);$pdf->MultiCell(40,5,'SEXO:');
            $pdf->SetXY(100,40);$pdf->MultiCell(35,5,'COR:');
            $pdf->SetXY(135,40);$pdf->MultiCell(65,5,'TELEFONE:');

            $pdf->SetXY(10,45);$pdf->MultiCell(125,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'ENDEREÇO:'));

            $pdf->SetXY(10,50);$pdf->MultiCell(65,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'PROCEDÊNCIA:'));

            $pdf->SetXY(10,55);$pdf->MultiCell(190,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'NOME DA MÃE:'));

            $pdf->SetXY(10,60);$pdf->MultiCell(190,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'RESPONSÁVEL:'));

            $pdf->SetXY(10,65);$pdf->MultiCell(125,5,'MOTIVO(OS):');
            $pdf->SetXY(135,65);$pdf->MultiCell(65,5,'ACIDENTE DE TRABALHO:');

            $pdf->SetXY(10,70);$pdf->MultiCell(55,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'CASO DE POLÍCIA:'));
            $pdf->SetXY(65,70);$pdf->MultiCell(70,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'CHEGOU DE AMBULÂNCIA:'));
            $pdf->SetXY(135,70);$pdf->MultiCell(65,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'PLANO DE SAÚDE: SUS'));

            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(10,75);$pdf->MultiCell(95,5,'SUSPEITA DE MAUS TRATOS:');
            $pdf->SetXY(105,75);$pdf->MultiCell(95,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'ORIUNDO DO (A/B/C) - PARÁ:'));

            $pdf->SetXY(10,80);$pdf->MultiCell(30,5,'SINAIS VITAIS');
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(40,80);$pdf->MultiCell(40,5,'HORA:');
            $pdf->Line(53,84.25,78,84.25);

            $pdf->SetXY(10,87);$pdf->MultiCell(70,5,'PA:                         mmHg, FC:          BPM');
            $pdf->Line(18,91.25,28,91.25);
            $pdf->Line(29,91.25,30,87.25);
            $pdf->Line(30,91.25,40,91.25);
            $pdf->Line(60,91.25,69,91.25);

            $pdf->SetXY(10,92);$pdf->MultiCell(70,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'SP02:         %, R:         IRPM, TAX:        °C'));
            $pdf->Line(21,96.25,29,96.25);
            $pdf->Line(38.5,96.25,46.5,96.25);
            $pdf->Line(66,96.25,73,96.25);

            $pdf->SetXY(10,97);$pdf->MultiCell(70,5,'GLIC. CAPILAR:                    mg/dL');
            $pdf->Line(38,101.25,56,101.25);

            $pdf->SetXY(10,102);$pdf->MultiCell(35,5,'GLASGOW:');
            $pdf->Line(31,106.25,50,106.25);
            $pdf->SetXY(50,102);$pdf->MultiCell(35,5,'EVA:');
            $pdf->Line(60,106.25,78,106.25);

            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(10,108);$pdf->MultiCell(70,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'CLASSIFICAÇÃO DE RISCO:'),0,'C');

            $pdf->SetFillColor(255,0,0);
            $pdf->Circle(17,116.5,4,'FD');
            $pdf->SetFillColor(255,100,0);
            $pdf->Circle(32,116.5,4,'FD');
            $pdf->SetFillColor(255,255,0);
            $pdf->Circle(46,116.5,4,'FD');
            $pdf->SetFillColor(0,255,0);
            $pdf->Circle(60,116.5,4,'FD');
            $pdf->SetFillColor(0,0,255);
            $pdf->Circle(73,116.5,4,'FD');
            $pdf->SetFont('Arial','B',12);
            $pdf->SetXY(13,112.5);$pdf->MultiCell(8,8,'1',0,'C');
            $pdf->SetXY(28,112.5);$pdf->MultiCell(8,8,'2',0,'C');
            $pdf->SetXY(42,112.5);$pdf->MultiCell(8,8,'3',0,'C');
            $pdf->SetXY(56,112.5);$pdf->MultiCell(8,8,'4',0,'C');
            $pdf->SetXY(69,112.5);$pdf->MultiCell(8,8,'5',0,'C');
            $pdf->SetFont('Arial','',8);
            $pdf->SetXY(10,120);$pdf->MultiCell(15,5,'Vermelho',0,'C');
            $pdf->SetXY(25,120);$pdf->MultiCell(14,5,'Laranja',0,'C');
            $pdf->SetXY(39,120);$pdf->MultiCell(14,5,'Amarelo',0,'C');
            $pdf->SetXY(53,120);$pdf->MultiCell(14,5,'Verde',0,'C');
            $pdf->SetXY(66.5,120);$pdf->MultiCell(13,5,'Azul',0,'C');

            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(80,80);$pdf->MultiCell(40,4,'[    ] HAS');
            $pdf->SetXY(80,84);$pdf->MultiCell(40,4,'[    ] CARD');
            $pdf->SetXY(80,88);$pdf->MultiCell(40,4,'[    ] DM');
            $pdf->SetXY(80,92);$pdf->MultiCell(40,4,'[    ] NEFROPATA');
            $pdf->SetXY(80,96);$pdf->MultiCell(40,4,'[    ] ETILISTA');
            $pdf->SetXY(80,100);$pdf->MultiCell(40,4,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'[    ] PSIQUIÁTRICO'));

            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(80,104);$pdf->MultiCell(20,5,'ALERGIA:');
            $pdf->Line(81,113.25,119,113.25);
            $pdf->Line(81,118.25,119,118.25);
            $pdf->Line(81,123.25,119,123.25);

            $pdf->SetXY(120,80);$pdf->MultiCell(80,5,'QUEIXA PRINCIPAL:');
            $pdf->SetFont('Arial','B',8);
            $pdf->SetXY(125,117);$pdf->MultiCell(70,6,'Enfermeiro(a) Classificador(a)','T','C');

            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(10,125);$pdf->MultiCell(100,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'DADOS CLÍNICOS:'));
            $pdf->SetXY(110,125);$pdf->MultiCell(90,5,'DATA DO PRIMEIRO SINTOMA:');
            $pdf->Line(164,129.25,172,129.25);
            $pdf->Line(173,129.25,174,126);
            $pdf->Line(174,129.25,182,129.25);
            $pdf->Line(183,129.25,184,126);
            $pdf->Line(184,129.25,194,129.25);

            $pdf->SetXY(10,145);$pdf->MultiCell(190,5,'EXAMES COMPLEMENTARES:');
            $pdf->SetFont('Arial','',9.5);
            $pdf->SetXY(10,150);$pdf->MultiCell(190,4,'[    ] ECG     [    ] RAIO X     [    ] SANGUE     [    ] URINA     [    ] ULTRASSONOGRAFIA     [    ] TOMOGRAFIA     [    ] LIQUOR');

            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(10,155);$pdf->MultiCell(120,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'DIAGNÓSTICO:'));
            $pdf->SetXY(130,155);$pdf->MultiCell(70,5,'CID:');

            $pdf->SetXY(10,240);$pdf->MultiCell(32,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'DATA DA SAÍDA:'));
            $pdf->SetFont('Arial','B',15);
            $pdf->SetXY(42,240);$pdf->MultiCell(28,5,"    /     /");
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(80,240);$pdf->MultiCell(40,5,'HORA:');
            $pdf->SetXY(120,240);$pdf->MultiCell(80,5,'ALTA:');
            $pdf->SetXY(10,245);$pdf->MultiCell(190,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'INTERNADO NO PRÓPRIO HOSPITAL (SETOR):'));
            $pdf->SetXY(10,250);$pdf->MultiCell(190,5,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'TRANFERÊNCIA (UNIDADE DE SAÚDE):'));
            $pdf->SetXY(10,255);$pdf->MultiCell(190,5,'EMITIDO POR:');

            $pdf->SetXY(15,280);$pdf->MultiCell(85,7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'ASS. DO PACIENTE/RESPONSÁVEL'),'T','C');
            $pdf->SetXY(110,280);$pdf->MultiCell(85,7,iconv("UTF-8", "ISO-8859-1//TRANSLIT",'ASS. E CARIMBO DO MÉDICO PLAN/HE/SESA'),'T','C');

        $pdf->Output('I', "BPA Nº " . 1 . ".pdf", true);

        exit;
    }

    public function he_patient()
    {
        $users = User::get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = PDF::loadView('modules.pdf.patient');

        $height = 43 * 2.835;

        $width = 70 * 2.835;

        $pdf->setPaper([0,0,$width,$height]);
     
        return $pdf->stream('itsolutionstuff.pdf');
    }

    public function he_companion()
    {
        $users = User::get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = PDF::loadView('modules.pdf.companion');

        $height = 43 * 2.835;

        $width = 70 * 2.835;

        $pdf->setPaper([0,0,$width,$height]);
     
        return $pdf->stream('itsolutionstuff.pdf');
    }
}
