<?php

namespace App\Http\Controllers\Admin;

use App\Models\Variable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VariableController extends Controller
{
    public function index()
    {
        $variables = Variable::all();
        return view('admin.variables.index', compact('variables'));
    }

    public function edit(Variable $variable)
    {
        return view('admin.variables.edit', compact('variable'));
    }

    public function update(Request $request, Variable $variable)
    {
        Variable::updateOrCreate(['id' => $variable->id], request(['value']));
        return redirect()->route('admin.variables.index');
    }
}
