<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Office;
use App\Models\Contracts;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate();

        return view('customer.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * $customers->perPage());
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $customers = Customer::where('name', 'like', '%' . $query . '%')
            ->orWhere('subname', 'like', '%' . $query . '%')
            ->orWhere('cedula', 'like', '%' . $query . '%')
            // Agregar más campos de búsqueda si es necesario
            ->paginate(10); // O cualquier lógica de paginación que estés usando

        return view('customer.index', compact('customers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new Customer();
        $offices = Office::all();
        return view('customer.create', compact('customer'))->with([
            'offices' => $offices
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
            'name' => 'required|string',
            'subname' => 'required|string',
            'cedula' => 'required|integer|min:7',
            'date_n' => 'required|date',
            'img_cedula' => 'required|image',
            'img_partida_n' => 'required|image',
            'sex' => 'required|string',
            'civil_status' => 'required|string',
            'profession_status' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|integer|min:6',
            'landline' => 'required|integer|min:6',
            'nationality' => 'required|string',
            'date_admission' => 'required|date',
            'offices_id' => 'required',
        ]);

        $imgCedula = $request->file('img_cedula');
        $imgPartidaN = $request->file('img_partida_n');

        // Guardar la imagen de la cedula
        $imgCedulaPath = $imgCedula->store('docs', 'storage');

        // Guardar la imagen de la partida de nacimiento
        $imgPartidaNPath = $imgPartidaN->store('docs', 'storage');

        // Crear el registro del cliente en la base de datos
        $customer = Customer::create([
            'name' => $request->input('name'),
            'subname' => $request->input('subname'),
            'cedula' => $request->input('cedula'),
            'date_n' => $request->input('date_n'),
            'img_cedula' => $imgCedulaPath,
            'img_partida_n' => $imgPartidaNPath,
            'sex' => $request->input('sex'),
            'civil_status' => $request->input('civil_status'),
            'profession_status' => $request->input('profession_status'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'landline' => $request->input('landline'),
            'nationality' => $request->input('nationality'),
            'date_admission' => $request->input('date_admission'),
            'offices_id' => $request->input('offices_id'),
        ]);

        // Obtener la fecha actual
        $currentDate = date('d-m-y');

        // Crear el registro del contrato en la base de datos
        $contract = Contracts::create([
            'date_admission' => $currentDate,
            'cost_semanal' => '0', // valor por defecto
            'semana_cobro' => '0', // valor por defecto
            'atrasos' => $currentDate, // valor por defecto
            'suspendido' => '0', // valor por defecto
            'observaciones' => 'No presenta', // valor por defecto
            'type_services_id' => null, // valor por defecto
            'customers_id' => $customer->id, // usar el id del cliente recién creado
        ]);

        return redirect()->route('contracts.index')
            ->with('success', 'Cliente creado y contrato iniciado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

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
            'office_customer' => $office_customer,
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
            'name' => 'required|string',
            'subname' => 'required|string',
            'cedula' => 'required|integer|min:7',
            'date_n' => 'required|date',
            'img_cedula' => 'image',
            'img_partida_n' => 'image',
            'sex' => 'required|string',
            'civil_status' => 'required|string',
            'profession_status' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|integer|min:8',
            'landline' => 'required|integer|min:8',
            'nationality' => 'required|string',
            'date_admission' => 'required|date',
            'offices_id' => 'required',
        ]);

        // Verificar si se enviaron nuevos archivos
        if ($request->hasFile('img_cedula')) {
            $imgCedula = $request->file('img_cedula');
            $imgCedulaPath = $imgCedula->store('docs', 'public');
            $customer->img_cedula = $imgCedulaPath;
        }

        if ($request->hasFile('img_partida_n')) {
            $imgNacimiento = $request->file('img_partida_n');
            $imgNacimientoPath = $imgNacimiento->store('docs', 'public');
            $customer->img_nacimiento = $imgNacimientoPath;
        }

        // Actualizar los demás campos del cliente
        $customer->update($request->all());

        return redirect()->route('customer.index')
            ->with('success', 'Cliente actualizado con éxito.');
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
            ->with('success', 'Cliente eliminado con éxito.');
    }
}
