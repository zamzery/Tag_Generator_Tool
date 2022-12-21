<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
        return view('series', compact('series'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $series = new Series($request->input());
		$series->saveOrFail();
		return redirect('series');
    }

    public function show($id)
    {
        $series = Series::find($id);
        return view('edit_series', compact('series'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $series = Series::find($id);
		$series->fill($request->input())->saveOrFail();
		return redirect('series');
    }

    public function destroy($id)
    {
        $series = Series::find($id);
		$series->delete();
		return redirect('series');
    }
}
