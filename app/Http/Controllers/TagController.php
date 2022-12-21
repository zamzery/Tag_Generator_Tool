<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CpuFamilySocketSeries;
use App\Models\RadiatorSizes;
use App\Models\FormFactors;
use App\Models\StorageTypesFormat;
use App\Models\RamCapacity;
use App\Models\RamTypes;
use App\Models\RamTypeSpeeds;
use App\Models\CoolingTypes;
use App\Models\FanTypes;
use App\Models\Tiers;
use App\Models\Series;

class TagController extends Controller
{
    public function index()
    {
        $cpu_family_socket_series_amd = CpuFamilySocketSeries::select('cpu_family_socket_series')->where('amd',true)->get();
		$cpu_family_socket_series_intel = CpuFamilySocketSeries::select('cpu_family_socket_series')->where('intel',true)->get();
        $radiator_sizes = RadiatorSizes::all();
        $form_factors = FormFactors::all();
        $storage_types_format = StorageTypesFormat::all();
        $ram_capacities = RamCapacity::all();
        $ram_types = RamTypes::all();
        $ram_type_speeds = RamTypeSpeeds::select('ram_type_speeds.id','ram_type_speeds.ram_type_speeds','ram_types.ram_types')->join('ram_types','ram_types.id','=','ram_type_speeds.ram_types')->get();
        $cooling_types = CoolingTypes::all();
        $fan_types = FanTypes::all();
        $tiers = Tiers::all();
        $series = Series::all();
        return view('tags', compact('cpu_family_socket_series_amd','cpu_family_socket_series_intel','radiator_sizes','form_factors','storage_types_format','ram_capacities','ram_types','ram_type_speeds','cooling_types','fan_types','tiers','series'));
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
