<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDeductionsDataTable;
use App\Http\Requests\CreateEmployeeDeductionsRequest;
use App\Http\Requests\UpdateEmployeeDeductionsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Deductions;
use App\Models\Employee;
use App\Repositories\EmployeeDeductionsRepository;
use Illuminate\Http\Request;
use Flash;

class EmployeeDeductionsController extends AppBaseController
{
    /** @var EmployeeDeductionsRepository $employeeDeductionsRepository*/
    private $employeeDeductionsRepository;

    public function __construct(EmployeeDeductionsRepository $employeeDeductionsRepo)
    {
        $this->employeeDeductionsRepository = $employeeDeductionsRepo;
    }

    /**
     * Display a listing of the EmployeeDeductions.
     */
    public function index(EmployeeDeductionsDataTable $employeeDeductionsDataTable)
    {
    return $employeeDeductionsDataTable->render('employee_deductions.index');
    }


    /**
     * Show the form for creating a new EmployeeDeductions.
     */
    public function create()
    {
        $employees = Employee::all()->pluck('full_name', 'id');
        
        $deductions = Deductions::pluck('deduction_name', 'id');
        return view('employee_deductions.create',compact('employees', 'deductions'));
    }

    /**
     * Store a newly created EmployeeDeductions in storage.
     */
    public function store(CreateEmployeeDeductionsRequest $request)
    {
        $input = $request->all();

        $employeeDeductions = $this->employeeDeductionsRepository->create($input);

        Flash::success('Employee Deductions saved successfully.');

        return redirect(route('employee_deductions.index'));
    }

    /**
     * Display the specified EmployeeDeductions.
     */
    public function show($id)
    {
        $employeeDeductions = $this->employeeDeductionsRepository->find($id);

        if (empty($employeeDeductions)) {
            Flash::error('Employee Deductions not found');

            return redirect(route('employeeDeductions.index'));
        }

        return view('employee_deductions.show')->with('employeeDeductions', $employeeDeductions);
    }

    /**
     * Show the form for editing the specified EmployeeDeductions.
     */
    public function edit($id)
    {
        $employeeDeductions = $this->employeeDeductionsRepository->find($id);

        if (empty($employeeDeductions)) {
            Flash::error('Employee Deductions not found');

            return redirect(route('employeeDeductions.index'));
        }

        return view('employee_deductions.edit')->with('employeeDeductions', $employeeDeductions);
    }

    /**
     * Update the specified EmployeeDeductions in storage.
     */
    public function update($id, UpdateEmployeeDeductionsRequest $request)
    {
        $employeeDeductions = $this->employeeDeductionsRepository->find($id);

        if (empty($employeeDeductions)) {
            Flash::error('Employee Deductions not found');

            return redirect(route('employeeDeductions.index'));
        }

        $employeeDeductions = $this->employeeDeductionsRepository->update($request->all(), $id);

        Flash::success('Employee Deductions updated successfully.');

        return redirect(route('employeeDeductions.index'));
    }

    /**
     * Remove the specified EmployeeDeductions from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employeeDeductions = $this->employeeDeductionsRepository->find($id);

        if (empty($employeeDeductions)) {
            Flash::error('Employee Deductions not found');

            return redirect(route('employee_deductions.index'));
        }

        $this->employeeDeductionsRepository->delete($id);

        Flash::success('Employee Deductions deleted successfully.');

        return redirect(route('employee_deductions.index'));
    }
}
