<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    //
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $direcciones = Office::where('address','LIKE',$busqueda.'%')
                        ->latest('id');

        $data = [
            'direcciones' =>$direcciones,
            'busqueda' =>$busqueda,
        ];
        //arreglar esta busqueda
        $offices = Office::paginate();

        return view('office.index',$data,compact('offices'))
            ->with('i', (request()->input('page', 1) - 1) * $offices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $office = new Office();
        $companies = companies::all();
     
        return view('office.create', compact('office'))->with([
            'companies' => $companies
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
            'address' => 'required|string|min:15',
            'num_contact' =>'required|string|min:8',
            'companies_id' =>'required|integer',
            ]);
        $office = Office::create($request->all());

        return redirect()->route('offices.index')
            ->with('success', 'office created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($idOffice)
    {
        $office = Office::find($idOffice);

        return view('office.show', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office::find($id);
        $office_companies = Office::find($office->companies_id);
        $companies = Companies::all();

        return view('office.edit', compact('office'))->with([
            'companies' => $companies,
            'office_companies' => $office_companies,
        ]);
    }

    public function update(Request $request, Office $office)
    {
        $request->validate([
            'address' => 'required|string|min:15',
            'num_contact' =>'required|string|min:8',
            'companies_id' =>'required',
            ]);

        $office->update($request->all());

        return redirect()->route('offices.index')
            ->with('success', 'office updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($idOffice)
    {
        $office = Office::find($idOffice)->delete();

        return redirect()->route('offices.index')
            ->with('success', 'office deleted successfully');
    }
}
