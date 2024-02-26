<?php

namespace App\Http\Controllers;

use App\Models\Alternatives;
use Illuminate\Http\Request;
use App\DataTables\AlternativesDataTable;
use App\Models\Questions;

class AlternativesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AlternativesDataTable $dataTable)
    {
        return $dataTable->render('alternativas.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternativas.form', [
            'enunciados' => Questions::questoes()->pluck('enunciado', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $dados = $request->all();

            Alternatives::create($dados);

            return redirect('/alternatives')->with(['tipo'=>'success', 'mensagem'=>'Registro criado com sucesso!']);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->back()->withErrors(['tipo'=>'danger', 'mensagem'=>'Erro ao realizar operação.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatives  $alternatives
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatives $alternatives)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatives  $alternatives
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternativa = Alternatives::find($id);
        $enunciados = Questions::questoes()->pluck('enunciado', 'id');
        return view('alternativas.form', [
            'enunciados' => $alternativa,
            'enunciados' => $enunciados,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatives  $alternatives
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternatives $alternatives)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatives  $alternatives
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternatives $alternatives)
    {
        //
    }
}
