<?php

namespace App\DataTables;

use App\Models\Gabarito;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GabaritoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('action', function($query) {
                return '<a href="' . route('gabarito.edit', $query) . '" class="btn btn-primary btn-xs"><i class="fas fa-pen text-xs px-1"></i></a>
                <a onclick="confirmarExclusao(this)" href="javascript:void(0)" data-rota="' . route('gabarito.destroy', $query->id) . '" class="btn btn-danger btn-xs"><i class="fas fa-trash text-xs px-1"></i></a>';
            })
            ->editColumn('questao_id', function($query) {
                return $query->questao->enunciado;
            })
            ->editColumn('resposta_correta', function($query) {
                return $query->resposta_correta;
            })
            ->editColumn('created_at', function($query) {
                return $query->created_at->format("d/m/Y H:i");
            })
            ->editColumn('updated_at', function($query) {
                return $query->updated_at->format("d/m/Y H:i");
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Templates $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Gabarito $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('gabarito-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('excel')->text("<i class='fas fa-file-excel'></i> Exportar Excel"),
                // Button::make('pdf')->text("<i class='fas fa-print'></i> Exportar PDF"),
                Button::make('create')->text("<i class='fas fa-plus'></i> Novo Registro"),
            )
            ->parameters([
                "language" => [
                    "url" => "/js/translate_pt-br.json"
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('action')->title('Ações')->searchable(false)->orderable(false),
            Column::make('questao_id')->title('Enunciado'),
            Column::make('resposta_correta')->title('Resposta Correta'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Templates_' . date('YmdHis');
    }
}
