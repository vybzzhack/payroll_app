<?php

namespace App\Http\Controllers;

use App\DataTables\LeavetypesDataTable;
use App\Http\Requests\CreateLeavetypesRequest;
use App\Http\Requests\UpdateLeavetypesRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LeavetypesRepository;
use Illuminate\Http\Request;
use Flash;

class LeavetypesController extends AppBaseController
{
    /** @var LeavetypesRepository $leavetypesRepository*/
    private $leavetypesRepository;

    public function __construct(LeavetypesRepository $leavetypesRepo)
    {
        $this->leavetypesRepository = $leavetypesRepo;
    }

    /**
     * Display a listing of the Leavetypes.
     */
    public function index(LeavetypesDataTable $leavetypesDataTable)
    {
    return $leavetypesDataTable->render('leavetypes.index');
    }


    /**
     * Show the form for creating a new Leavetypes.
     */
    public function create()
    {
        return view('leavetypes.create');
    }

    /**
     * Store a newly created Leavetypes in storage.
     */
    public function store(CreateLeavetypesRequest $request)
    {
        $input = $request->all();

        $leavetypes = $this->leavetypesRepository->create($input);

        Flash::success('Leavetypes saved successfully.');

        return redirect(route('leavetypes.index'));
    }

    /**
     * Display the specified Leavetypes.
     */
    public function show($id)
    {
        $leavetypes = $this->leavetypesRepository->find($id);

        if (empty($leavetypes)) {
            Flash::error('Leavetypes not found');

            return redirect(route('leavetypes.index'));
        }

        return view('leavetypes.show')->with('leavetypes', $leavetypes);
    }

    /**
     * Show the form for editing the specified Leavetypes.
     */
    public function edit($id)
    {
        $leavetypes = $this->leavetypesRepository->find($id);

        if (empty($leavetypes)) {
            Flash::error('Leavetypes not found');

            return redirect(route('leavetypes.index'));
        }

        return view('leavetypes.edit')->with('leavetypes', $leavetypes);
    }

    /**
     * Update the specified Leavetypes in storage.
     */
    public function update($id, UpdateLeavetypesRequest $request)
    {
        $leavetypes = $this->leavetypesRepository->find($id);

        if (empty($leavetypes)) {
            Flash::error('Leavetypes not found');

            return redirect(route('leavetypes.index'));
        }

        $leavetypes = $this->leavetypesRepository->update($request->all(), $id);

        Flash::success('Leavetypes updated successfully.');

        return redirect(route('leavetypes.index'));
    }

    /**
     * Remove the specified Leavetypes from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $leavetypes = $this->leavetypesRepository->find($id);

        if (empty($leavetypes)) {
            Flash::error('Leavetypes not found');

            return redirect(route('leavetypes.index'));
        }

        $this->leavetypesRepository->delete($id);

        Flash::success('Leavetypes deleted successfully.');

        return redirect(route('leavetypes.index'));
    }
}
