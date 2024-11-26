<?php

namespace App\Http\Controllers;

use App\DataTables\SalariesDataTable;
use App\Http\Requests\CreateSalariesRequest;
use App\Http\Requests\UpdateSalariesRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Repositories\SalariesRepository;
use Illuminate\Http\Request;
use Flash;

class SalariesController extends AppBaseController
{
    /** @var SalariesRepository $salariesRepository*/
    private $salariesRepository;

    public function __construct(SalariesRepository $salariesRepo)
    {
        $this->salariesRepository = $salariesRepo;
    }

    /**
     * Display a listing of the Salaries.
     */
    public function index(SalariesDataTable $salariesDataTable)
    {
    return $salariesDataTable->render('salaries.index');
    }


    /**
     * Show the form for creating a new Salaries.
     */
    public function create()
    {
        $employees = Employee::pluck('first_name', 'id');
        return view('salaries.create',compact('employees'));
    }

    /**
     * Store a newly created Salaries in storage.
     */
    public function store(CreateSalariesRequest $request)
    {
        $input = $request->all();

        $salaries = $this->salariesRepository->create($input);

        Flash::success('Salaries saved successfully.');

        return redirect(route('salaries.index'));
    }

    /**
     * Display the specified Salaries.
     */
    public function show($id)
    {
        $salaries = $this->salariesRepository->find($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        return view('salaries.show')->with('salaries', $salaries);
    }

    /**
     * Show the form for editing the specified Salaries.
     */
    public function edit($id)
    {
        $salaries = $this->salariesRepository->find($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        return view('salaries.edit')->with('salaries', $salaries);
    }

    /**
     * Update the specified Salaries in storage.
     */
    public function update($id, UpdateSalariesRequest $request)
    {
        $salaries = $this->salariesRepository->find($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        $salaries = $this->salariesRepository->update($request->all(), $id);

        Flash::success('Salaries updated successfully.');

        return redirect(route('salaries.index'));
    }

    /**
     * Remove the specified Salaries from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $salaries = $this->salariesRepository->find($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        $this->salariesRepository->delete($id);

        Flash::success('Salaries deleted successfully.');

        return redirect(route('salaries.index'));
    }
}
