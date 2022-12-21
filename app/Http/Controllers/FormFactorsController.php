<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormFactors;

class FormFactorsController extends Controller
{
    public function index()
    {
        $form_factors = FormFactors::all();
        return view('form_factors', compact('form_factors'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $form_factors = new FormFactors($request->input());
		$form_factors->saveOrFail();
		return redirect('form_factors');
    }

    public function show($id)
    {
        $form_factors = FormFactors::find($id);
        return view('edit_form_factors', compact('form_factors'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $form_factors = FormFactors::find($id);
		$form_factors->fill($request->input())->saveOrFail();
		return redirect('form_factors');
    }

    public function destroy($id)
    {
        $form_factors = FormFactors::find($id);
		$form_factors->delete();
		return redirect('form_factors');
    }
}
