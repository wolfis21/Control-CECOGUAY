<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Office;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Companies::paginate();
        $offices = Office::all();

        return view('companies.index', compact('companies'))
            ->with(['i', (request()->input('page', 1) - 1) * $companies->perPage(),
            'offices' => $offices,]);
    }
    public function search(Request $request)
    {
        $companies = Companies::paginate();
        $query = $request->input('query');
        $offices = Office::where('address', 'like', '%' . $query . '%')
 /*            ->orWhere('subname', 'like', '%' . $query . '%')
            ->orWhere('cedula', 'like', '%' . $query . '%') */
            // Agregar más campos de búsqueda si es necesario
            ->paginate(10); // O cualquier lógica de paginación que estés usando

        /* return view('companies.index', compact('offices')); */
        return view('companies.index', compact('companies'))
        ->with(['i', (request()->input('page', 1) - 1) * $companies->perPage(),
        'offices' => $offices,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = new Companies();
        return view('companies.create', compact('companies'));
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
        'rif_companies' => 'required|integer|min:8',
        'name' =>'required|string',
        'description' =>'required|string',
        'num_contact' =>'required|integer|min:8',
    ]);
        $companies = companies::create($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Empresa creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($idcompanies)
    {
        $companies = Companies::find($idcompanies);

        return view('companies.show', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::find($id);

        return view('companies.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  companies $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies)
    { 
        $request->validate([
        'rif_companies' => 'required',
        'name' =>'required',
        'description' =>'required',
        'num_contact' =>'required',
        ]);
        
        var_dump($companies->id);

        $companies->update($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Empresa actualizada con éxito'. $companies->id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($idCompanies)
    {
        $companies = Companies::find($idCompanies)->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Empresa eliminada éxito');
    }
}
