<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeAllowancesDataTable;
use App\Http\Requests\CreateEmployeeAllowancesRequest;
use App\Http\Requests\UpdateEmployeeAllowancesRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Allowances;
use App\Models\Employee;
use App\Repositories\EmployeeAllowancesRepository;
use Illuminate\Http\Request;
use Flash;

class EmployeeAllowancesController extends AppBaseController
{
    /** @var EmployeeAllowancesRepository $employeeAllowancesRepository*/
    private $employeeAllowancesRepository;

    public function __construct(EmployeeAllowancesRepository $employeeAllowancesRepo)
    {
        $this->employeeAllowancesRepository = $employeeAllowancesRepo;
    }

    /**
     * Display a listing of the EmployeeAllowances.
     */
    public function index(EmployeeAllowancesDataTable $employeeAllowancesDataTable)
    {
    return $employeeAllowancesDataTable->render('employee_allowances.index');
    }


    /**
     * Show the form for creating a new EmployeeAllowances.
     */
    public function create()
    {
        $employees = Employee::all()->pluck('full_name', 'id');
        $allowances = Allowances::pluck('allowance_type', 'id');

        return view('employee_allowances.create', compact('employees', 'allowances'));
    }

    /**
     * Store a newly created EmployeeAllowances in storage.
     */
    public function store(CreateEmployeeAllowancesRequest $request)
    {
        $input = $request->all();

        $employeeAllowances = $this->employeeAllowancesRepository->create($input);

        Flash::success('Employee Allowances saved successfully.');

        return redirect(route('employee_allowances.index'));
    }

    /**
     * Display the specified EmployeeAllowances.
     */
    public function show($id)
    {
        $employeeAllowances = $this->employeeAllowancesRepository->find($id);

        if (empty($employeeAllowances)) {
            Flash::error('Employee Allowances not found');

            return redirect(route('employeeAllowances.index'));
        }

        return view('employee_allowances.show')->with('employeeAllowances', $employeeAllowances);
    }

    /**
     * Show the form for editing the specified EmployeeAllowances.
     */
    public function edit($id)
    {
        $employeeAllowances = $this->employeeAllowancesRepository->find($id);

        if (empty($employeeAllowances)) {
            Flash::error('Employee Allowances not found');

            return redirect(route('employeeAllowances.index'));
        }

        return view('employee_allowances.edit')->with('employeeAllowances', $employeeAllowances);
    }

    /**
     * Update the specified EmployeeAllowances in storage.
     */
    public function update($id, UpdateEmployeeAllowancesRequest $request)
    {
        $employeeAllowances = $this->employeeAllowancesRepository->find($id);

        if (empty($employeeAllowances)) {
            Flash::error('Employee Allowances not found');

            return redirect(route('employeeAllowances.index'));
        }

        $employeeAllowances = $this->employeeAllowancesRepository->update($request->all(), $id);

        Flash::success('Employee Allowances updated successfully.');

        return redirect(route('employeeAllowances.index'));
    }

    /**
     * Remove the specified EmployeeAllowances from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employeeAllowances = $this->employeeAllowancesRepository->find($id);

        if (empty($employeeAllowances)) {
            Flash::error('Employee Allowances not found');

            return redirect(route('employeeAllowances.index'));
        }

        $this->employeeAllowancesRepository->delete($id);

        Flash::success('Employee Allowances deleted successfully.');

        return redirect(route('employeeAllowances.index'));
    }
}
