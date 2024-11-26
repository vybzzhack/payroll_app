<?php

namespace App\Http\Controllers;

use App\DataTables\PromotionsDataTable;
use App\Http\Requests\CreatePromotionsRequest;
use App\Http\Requests\UpdatePromotionsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Repositories\PromotionsRepository;
use Illuminate\Http\Request;
use Flash;

class PromotionsController extends AppBaseController
{
    /** @var PromotionsRepository $promotionsRepository*/
    private $promotionsRepository;

    public function __construct(PromotionsRepository $promotionsRepo)
    {
        $this->promotionsRepository = $promotionsRepo;
    }

    /**
     * Display a listing of the Promotions.
     */
    public function index(PromotionsDataTable $promotionsDataTable)
    {
    return $promotionsDataTable->render('promotions.index');
    }


    /**
     * Show the form for creating a new Promotions.
     */
    public function create()
    {
        $employees = Employee::pluck('first_name', 'id');
        return view('promotions.create', compact('employees'));
    }

    /**
     * Store a newly created Promotions in storage.
     */
    public function store(CreatePromotionsRequest $request)
    {
        $input = $request->all();

        $promotions = $this->promotionsRepository->create($input);

        Flash::success('Promotions saved successfully.');

        return redirect(route('promotions.index'));
    }

    /**
     * Display the specified Promotions.
     */
    public function show($id)
    {
        $promotions = $this->promotionsRepository->find($id);

        if (empty($promotions)) {
            Flash::error('Promotions not found');

            return redirect(route('promotions.index'));
        }

        return view('promotions.show')->with('promotions', $promotions);
    }

    /**
     * Show the form for editing the specified Promotions.
     */
    public function edit($id)
    {
        $promotions = $this->promotionsRepository->find($id);

        if (empty($promotions)) {
            Flash::error('Promotions not found');

            return redirect(route('promotions.index'));
        }

        $employees = Employee::pluck('first_name', 'id');
        
        return view('promotions.edit', compact('employees'));
    }

    /**
     * Update the specified Promotions in storage.
     */
    public function update($id, UpdatePromotionsRequest $request)
    {
        $promotions = $this->promotionsRepository->find($id);

        if (empty($promotions)) {
            Flash::error('Promotions not found');

            return redirect(route('promotions.index'));
        }

        $promotions = $this->promotionsRepository->update($request->all(), $id);

        Flash::success('Promotions updated successfully.');

        return redirect(route('promotions.index'));
    }

    /**
     * Remove the specified Promotions from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $promotions = $this->promotionsRepository->find($id);

        if (empty($promotions)) {
            Flash::error('Promotions not found');

            return redirect(route('promotions.index'));
        }

        $this->promotionsRepository->delete($id);

        Flash::success('Promotions deleted successfully.');

        return redirect(route('promotions.index'));
    }
}
