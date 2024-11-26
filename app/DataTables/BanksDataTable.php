<?php

namespace App\DataTables;

use App\Models\Banks;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BanksDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $dataTable->addColumn('employee_full_name', function (Banks $banks) {
            return $banks->employee->full_name ?? 'N/A';
        });

        $dataTable->addColumn('action', 'banks.datatables_actions');
        
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Banks $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Banks $model)
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
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'employee_full_name',
            'bank_name',
            'branch_name',
            'account_number',
            'account_name',
            'account_type',
            'bank_code',
            'currency'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'banks_datatable_' . time();
    }
}
