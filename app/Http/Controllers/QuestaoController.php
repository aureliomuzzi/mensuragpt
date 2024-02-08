<?php

namespace App\Http\Controllers;

use App\Models\Questao;
use Illuminate\Http\Request;
use App\DataTables\QuestaoDataTable;

class QuestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuestaoDataTable $dataTable)
    {
        return $dataTable->render('questoes.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questoes.form');
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

            Questao::create($dados);

            return redirect('/questoes')->with(['tipo'=>'success', 'mensagem'=>'Registro criado com sucesso!']);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->back()->withErrors(['tipo'=>'danger', 'mensagem'=>'Erro ao realizar operação.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questao  $questao
     * @return \Illuminate\Http\Response
     */
    public function show(Questao $questao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questao  $questao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questao = Questao::find($id);
        return view('questoes.form', [
            'questao' => $questao,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questao  $questao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $dados = $request->all();

            $questao = Questao::find($id);

            $questao->update($dados);
            return redirect('/questoes')->with(['tipo'=>'success', 'mensagem'=>'Registro atualizado com sucesso!']);
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->back()->withErrors(['tipo'=>'danger', 'mensagem'=>'Erro ao realizar operação.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questao  $questao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questao = Questao::find($id);
        $questao->delete();
        return redirect('/questoes')->with(['tipo'=>'success', 'mensagem'=>'Registro excluído com sucesso!']);
    }
}
