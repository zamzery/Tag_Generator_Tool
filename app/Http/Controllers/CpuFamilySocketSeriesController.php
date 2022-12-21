<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CpuFamilySocketSeries;

class CpuFamilySocketSeriesController extends Controller
{
    public function index()
    {
        $cpu_family_socket_series = CpuFamilySocketSeries::all();
        return view('cpu_family_socket_series', compact('cpu_family_socket_series'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cpu_family_socket_series = new CpuFamilySocketSeries($request->input());
		$cpu_family_socket_series->saveOrFail();
		return redirect('cpu_family_socket_series');
    }

    public function show($id)
    {
        $cpu_family_socket_series = CpuFamilySocketSeries::find($id);
        return view('edit_cpu_family_socket_series', compact('cpu_family_socket_series'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $cpu_family_socket_series = CpuFamilySocketSeries::find($id);
		$cpu_family_socket_series->fill($request->input())->saveOrFail();
		return redirect('cpu_family_socket_series');
    }

    public function destroy($id)
    {
        $cpu_family_socket_series = CpuFamilySocketSeries::find($id);
		$cpu_family_socket_series->delete();
		return redirect('cpu_family_socket_series');
    }
}
