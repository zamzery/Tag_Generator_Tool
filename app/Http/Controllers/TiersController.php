<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiers;

class TiersController extends Controller
{
    public function index()
    {
        $tiers = Tiers::all();
        return view('tiers', compact('tiers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $tiers = new Tiers($request->input());
		$tiers->saveOrFail();
		return redirect('tiers');
    }

    public function show($id)
    {
        $tiers = Tiers::find($id);
        return view('edit_tiers', compact('tiers'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $tiers = Tiers::find($id);
		$tiers->fill($request->input())->saveOrFail();
		return redirect('tiers');
    }

    public function destroy($id)
    {
        $tiers = Tiers::find($id);
		$tiers->delete();
		return redirect('tiers');
    }
}
