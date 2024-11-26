<?php

namespace App\DataTables;

use App\Models\Leaves;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LeavesDataTable extends DataTable
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

        $dataTable->addColumn('employee_full_name', function (Leaves $leaves) {
            return $leaves->employee->full_name ?? 'N/A';
        });

        $dataTable->addColumn('leave_type_id', function (Leaves $leaves) {
            return $leaves->leaveType->leave_name ?? 'N/A';
        });

        $dataTable->addColumn('department_id', function (Leaves $leaves) {
            return $leaves->department->department_name ?? 'N/A';
        });

        $dataTable->addColumn('action', 'leaves.datatables_actions');

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Leaves $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Leaves $model)
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
            'leave_type_id',
            'department_id',
            'start_date',
            'end_date',
            'duration',
            'leave_status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'leaves_datatable_' . time();
    }
}
