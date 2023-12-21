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
        
        $imgCedulaBase64 = base64_encode(file_get_contents(public_path('storage/' . $contract->customer->img_cedula)));
        $imgPartNBase64 = base64_encode(file_get_contents(public_path('storage/' . $contract->customer->img_partida_n)));
        
        foreach($beneficiaries as $beneficiarie){
            $beneficiarie->img_cedula_base64 = base64_encode(file_get_contents(public_path('storage/' . $beneficiarie->img_cedula)));
            $beneficiarie->img_partida_base64 = base64_encode(file_get_contents(public_path('storage/' . $beneficiarie->img_partida_n)));
        }
        
        $pdf = \PDF::loadView('generatedPdf.imprimir', compact('contract', 'beneficiaries', 'imgCedulaBase64', 'imgPartNBase64'));
        return $pdf->stream('reporte.pdf');
    }
}
