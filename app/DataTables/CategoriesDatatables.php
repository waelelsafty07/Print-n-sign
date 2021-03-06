<?php

namespace App\DataTables;

use App\Models\Categories;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoriesDatatables extends DataTable
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
        ->addColumn('edit', 'admin.categories.btn.edit')
        ->addColumn('delete', 'admin.categories.btn.delete')
        ->addColumn('image', 'admin.categories.img')
        ->addColumn('SubCategories', 'admin.categories.subcategories.btn.category')
        ->rawColumns([
            'edit',
            'delete',
            'checkbox',
            'image',
            'SubCategories'
        ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CategoriesDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Categories $model)
    {
        return Categories::query();
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
                    [
                        'text' => '<i class="fa fa-plus"></i>  Create New Category',
                        'className' => 'btn btn-primary','action'=>"function (){
                          window.location.href='".\URL::current()."/create';
                        }"],
                    [
                      'text' => '<i class="fa fa-trash"></i> Delete',
                      'className' => 'btn btn-danger btn-delete-all',
                  ],
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
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<input type="checkbox" class="checkall" onclick="checkall()"/>',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],[
                'name' => 'name',
                'data' => 'name',
                'title' => 'Name',
            ], [
                'name' => 'image',
                'data' => 'image',
                'title' => 'Image',
            ], [
                'name' => 'edit',
                'data' => 'edit',
                'title' => 'Edit',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ], [
                'name' => 'delete',
                'data' => 'delete',
                'title' => 'Delete',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ], [
                'name' => 'SubCategories',
                'data' => 'SubCategories',
                'title' => 'SubCategories',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ]

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'CategoriesDatatables_' . date('YmdHis');
    }
}
