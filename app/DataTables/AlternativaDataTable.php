<?php

namespace App\DataTables;

use App\Models\Alternativa;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AlternativaDataTable extends DataTable
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
                return '<a href="' . route('alternativa.edit', $query) . '" class="btn btn-primary btn-xs"><i class="fas fa-pen text-xs px-1"></i></a>
                <a onclick="confirmarExclusao(this)" href="javascript:void(0)" data-rota="' . route('alternativa.destroy', $query->id) . '" class="btn btn-danger btn-xs"><i class="fas fa-trash text-xs px-1"></i></a>';
            })
            ->editColumn('questao_id', function($query) {
                return $query->questao->enunciado;
            })
            ->editColumn('alternativa_A', function($query) {
                return $query->alternativa_A;
            })
            ->editColumn('alternativa_B', function($query) {
                return $query->alternativa_B;
            })
            ->editColumn('alternativa_C', function($query) {
                return $query->alternativa_C;
            })
            ->editColumn('alternativa_D', function($query) {
                return $query->alternativa_D;
            })
            ->editColumn('alternativa_E', function($query) {
                return $query->alternativa_E;
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
     * @param \App\Models\Alternatives $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Alternativa $model)
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
            ->setTableId('alternativa-table')
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
            Column::make('alternativa_A')->title('Alternativa A'),
            Column::make('alternativa_B')->title('Alternativa B'),
            Column::make('alternativa_C')->title('Alternativa C'),
            Column::make('alternativa_D')->title('Alternativa D'),
            Column::make('alternativa_E')->title('Alternativa E'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Alternatives_' . date('YmdHis');
    }
}
