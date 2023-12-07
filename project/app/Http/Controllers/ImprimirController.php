<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contracts;
use App\Models\Beneficiaries;

class ImprimirController extends Controller
{
/*     public function imprimir(){
        
        $pdf = \PDF::loadView('generatedPdf/imprimir');
        return $pdf->download('reporte.pdf');
    } */

    public function imprimir($id){
        $contract = Contracts::find($id);
        $beneficiaries = Beneficiaries::where('contracts_id', $contract->id)->get();
        
        $pdf = \PDF::loadView('generatedPdf.imprimir', compact('contract', 'beneficiaries'));
        return $pdf->stream('reporte.pdf');
    }
}
