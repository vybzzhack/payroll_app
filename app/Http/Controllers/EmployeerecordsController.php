<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeerecordsDataTable;
use App\Http\Requests\CreateEmployeerecordsRequest;
use App\Http\Requests\UpdateEmployeerecordsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Repositories\EmployeerecordsRepository;
use Illuminate\Http\Request;
use Flash;

class EmployeerecordsController extends AppBaseController
{
    /** @var EmployeerecordsRepository $employeerecordsRepository*/
    private $employeerecordsRepository;

    public function __construct(EmployeerecordsRepository $employeerecordsRepo)
    {
        $this->employeerecordsRepository = $employeerecordsRepo;
    }

    /**
     * Display a listing of the Employeerecords.
     */
    public function index(EmployeerecordsDataTable $employeerecordsDataTable)
    {
    return $employeerecordsDataTable->render('employeerecords.index');
    }


    /**
     * Show the form for creating a new Employeerecords.
     */
    public function create()
    {
        $employees = Employee::pluck('first_name', 'id');
        return view('employeerecords.create', compact('employees'));
    }

    /**
     * Store a newly created Employeerecords in storage.
     */
    public function store(CreateEmployeerecordsRequest $request)
    {
        $input = $request->all();

        $employeerecords = $this->employeerecordsRepository->create($input);

        Flash::success('Employeerecords saved successfully.');

        return redirect(route('employeerecords.index'));
    }

    /**
     * Display the specified Employeerecords.
     */
    public function show($id)
    {
        $employeerecords = $this->employeerecordsRepository->find($id);

        if (empty($employeerecords)) {
            Flash::error('Employeerecords not found');

            return redirect(route('employeerecords.index'));
        }

        return view('employeerecords.show')->with('employeerecords', $employeerecords);
    }

    /**
     * Show the form for editing the specified Employeerecords.
     */
    public function edit($id)
    {
        $employeerecords = $this->employeerecordsRepository->find($id);

        if (empty($employeerecords)) {
            Flash::error('Employeerecords not found');

            return redirect(route('employeerecords.index'));
        }

        $employees = Employee::pluck('first_name', 'id');
        
        return view('employeerecords.edit', compact('employees'));

    }

    /**
     * Update the specified Employeerecords in storage.
     */
    public function update($id, UpdateEmployeerecordsRequest $request)
    {
        $employeerecords = $this->employeerecordsRepository->find($id);

        if (empty($employeerecords)) {
            Flash::error('Employeerecords not found');

            return redirect(route('employeerecords.index'));
        }

        $employeerecords = $this->employeerecordsRepository->update($request->all(), $id);

        Flash::success('Employeerecords updated successfully.');

        return redirect(route('employeerecords.index'));
    }

    /**
     * Remove the specified Employeerecords from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employeerecords = $this->employeerecordsRepository->find($id);

        if (empty($employeerecords)) {
            Flash::error('Employeerecords not found');

            return redirect(route('employeerecords.index'));
        }

        $this->employeerecordsRepository->delete($id);

        Flash::success('Employeerecords deleted successfully.');

        return redirect(route('employeerecords.index'));
    }
}
