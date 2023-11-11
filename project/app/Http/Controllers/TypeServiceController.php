<?php

namespace App\Http\Controllers;

use App\Models\TypeService;
use Illuminate\Http\Request;

class TypeServiceController extends Controller
{
    //
    public function index()
    {
        $typeServices =TypeService::paginate();

        return view('typeServices.index', compact('typeServices'))
            ->with('i', (request()->input('page', 1) - 1) * $typeServices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeService = new TypeService();
        return view('typeServices.create', compact('typeService'));
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
            'price' => 'required|float',
          ]);
        $typeService =TypeService::create($request->all());

        return redirect()->route('typeService.index')
            ->with('success', 'type Service created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($idTypeService)
    {
        $typeService =TypeService::find($idTypeService);

        return view('typeService.show', compact('typeService'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idTypeService)
    {
        $typeService =TypeService::find($idTypeService);

        return view('typeServices.edit', compact('typeService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param TypeService $TypeSerTypeService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeService $typeService)
    { 
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|float',
          ]);
        
          $typeService->update($request->all());

        return redirect()->route('typeService.index')
            ->with('success', 'type Service updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($idTypeService)
    {
        $typeService =TypeService::find($idTypeService)->delete();

        return redirect()->route('typeService.index')
            ->with('success', 'Type Service deleted successfully');
    }
}
