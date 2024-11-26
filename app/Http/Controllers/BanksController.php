<?php

namespace App\Http\Controllers;

use App\DataTables\BanksDataTable;
use App\Http\Requests\CreateBanksRequest;
use App\Http\Requests\UpdateBanksRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Repositories\BanksRepository;
use Illuminate\Http\Request;
use Flash;

class BanksController extends AppBaseController
{
    /** @var BanksRepository $banksRepository*/
    private $banksRepository;

    public function __construct(BanksRepository $banksRepo)
    {
        $this->banksRepository = $banksRepo;
    }

    /**
     * Display a listing of the Banks.
     */
    public function index(BanksDataTable $banksDataTable)
    {
    return $banksDataTable->render('banks.index');
    }


    /**
     * Show the form for creating a new Banks.
     */
    public function create()
    {
        $employees = Employee::pluck('first_name', 'id');
        return view('banks.create', compact('employees'));
    }

    /**
     * Store a newly created Banks in storage.
     */
    public function store(CreateBanksRequest $request)
    {
        $input = $request->all();

        $banks = $this->banksRepository->create($input);

        Flash::success('Banks saved successfully.');

        return redirect(route('banks.index'));
    }

    /**
     * Display the specified Banks.
     */
    public function show($id)
    {
        $banks = $this->banksRepository->find($id);

        if (empty($banks)) {
            Flash::error('Banks not found');

            return redirect(route('banks.index'));
        }

        return view('banks.show')->with('banks', $banks);
    }

    /**
     * Show the form for editing the specified Banks.
     */
    public function edit($id)
    {
        $banks = $this->banksRepository->find($id);

        if (empty($banks)) {
            Flash::error('Banks not found');

            return redirect(route('banks.index'));
        }

        return view('banks.edit')->with('banks', $banks);
    }

    /**
     * Update the specified Banks in storage.
     */
    public function update($id, UpdateBanksRequest $request)
    {
        $banks = $this->banksRepository->find($id);

        if (empty($banks)) {
            Flash::error('Banks not found');

            return redirect(route('banks.index'));
        }

        $banks = $this->banksRepository->update($request->all(), $id);

        Flash::success('Banks updated successfully.');

        return redirect(route('banks.index'));
    }

    /**
     * Remove the specified Banks from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $banks = $this->banksRepository->find($id);

        if (empty($banks)) {
            Flash::error('Banks not found');

            return redirect(route('banks.index'));
        }

        $this->banksRepository->delete($id);

        Flash::success('Banks deleted successfully.');

        return redirect(route('banks.index'));
    }
}
