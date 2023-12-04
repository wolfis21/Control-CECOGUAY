<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\Customer;
use App\Models\TypeService;
use App\Models\Beneficiaries;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    //
    public function index()
    {
        $contracts = Contracts::paginate();

        return view('contracts.index', compact('contracts'))
            ->with('i', (request()->input('page', 1) - 1) * $contracts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts = new Contracts();
        $customers = Customer::all(); //traerse el ultimo customer
        return view('contracts.create', compact('contracts'))->with([
            'customers'=> $customers
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
            'date_admission' =>'required|date',
            'cost_semanal' =>'required|integer',
            'semana_cobro' => 'required|string',
            'atrasos' =>'required|integer',
            'suspendido' =>'required|string',
            'observaciones' => 'required|string',
            'type_services_id' =>'required',
            'customers_id' =>'required',
        ]);

        $contracts = Contracts::create($request->all());

        return redirect()->route('contracts.index')
            ->with('success', 'Contracts created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contracts::find($id);
        $beneficiaries = Beneficiaries::where('contracts_id', $contract->id)->get();
    
        return view('contracts.show', compact('contract', 'beneficiaries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contracts = Contracts::find($id);
        $customer = Customer::find($contracts->customers_id);
        $type_Contracts = TypeService::all();
    
        return view('contracts.edit', [
            'contracts' => $contracts,
            'customer' => $customer,
            'type_Contracts' => $type_Contracts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contracts $Contracts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date_admission' =>'required|date',
            'cost_semanal' =>'required|integer',
            'semana_cobro' => 'required|string',
            'atrasos' =>'required|integer',
            'suspendido' =>'required|string',
            'observaciones' => 'required|string',
            'type_services_id' =>'required',
            'customers_id' =>'required',
        ]);

        $contract = Contracts::find($id);
        $contract->update($request->all());

        return redirect()->route('contracts.index')
            ->with('success', 'Contrato actualizado con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $Contracts = Contracts::find($id)->delete();

        return redirect()->route('contracts.index')
            ->with('success', 'Contracto eliminado exito.');
    }
}
