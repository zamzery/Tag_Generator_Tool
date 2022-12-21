<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StorageTypesFormat;

class StorageTypesFormatController extends Controller
{
    public function index()
    {
        $storage_types_format = StorageTypesFormat::all();
        return view('storage_types_format', compact('storage_types_format'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $storage_types_format = new StorageTypesFormat($request->input());
		$storage_types_format->saveOrFail();
		return redirect('storage_types_format');
    }

    public function show($id)
    {
        $storage_types_format = StorageTypesFormat::find($id);
        return view('edit_storage_types_format', compact('storage_types_format'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $storage_types_format = StorageTypesFormat::find($id);
		$storage_types_format->fill($request->input())->saveOrFail();
		return redirect('storage_types_format');
    }

    public function destroy($id)
    {
        $storage_types_format = StorageTypesFormat::find($id);
		$storage_types_format->delete();
		return redirect('storage_types_format');
    }
}
