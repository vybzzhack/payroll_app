<?php

namespace App\Http\Controllers;

use App\DataTables\AllowancesDataTable;
use App\Http\Requests\CreateAllowancesRequest;
use App\Http\Requests\UpdateAllowancesRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Repositories\AllowancesRepository;
use Illuminate\Http\Request;
use Flash;

class AllowancesController extends AppBaseController
{
    /** @var AllowancesRepository $allowancesRepository*/
    private $allowancesRepository;

    public function __construct(AllowancesRepository $allowancesRepo)
    {
        $this->allowancesRepository = $allowancesRepo;
    }

    /**
     * Display a listing of the Allowances.
     */
    public function index(AllowancesDataTable $allowancesDataTable)
    {
    return $allowancesDataTable->render('allowances.index');
    }


    /**
     * Show the form for creating a new Allowances.
     */
    public function create()
    {
        $employees = Employee::pluck('first_name', 'id');
        return view('allowances.create', compact('employees'));
    }

    /**
     * Store a newly created Allowances in storage.
     */
    public function store(CreateAllowancesRequest $request)
    {
        $input = $request->all();

        $allowances = $this->allowancesRepository->create($input);

        Flash::success('Allowances saved successfully.');

        return redirect(route('allowances.index'));
    }

    /**
     * Display the specified Allowances.
     */
    public function show($id)
    {
        $allowances = $this->allowancesRepository->find($id);

        if (empty($allowances)) {
            Flash::error('Allowances not found');

            return redirect(route('allowances.index'));
        }

        return view('allowances.show')->with('allowances', $allowances);
    }

    /**
     * Show the form for editing the specified Allowances.
     */
    public function edit($id)
    {
        $allowances = $this->allowancesRepository->find($id);

        if (empty($allowances)) {
            Flash::error('Allowances not found');

            return redirect(route('allowances.index'));
        }

        // $departments = Department::pluck('department_name', 'id');

        // return view('employees.edit', compact('employee', 'departments'));

        $employees = Employee::pluck('first_name', 'id');
        
        return view('allowances.edit', compact('employees'));
    }

    /**
     * Update the specified Allowances in storage.
     */
    public function update($id, UpdateAllowancesRequest $request)
    {
        $allowances = $this->allowancesRepository->find($id);

        if (empty($allowances)) {
            Flash::error('Allowances not found');

            return redirect(route('allowances.index'));
        }

        $allowances = $this->allowancesRepository->update($request->all(), $id);

        Flash::success('Allowances updated successfully.');

        return redirect(route('allowances.index'));
    }

    /**
     * Remove the specified Allowances from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $allowances = $this->allowancesRepository->find($id);

        if (empty($allowances)) {
            Flash::error('Allowances not found');

            return redirect(route('allowances.index'));
        }

        $this->allowancesRepository->delete($id);

        Flash::success('Allowances deleted successfully.');

        return redirect(route('allowances.index'));
    }
}
