<?php

namespace App\Http\Controllers;

use App\DataTables\DepartmentsDataTable;
use App\Http\Requests\CreateDepartmentsRequest;
use App\Http\Requests\UpdateDepartmentsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Repositories\DepartmentsRepository;
use Illuminate\Http\Request;
use Flash;

class DepartmentsController extends AppBaseController
{
    /** @var DepartmentsRepository $departmentsRepository*/
    private $departmentsRepository;

    public function __construct(DepartmentsRepository $departmentsRepo)
    {
        $this->departmentsRepository = $departmentsRepo;
    }

    /**
     * Display a listing of the Departments.
     */
    public function index(DepartmentsDataTable $departmentsDataTable)
    {
    return $departmentsDataTable->render('departments.index');
    }


    /**
     * Show the form for creating a new Departments.
     */
    public function create()
    {
        // return view('departments.create');
        $employees = Employee::pluck('first_name', 'id');
        return view('departments.create', compact('employees'));
    }

    /**
     * Store a newly created Departments in storage.
     */
    public function store(CreateDepartmentsRequest $request)
    {
        $input = $request->all();

        $departments = $this->departmentsRepository->create($input);

        Flash::success('Departments saved successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Display the specified Departments.
     */
    public function show($id)
    {
        $departments = $this->departmentsRepository->find($id);

        if (empty($departments)) {
            Flash::error('Departments not found');

            return redirect(route('departments.index'));
        }

        return view('departments.show')->with('departments', $departments);
    }

    /**
     * Show the form for editing the specified Departments.
     */
    public function edit($id)
    {
        $departments = $this->departmentsRepository->find($id);

        if (empty($departments)) {
            Flash::error('Departments not found');

            return redirect(route('departments.index'));
        }

        $employees = Employee::pluck('first_name', 'id');

        return view('departments.edit', compact('departments', 'employees'));
    }

    /**
     * Update the specified Departments in storage.
     */
    public function update($id, UpdateDepartmentsRequest $request)
    {
        $departments = $this->departmentsRepository->find($id);

        if (empty($departments)) {
            Flash::error('Departments not found');

            return redirect(route('departments.index'));
        }

        $departments = $this->departmentsRepository->update($request->all(), $id);

        Flash::success('Departments updated successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified Departments from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $departments = $this->departmentsRepository->find($id);

        if (empty($departments)) {
            Flash::error('Departments not found');

            return redirect(route('departments.index'));
        }

        $this->departmentsRepository->delete($id);

        Flash::success('Departments deleted successfully.');

        return redirect(route('departments.index'));
    }
}
