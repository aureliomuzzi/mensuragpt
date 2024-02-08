<?php

namespace App\Http\Controllers;

use App\Models\Alternativas;
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
            'enunciado' => Questions::questoes(),
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
        //
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
    public function edit(Alternatives $alternatives)
    {
        //
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
