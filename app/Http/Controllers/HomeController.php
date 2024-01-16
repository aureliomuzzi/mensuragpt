<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Despesa;
// use App\Models\Receita;
// use App\Models\Servico;
// use App\Services\GraficoService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function index()
    // {
    //     $tReceita = Receita::sum('valor');
    //     $tDespesa = Despesa::sum('valor');
    //     $tServicoConcluido = Servico::where('status', 2)->count();
    //     $tServicoAndamento = Servico::where('status', 1)->count();
    //     return view('home',[
    //         'tReceita' => isset($tReceita) ? $tReceita : null,
    //         'tDespesa' => isset($tDespesa) ? $tDespesa : null,
    //         'tServicoConcluido' => isset($tServicoConcluido) ? $tServicoConcluido : null,
    //         'tServicoAndamento' => isset($tServicoAndamento) ? $tServicoAndamento : null,
    //     ]);
    // }
}
