<?php

namespace App\Http\Controllers;

use App\DataTables\PayrollsDataTable;
use App\Http\Requests\CreatePayrollsRequest;
use App\Http\Requests\UpdatePayrollsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Models\Salaries;
use App\Repositories\PayrollsRepository;
use Illuminate\Http\Request;
use Flash;

class PayrollsController extends AppBaseController
{
    /** @var PayrollsRepository $payrollsRepository*/
    private $payrollsRepository;

    public function __construct(PayrollsRepository $payrollsRepo)
    {
        $this->payrollsRepository = $payrollsRepo;
    }

    /**
     * Display a listing of the Payrolls.
     */
    public function index(PayrollsDataTable $payrollsDataTable)
    {
    return $payrollsDataTable->render('payrolls.index');
    }


    /**
     * Show the form for creating a new Payrolls.
     */
    public function create()
    {
        $salaries = Salaries::pluck('employee_id', 'id');
        $employees = Employee::pluck('first_name', 'id');
        return view('payrolls.create', compact('employees', 'salaries'));
    }

    /**
     * Store a newly created Payrolls in storage.
     */
    public function store(CreatePayrollsRequest $request)
    {
        $input = $request->all();

        $payrolls = $this->payrollsRepository->create($input);

        Flash::success('Payrolls saved successfully.');

        return redirect(route('payrolls.index'));
    }

    /**
     * Display the specified Payrolls.
     */
    public function show($id)
    {
        $payrolls = $this->payrollsRepository->find($id);

        if (empty($payrolls)) {
            Flash::error('Payrolls not found');

            return redirect(route('payrolls.index'));
        }

        return view('payrolls.show')->with('payrolls', $payrolls);
    }

    /**
     * Show the form for editing the specified Payrolls.
     */
    public function edit($id)
    {
        $payrolls = $this->payrollsRepository->find($id);

        if (empty($payrolls)) {
            Flash::error('Payrolls not found');

            return redirect(route('payrolls.index'));
        }

        $salaries = Salaries::pluck('employee_id', 'id');
        $employees = Employee::pluck('first_name', 'id');

        return view('payrolls.create', compact('employees', 'salaries'));
        
    }

    /**
     * Update the specified Payrolls in storage.
     */
    public function update($id, UpdatePayrollsRequest $request)
    {
        $payrolls = $this->payrollsRepository->find($id);

        if (empty($payrolls)) {
            Flash::error('Payrolls not found');

            return redirect(route('payrolls.index'));
        }

        $payrolls = $this->payrollsRepository->update($request->all(), $id);

        Flash::success('Payrolls updated successfully.');

        return redirect(route('payrolls.index'));
    }

    /**
     * Remove the specified Payrolls from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $payrolls = $this->payrollsRepository->find($id);

        if (empty($payrolls)) {
            Flash::error('Payrolls not found');

            return redirect(route('payrolls.index'));
        }

        $this->payrollsRepository->delete($id);

        Flash::success('Payrolls deleted successfully.');

        return redirect(route('payrolls.index'));
    }
}
