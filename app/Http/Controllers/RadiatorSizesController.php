<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RadiatorSizes;

class RadiatorSizesController extends Controller
{
    public function index()
    {
        $radiator_sizes = RadiatorSizes::all();
        return view('radiator_sizes', compact('radiator_sizes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $radiator_sizes = new RadiatorSizes($request->input());
		$radiator_sizes->saveOrFail();
		return redirect('radiator_sizes');
    }

    public function show($id)
    {
        $radiator_sizes = RadiatorSizes::find($id);
        return view('edit_radiator_sizes', compact('radiator_sizes'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $radiator_sizes = RadiatorSizes::find($id);
		$radiator_sizes->fill($request->input())->saveOrFail();
		return redirect('radiator_sizes');
    }

    public function destroy($id)
    {
        $radiator_sizes = RadiatorSizes::find($id);
		$radiator_sizes->delete();
		return redirect('radiator_sizes');
    }
}
