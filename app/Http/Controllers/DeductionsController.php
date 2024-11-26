<?php

namespace App\Http\Controllers;

use App\DataTables\DeductionsDataTable;
use App\Http\Requests\CreateDeductionsRequest;
use App\Http\Requests\UpdateDeductionsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\DeductionsRepository;
use Illuminate\Http\Request;
use Flash;

class DeductionsController extends AppBaseController
{
    /** @var DeductionsRepository $deductionsRepository*/
    private $deductionsRepository;

    public function __construct(DeductionsRepository $deductionsRepo)
    {
        $this->deductionsRepository = $deductionsRepo;
    }

    /**
     * Display a listing of the Deductions.
     */
    public function index(DeductionsDataTable $deductionsDataTable)
    {
    return $deductionsDataTable->render('deductions.index');
    }


    /**
     * Show the form for creating a new Deductions.
     */
    public function create()
    {
        return view('deductions.create');
    }

    /**
     * Store a newly created Deductions in storage.
     */
    public function store(CreateDeductionsRequest $request)
    {
        $input = $request->all();

        $deductions = $this->deductionsRepository->create($input);

        Flash::success('Deductions saved successfully.');

        return redirect(route('deductions.index'));
    }

    /**
     * Display the specified Deductions.
     */
    public function show($id)
    {
        $deductions = $this->deductionsRepository->find($id);

        if (empty($deductions)) {
            Flash::error('Deductions not found');

            return redirect(route('deductions.index'));
        }

        return view('deductions.show')->with('deductions', $deductions);
    }

    /**
     * Show the form for editing the specified Deductions.
     */
    public function edit($id)
    {
        $deductions = $this->deductionsRepository->find($id);

        if (empty($deductions)) {
            Flash::error('Deductions not found');

            return redirect(route('deductions.index'));
        }

        return view('deductions.edit')->with('deductions', $deductions);
    }

    /**
     * Update the specified Deductions in storage.
     */
    public function update($id, UpdateDeductionsRequest $request)
    {
        $deductions = $this->deductionsRepository->find($id);

        if (empty($deductions)) {
            Flash::error('Deductions not found');

            return redirect(route('deductions.index'));
        }

        $deductions = $this->deductionsRepository->update($request->all(), $id);

        Flash::success('Deductions updated successfully.');

        return redirect(route('deductions.index'));
    }

    /**
     * Remove the specified Deductions from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $deductions = $this->deductionsRepository->find($id);

        if (empty($deductions)) {
            Flash::error('Deductions not found');

            return redirect(route('deductions.index'));
        }

        $this->deductionsRepository->delete($id);

        Flash::success('Deductions deleted successfully.');

        return redirect(route('deductions.index'));
    }
}
