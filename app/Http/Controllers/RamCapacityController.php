<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RamCapacity;

class RamCapacityController extends Controller
{
    public function index()
    {
        $ram_capacities = RamCapacity::all();
        return view('ram_capacity', compact('ram_capacities'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $ram_capacities = new RamCapacity($request->input());
		$ram_capacities->saveOrFail();
		return redirect('ram_capacity');
    }

    public function show($id)
    {
        $ram_capacities = RamCapacity::find($id);
        return view('edit_ram_capacity', compact('ram_capacities'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $ram_capacities = RamCapacity::find($id);
		$ram_capacities->fill($request->input())->saveOrFail();
		return redirect('ram_capacity');
    }

    public function destroy($id)
    {
        $ram_capacities = RamCapacity::find($id);
		$ram_capacities->delete();
		return redirect('ram_capacity');
    }
}
