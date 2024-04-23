<?php

namespace App\Http\Controllers;

use App\Models\Activist;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class ActivistToPdfController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new PDF('L', 'mm', 'LETTER');
    }

    public function CoordinatorPdf()
    {
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage();
        $this->fpdf->SetFillColor(184, 184, 187);
        $this->fpdf->SetTextColor(64);
        $this->fpdf->SetDrawColor(0, 0, 0);
        $this->fpdf->SetLineWidth(0.3);

        $header = array('ID', 'NOMBRE', 'APELLIDOS', 'TELEFONO', 'CORREO', 'DIRECCION', 'CURP');

        $data = Activist::all();

        $this->fpdf->FancyTable($header, $data);

        /*
        #####################################
        #####################################
                Salida de pdf
        */

        $this->fpdf->Output('D', "Requisicion.pdf");
        exit;
    }
}

class PDF extends Fpdf
{
    function Header()
    {
        $images = public_path() . '/img';
        $this->Image($images . '/logo.png', 10, 10, 15);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, "AMIGOS DE CHAK ME'EX", 0, 0, 'C', false);
        $this->Ln();
        $this->Ln();
    }

    function Footer()
    {

    }

    function FancyTable($header, $data)
    {
        $this->SetFillColor(169, 50, 38);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('Arial','B', 7);

        $col_width = $this->GetPageWidth() / 10;
        foreach ($header as $key => $value) {
            if ($key == 2 || $key == 1)
            {
                $this->Cell($col_width * 1.5 , 7, $value, 1, 0, 'C', true);
            }
            elseif($key == 0 )
            {
                $this->Cell($col_width / 2, 7, $value, 1, 0, 'C', true);
            }
            elseif($key == 3 )
            {
                $this->Cell($col_width, 7, $value, 1, 0, 'C', true);
            }
            elseif($key == 4 )
            {
                $this->Cell($col_width * 2, 7, $value, 1, 0, 'C', true);
            }
            else
            {
                $this->Cell($col_width * 1.5, 7, $value, 1, 0, 'C', true);
            }
        }
        $this->Ln();
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $fill=false;
        foreach ($data as $key => $value) {
            $this->Cell($col_width / 2, 7, $value->id, 1, 0, 'C', $fill);
            $this->Cell($col_width * 1.5, 7, $value->name, 1, 0, 'C', $fill);
            $this->Cell($col_width * 1.5, 7, $value->lastname, 1, 0, 'C', $fill);
            $this->Cell($col_width, 7, $value->tel, 1, 0, 'C', $fill);
            $this->Cell($col_width * 2, 7, $value->email, 1, 0, 'C', $fill);
            $this->Cell($col_width * 1.5, 7, $value->address, 1, 0, 'C', $fill);
            $this->Cell($col_width * 1.5, 7, $value->curp, 1, 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->Ln(5);
    }
}

