<?php

namespace App\Http\Controllers;

use App\Models\Alternativa;
use Illuminate\Http\Request;
use App\DataTables\AlternativaDataTable;
use App\Models\Questao;

class AlternativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AlternativaDataTable $dataTable)
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
            'enunciados' => Questao::questoes()->pluck('enunciado', 'id'),
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

            Alternativa::create($dados);

            return redirect('/alternativa')->with(['tipo'=>'success', 'mensagem'=>'Registro criado com sucesso!']);
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
        $alternativa = Alternativa::find($id);
        return view('alternativas.form', [
            'alternativa' => $alternativa,
            'questoes' => Questao::questoes(),
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
