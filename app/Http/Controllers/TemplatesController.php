<?php

namespace App\Http\Controllers;

use App\Models\Templates;
use Illuminate\Http\Request;
use App\DataTables\TemplatesDataTable;
use App\Models\Questions;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TemplatesDataTable $dataTable)
    {
        return $dataTable->render('gabaritos.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabaritos.form', [
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
     * @param  \App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function show(Templates $templates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function edit(Templates $templates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Templates $templates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Templates  $templates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Templates $templates)
    {
        //
    }
}
