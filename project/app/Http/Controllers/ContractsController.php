<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use App\Models\Customer;
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
            'cost-semnanal' =>'required|integer',
            'semana-cobro' => 'required|integer',
            'atrasos' =>'required|date',
            'suspendido' =>'required|string',
            'type-service_id' =>'required|string',
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
        $contracts = Contracts::find($id);

        return view('contracts.show', compact('contracts'));
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
        $customers_Contracts = Customer::find($contracts->customer_id);
        $type_Contracts = Customer::find($contracts->customer_id); //agregar el type_contract
             //aca añadir tambien a los beneficiarios

        return view('contracts.edit', compact('contracts'))->with([
            'contracts' => $contracts,
            'customer_Contracts' =>$customers_Contracts,
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contracts $Contracts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contracts $contracts)
    {
        $request->validate([
            'date_admission' =>'required|date',
            'cost-semnanal' =>'required|integer',
            'semana-cobro' => 'required|integer',
            'atrasos' =>'required|date',
            'suspendido' =>'required|string',
            'type-service' =>'required|string',
            'customers_id' =>'required',
        ]);

        $contracts->update($request->all());

        return redirect()->route('contracts.index')
            ->with('success', 'Contracts updated successfully');
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
            ->with('success', 'Contracts deleted successfully');
    }
}
