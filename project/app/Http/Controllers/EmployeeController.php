<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate();

        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * $employees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();
        $office = Office::all();
        return view('employee.create', compact('employee'))->with([
            'office'=> $office
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
            'cedula' => 'required',
            'name' => 'required',
            'subname' => 'required',
            'date_n' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'offices_id' => 'required',
        ]);

        $employee = Employee::create([
            'cedula' => $request->input('cedula'),
            'name' => $request->input('name'),
            'subname' => $request->input('subname'),
            'date_n' => $request->input('date_n'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'offices_id' => $request->input('offices_id'),
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email'=> $request->input('name').'@cecoguay.com',
            'email_verified_at' => null,
            'password' => $request->input('name').'12345', //agregar a la documentacion
            'position' => $request->input('position'),
            'employees_id' => $employee->id,
        ]);

        return redirect()->route('employee.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $office_employee = Office::find($employee->office_id);
        $office = Office::all();

        return view('employee.edit', compact('employee'))->with([
            'office' => $office,
            'office_employee' =>$office_employee,
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employee $Employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'cedula' => 'required',
            'name' => 'required',
            'subname' => 'required',
            'date_n' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'offices_id' => 'required',
        ]);

        $employee->update($request->all());

        return redirect()->route('employee.index')
            ->with('success', 'employee updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $Employee = Employee::find($id)->delete();

        return redirect()->route('employee.index')
            ->with('success', 'Employee deleted successfully');
    }
}
