<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RamTypes;

class RamTypesController extends Controller
{
    public function index()
    {
        $ram_types = RamTypes::all();
        return view('ram_types', compact('ram_types'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $ram_types = new RamTypes($request->input());
		$ram_types->saveOrFail();
		return redirect('ram_types');
    }

    public function show($id)
    {
        $ram_types = RamTypes::find($id);
        return view('edit_ram_types', compact('ram_types'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $ram_types = RamTypes::find($id);
		$ram_types->fill($request->input())->saveOrFail();
		return redirect('ram_types');
    }

    public function destroy($id)
    {
        $ram_types = RamTypes::find($id);
		$ram_types->delete();
		return redirect('ram_types');
    }
}
