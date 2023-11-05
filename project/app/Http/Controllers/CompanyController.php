<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companys = Company::paginate();

        return view('company.index', compact('companys'))
            ->with('i', (request()->input('page', 1) - 1) * $companys->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company();
        return view('company.create', compact('company'));
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
        'rif_company' => 'required|integer|min:8',
        'name' =>'required|string',
        'description' =>'required|string',
        'num_contact' =>'required|integer|min:8',
    ]);
        $company = Company::create($request->all());

        return redirect()->route('company.index')
            ->with('success', 'company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($idCompany)
    {
        $company = Company::find($idCompany);

        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idCompany)
    {
        $company = Company::find($idCompany);

        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    { 
        $request->validate([
        'rif_company' => 'required|integer|min:8',
        'name' =>'required|string',
        'description' =>'required|string',
        'num_contact' =>'required|integer|min:8',
        ]);
        
        $company->update($request->all());

        return redirect()->route('company.index')
            ->with('success', 'company updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($idCompany)
    {
        $company = Company::find($idCompany)->delete();

        return redirect()->route('company.index')
            ->with('success', 'company deleted successfully');
    }
}
