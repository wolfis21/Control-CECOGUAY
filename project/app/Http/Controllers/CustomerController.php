<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Office;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate();

        return view('customer.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * $customers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Customer = new Customer();
        $offices = Office::all();
        return view('customer.create', compact('customer'))->with([
            'offices'=> $offices
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
            'img-cedula' =>'required|string',
            'img-nacimiento' =>'required|string',
            'offices_id' => 'required',
        ]);

        $Customer = Customer::create($request->all());

        return redirect()->route('customer.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Customer = Customer::find($id);

        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $office_customer = Office::find($customer->zona_id);
        $offices = Office::all();

        return view('Customer.edit', compact('customer'))->with([
            'offices' => $offices,
            'office_customer' =>$office_customer,
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Customer $Customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
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
            'img-cedula' =>'required|string',
            'img-nacimiento' =>'required|string',
            'offices_id' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index')
            ->with('success', 'Customer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customer = Customer::find($id)->delete();

        return redirect()->route('customer.index')
            ->with('success', 'Customer deleted successfully');
    }
}
