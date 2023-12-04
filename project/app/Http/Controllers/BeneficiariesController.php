<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaries;
use App\Models\Contracts;
use Illuminate\Http\Request;

class BeneficiariesController extends Controller
{
    //
    public function index()
    {
        $beneficiaries = Beneficiaries::paginate();

        return view('beneficiaries.index', compact('beneficiaries'))
            ->with('i', (request()->input('page', 1) - 1) * $beneficiaries->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficiaries = new Beneficiaries();
        /* $contract = Contracts::find($beneficiaries->contracts_id); */
        $contract = Contracts::all();
        return view('beneficiaries.create',[ 
            'beneficiaries' => $beneficiaries,
            'contract' => $contract,
        ]);
    }

    public function createWithContract($contract)
    {
        $beneficiaries = new Beneficiaries();
        return view('beneficiaries.create', [ 
            'beneficiaries' => $beneficiaries,
            'contract' => $contract,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string',
            'subname' =>'required|string',
            'cedula' => 'required|integer',
            'date_n' =>'required|date',
            'sex' =>'required|string',
            'civil_status' =>'required|string',
            'professional_status' =>'required|string',
            'address' =>'required|string',
            'phone' =>'required|integer',
            'landline' =>'required|integer',
            'nationality' =>'required|string',
            'date_admission' =>'required|date',
            'parentesco' => 'required',
            'contracts_id' => 'required',
        ]);

        $imgCedula = $request->file('img_cedula');
        $imgPartidaN = $request->file('img_partida_n');
    
        // Guardar la imagen de la cedula
        $imgCedulaPath = $imgCedula->store('docs', 'storage');
    
        // Guardar la imagen de la partida de nacimiento
        $imgPartidaNPath = $imgPartidaN->store('docs', 'storage');

        $beneficiaries = Beneficiaries::create([
            'name' => $request->input('name'),
            'subname' => $request->input('subname'),
            'cedula' => $request->input('cedula'),
            'date_n' => $request->input('date_n'),
            'img_cedula' => $imgCedulaPath,
            'img_partida_n' => $imgPartidaNPath,
            'sex' => $request->input('sex'),
            'civil_status' => $request->input('civil_status'),
            'professional_status' => $request->input('professional_status'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'landline' => $request->input('landline'),
            'nationality' => $request->input('nationality'),
            'date_admission' => $request->input('date_admission'),
            'parentesco' => $request->input('parentesco'),
            'contracts_id' => $request->input('contracts_id'),
        ]);

/*         return redirect()->route('contracts.index')
            ->with('success', 'Beneficiario agregado con Exito.'); */

            return redirect()->route('contracts.show', $request->contracts_id)
            ->with('success', 'Beneficiario agregado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beneficiaries = Beneficiaries::find($id);

        return view('beneficiaries.show', compact('beneficiaries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beneficiaries = Beneficiaries::find($id);
        $contracts_Beneficiaries = Contracts::find($beneficiaries->contracts_id);
        $contracts = Contracts::all(); //pensar un poco esto

        return view('beneficiaries.edit',[
            'beneficiaries' => $beneficiaries,
            'contracts_Beneficiaries' =>$contracts_Beneficiaries,
            'contracts' => $contracts,
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Beneficiaries $Beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiaries $beneficiaries)
    {
        $request->validate([
            'name' =>'required|string',
            'subname' =>'required|string',
            'cedula' => 'required|integer',
            'date_n' =>'required|date',
            'sex' =>'required|string',
            'civil_status' =>'required|string',
            'professional_status' =>'required|string',
            'address' =>'required|string',
            'phone' =>'required|integer',
            'landline' =>'required|integer',
            'nationality' =>'required|string',
            'date_admission' =>'required|date',
            'parentesco' => 'required',
            'contracts_id' => 'required',
        ]);
        // Verificar si se enviaron nuevos archivos
        if ($request->hasFile('img_cedula')) {
            $imgCedula = $request->file('img_cedula');
            $imgCedulaPath = $imgCedula->store('docs', 'public');
            $beneficiaries->img_cedula = $imgCedulaPath;
        }
    
        if ($request->hasFile('img_partida_n')) {
            $imgNacimiento = $request->file('img_partida_n');
            $imgNacimientoPath = $imgNacimiento->store('docs', 'public');
            $beneficiaries->img_nacimiento = $imgNacimientoPath;
        }

        $beneficiaries->update($request->all());

/*         return redirect()->route('beneficiaries.index')
            ->with('success', 'beneficiaries updated successfully'); */

            return redirect()->route('contracts.show', $request->contracts_id)
            ->with('success', 'Beneficiario editado con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $beneficiarier = Beneficiaries::find($id);
        $contracts_id = $beneficiarier->contracts_id;
        $beneficiarier->delete();
        
        return redirect()->route('contracts.show', $contracts_id)->with('success', 'Beneficiario eliminado con éxito.');

/*         return redirect()->route('beneficiaries.index')
            ->with('success', 'beneficiaries deleted successfully'); */
           
    }
}
