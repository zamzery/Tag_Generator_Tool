<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FanTypes;

class FanTypesController extends Controller
{
    public function index()
    {
        $fan_types = FanTypes::all();
        return view('fan_types', compact('fan_types'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $fan_types = new FanTypes($request->input());
		$fan_types->saveOrFail();
		return redirect('fan_types');
    }

    public function show($id)
    {
        $fan_types = FanTypes::find($id);
        return view('edit_fan_types', compact('fan_types'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $fan_types = FanTypes::find($id);
		$fan_types->fill($request->input())->saveOrFail();
		return redirect('fan_types');
    }

    public function destroy($id)
    {
        $fan_types = FanTypes::find($id);
		$fan_types->delete();
		return redirect('fan_types');
    }
}

