<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoolingTypes;

class CoolingTypesController extends Controller
{
    public function index()
    {
        $cooling_types = CoolingTypes::all();
        return view('cooling_types', compact('cooling_types'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cooling_types = new CoolingTypes($request->input());
		$cooling_types->saveOrFail();
		return redirect('cooling_types');
    }

    public function show($id)
    {
        $cooling_types = CoolingTypes::find($id);
        return view('edit_cooling_types', compact('cooling_types'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $cooling_types = CoolingTypes::find($id);
		$cooling_types->fill($request->input())->saveOrFail();
		return redirect('cooling_types');
    }

    public function destroy($id)
    {
        $cooling_types = CoolingTypes::find($id);
		$cooling_types->delete();
		return redirect('cooling_types');
    }
}
