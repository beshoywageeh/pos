<?php

namespace App\DataTables;

use App\Models\category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\SearchPane;
use Yajra\DataTables\Services\DataTable;

class CategoriesDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $data = category::select('*');

        return (new EloquentDataTable($data))
            ->setRowId('id')
            ->addColumn('action', 'backend.Categories.action')
            ->addColumn('name', function ($row) {
                return $row->name;
            });
    }

    public function query(): QueryBuilder
    {
        return category::query();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('categories-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->dom('Blfrtip')
            ->buttons(

                Button::raw('<button data-target="#AddCategory" data-toggle="modal"
                                class="btn  btn-primary btn-sm buttons-create"
                                tabindex="0" aria-controls="example" type="button">
                            <i class="fa fa-plus"></i><span>' . trans('general.add') . '</span>
                        </button>'),

                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make(['extend' => 'reload', 'text' => '<i class="fa fa-sync"></i>']),

            )
            ->parameters([
                'language' => [

                    'url' => (App::getLocale() == 'en') ? '' : url('https://cdn.datatables.net/plug-ins/1.10.12/i18n/Arabic.json')

                ],
                'initComplete' => " function () {
		            this.api().columns([0,1]).every(function () {
		                var column = this;
		                var input = document.createElement(\"input\");
		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
		        }"

            ]);
    }

    protected function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('name')
                ->title(trans('category.name'))
                ->data('name')
                ->name('name'),

            Column::make('action')
                ->title(trans('general.actions'))
                ->data('action')
                ->name('action')
                ->searchable(false)
                ->sortable(false)
                ->exportable(false)
                ->orderable(false)
                ->printable(false)
            ->width('20px')

        ];
    }

    protected function filename(): string
    {
        return 'categories_' . date('YmdHis');
    }
}
