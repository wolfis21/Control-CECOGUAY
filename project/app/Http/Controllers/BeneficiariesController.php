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

        return view('beneficiaries.index', compact('beneficiariess'))
            ->with('i', (request()->input('page', 1) - 1) * $beneficiaries->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Beneficiaries = new Beneficiaries();
        $contracts = Contracts::all();
        return view('beneficiaries.create', compact('beneficiaries'))->with([
            'contracts'=> $contracts
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
            'profesion' =>'required|string',
            'address' =>'required|string',
            'phone' =>'required|integer|min:8',
            'landline' =>'required|integer|min:8',
            'nacionalidad' =>'required|string',
            'date_admission' =>'required|date',
            'img-cedula' => 'required',
            'img-nacimiento' => 'required',
            'parentesco' => 'required',
            'contracts_id' => 'required',
        ]);

        $Beneficiaries = Beneficiaries::create($request->all());

        return redirect()->route('beneficiaries.index')
            ->with('success', 'beneficiaries created successfully.');
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
        $contracts_Beneficiaries = Contracts::find($beneficiaries->zona_id);
        $contracts = Contracts::all(); //pensar un poco esto

        return view('beneficiaries.edit', compact('beneficiaries'))->with([
            'beneficiaries' => $beneficiaries,
            'contracts_Beneficiaries' =>$contracts_Beneficiaries,
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
            'profesion' =>'required|string',
            'address' =>'required|string',
            'phone' =>'required|integer|min:8',
            'landline' =>'required|integer|min:8',
            'nacionalidad' =>'required|string',
            'date_admission' =>'required|date',
            'img-cedula' => 'required',
            'img-nacimiento' => 'required',
            'parentesco' => 'required',
            'contracts_id' => 'required',
        ]);

        $beneficiaries->update($request->all());

        return redirect()->route('beneficiaries.index')
            ->with('success', 'beneficiaries updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $Beneficiaries = Beneficiaries::find($id)->delete();

        return redirect()->route('beneficiaries.index')
            ->with('success', 'beneficiaries deleted successfully');
    }
}
