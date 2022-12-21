<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RamTypeSpeeds;
use App\Models\RamTypes;

class RamTypeSpeedsController extends Controller
{
    public function index()
    {
        $ram_type_speeds = RamTypeSpeeds::select('ram_type_speeds.id','ram_type_speeds.ram_type_speeds','ram_types.ram_types')->join('ram_types','ram_types.id','=','ram_type_speeds.ram_types')->get();
        $ram_types = RamTypes::all();
        return view('ram_type_speeds', compact('ram_type_speeds','ram_types'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $ram_type_speeds = new RamTypeSpeeds($request->input());
		$ram_type_speeds->saveOrFail();
		return redirect('ram_type_speeds');
    }

    public function show($id)
    {
        $ram_type_speeds = RamTypeSpeeds::find($id);
        $ram_types = RamTypes::all();
        return view('edit_ram_type_speeds', compact('ram_type_speeds','ram_types'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $ram_type_speeds = RamTypeSpeeds::find($id);
		$ram_type_speeds->fill($request->input())->saveOrFail();
		return redirect('ram_type_speeds');
    }

    public function destroy($id)
    {
        $ram_type_speeds = RamTypeSpeeds::find($id);
		$ram_type_speeds->delete();
		return redirect('ram_type_speeds');
    }
}
