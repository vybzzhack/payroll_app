<?php

namespace App\Http\Controllers;

use App\DataTables\LeavesDataTable;
use App\Http\Requests\CreateLeavesRequest;
use App\Http\Requests\UpdateLeavesRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Departments;
use App\Models\Employee;
use App\Models\Leaves;
use App\Models\Leavetypes;
use App\Repositories\LeavesRepository;
use Illuminate\Http\Request;
use Flash;

class LeavesController extends AppBaseController
{
    /** @var LeavesRepository $leavesRepository*/
    private $leavesRepository;

    public function __construct(LeavesRepository $leavesRepo)
    {
        $this->leavesRepository = $leavesRepo;
    }

    /**
     * Display a listing of the Leaves.
     */
    public function index(LeavesDataTable $leavesDataTable)
    {
    return $leavesDataTable->render('leaves.index');
    }


    /**
     * Show the form for creating a new Leaves.
     */
    public function create()
    {
        $employees = Employee::pluck('first_name', 'id');
        $leavetypes = Leavetypes::pluck('leave_name', 'id');
        $departments = Departments::pluck('department_name', 'id');
        return view('leaves.create', compact('employees', 'leavetypes', 'departments'));
    }

    /**
     * Store a newly created Leaves in storage.
     */
    public function store(CreateLeavesRequest $request)
    {
        $input = $request->all();

        $leaves = $this->leavesRepository->create($input);

        Flash::success('Leaves saved successfully.');

        return redirect(route('leaves.index'));
    }

    /**
     * Display the specified Leaves.
     */
    public function show($id)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        return view('leaves.show')->with('leaves', $leaves);
    }

    /**
     * Show the form for editing the specified Leaves.
     */
    public function edit($id)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        $employees = Employee::pluck('first_name', 'id');
        $leavetypes = Leavetypes::pluck('leave_name', 'id');
        $departments = Departments::pluck('department_name', 'id');

        return view('leaves.edit', compact('employees', 'leavetypes', 'departments'));
    }

    /**
     * Update the specified Leaves in storage.
     */
    public function update($id, UpdateLeavesRequest $request)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        $leaves = $this->leavesRepository->update($request->all(), $id);

        Flash::success('Leaves updated successfully.');

        return redirect(route('leaves.index'));
    }

    /**
     * Remove the specified Leaves from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        $this->leavesRepository->delete($id);

        Flash::success('Leaves deleted successfully.');

        return redirect(route('leaves.index'));
    }
}
