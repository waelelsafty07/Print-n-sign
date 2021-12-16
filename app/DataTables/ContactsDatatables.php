<?php

namespace App\DataTables;

use App\Models\Contact;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContactsDatatables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->addColumn('checkbox', 'admin.categories.btn.checkbox')
        ->rawColumns([

        ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CategoriesDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contact $model)
    {
        return Contact::query()->orderBy('created_at', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
        //->addAction(['width' => '80px'])
        //->parameters($this->getBuilderParameters());
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, 'All Records']],
                'buttons' => [
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fas fa-redo-alt"></i>'],
                ],
                
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
           [
                'name' => 'name',
                'data' => 'name',
                'title' => 'Name',
            ], [
                'name' => 'email',
                'data' => 'email',
                'title' => 'Email',
            ],[
                'name' => 'phone',
                'data' => 'phone',
                'title' => 'Phone',
            ],[
                'name' => 'message',
                'data' => 'message',
                'title' => 'Message',
            ],[
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Created At',
            ],


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ContactsDatatables_' . date('YmdHis');
    }
}
