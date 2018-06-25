<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patrimonio;

class PatrimonioController extends Controller
{
    public function index()
    {
    	$patrimonios = Patrimonio::all();
    	return view('patrimonio.index', compact('patrimonios'));
    }

    public function show($id)
    {
    	//
    }

    public function create()
    {
        return view('patrimonio.create');
    }

    public function store(Request $request)
    {
        Patrimonio::create( $request->all() );

        return redirect('patrimonio')->with('message', 'cadastrado');
    }

    public function edit($id)
    {
        $patrimonio = Patrimonio::findOrFail($id);
        return view('patrimonio.edit', compact('patrimonio'));
    }

    public function update(Request $request, $id)
    {
        $patrimonio = Patrimonio::findOrFail($id);
        $patrimonio->update($request->all());

        return redirect('patrimonio')->with('message', 'Patrimônio alterado com sucesso');
    }

    public function delete(Request $request, $id)
    {
        $patrimonio = Patrimonio::findOrFail($id);
        $patrimonio->delete();

        return redirect('patrimonio')->with('message', 'patrimonioe deletado com sucesso');
    }
}
