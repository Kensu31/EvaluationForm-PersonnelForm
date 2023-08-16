<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class generatePDFs extends Controller
{
    public function generateEvaluationPlain(){
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('evaluationform.evaluationformblank');

        return $pdf->download('child-page.pdf');
    }
}
