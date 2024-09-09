<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return Inertia::render('Pessoa/Index', ['pessoas' => $pessoas]);
    }

    public function create()
    {
        return Inertia::render('Pessoa/Create');
    }

    public function store(Request $request)
    {
        Pessoa::create($request->all());
        return redirect()->route('pessoas.index');
    }

    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return redirect()->back();
    }

    public function edit(Pessoa $pessoa)
    {
        return Inertia::render('Pessoa/Create', ['pessoa' => $pessoa, 'isUpdating' => true]);
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        $pessoa->update($request->all());
        return redirect()->route('pessoas.index');
    }
}
