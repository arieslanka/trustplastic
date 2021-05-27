<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            ->addColumn('action', '<div class="input-group flex-nowrap">
            <div class="m-1">
                <button class="btn btn-round btn-yellow btn-sm">
                    Edit
                </button>
            </div>
            <div class="m-1">
                <button class="btn btn-round btn-outline-danger btn-sm">
                    Deactivate
                </button>
            </div>

        </div>', 1);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->columns($this->getColumns())
            ->setTableId('userdatatable')
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::computed('action')
                ->exportable(true)
                ->printable(false)
                ->width(60)->addClass('py-1 align-middle'),
            Column::make('emp_no')->title('&nbsp;&nbsp;Emp&nbsp;No'),
            Column::make('fname')->title('&nbsp;&nbsp;First&nbsp;Name'),
            Column::make('lname')->title('&nbsp;&nbsp;Last&nbsp;Name'),
            Column::make('email')->title('&nbsp;&nbsp;Email'),
            Column::make('usertype')->title('&nbsp;&nbsp;Type')->searchable(false),
            Column::make('status')->title('&nbsp;&nbsp;Status')->searchable(false),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'userreport' . date('YmdHis');
    }
}
