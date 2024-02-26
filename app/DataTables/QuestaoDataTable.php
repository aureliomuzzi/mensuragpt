<?php

namespace App\DataTables;

use App\Models\Questao;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class QuestaoDataTable extends DataTable
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
                return '<a href="' . route('questao.edit', $query) . '" class="btn btn-primary btn-xs"><i class="fas fa-pen text-xs px-1"></i></a>
                <a onclick="confirmarExclusao(this)" href="javascript:void(0)" data-rota="' . route('questao.destroy', $query->id) . '" class="btn btn-danger btn-xs"><i class="fas fa-trash text-xs px-1"></i></a>';
            })
            ->editColumn('categoria_id', function($query) {
                return $query->categoria->categoria;
            })
            ->editColumn('enunciado', function($query) {
                return $query->enunciado;
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
     * @param \App\Models\Questions $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Questao $model)
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
                    ->setTableId('questao-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->buttons(
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
            Column::make('categoria_id')->title('Categoria'),
            Column::make('enunciado')->title('Enunciado'),
            Column::make('created_at')->title('Cadastro')->addClass('text-center'),
            Column::make('updated_at')->title('Atualizado')->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Questao_' . date('YmdHis');
    }
}
