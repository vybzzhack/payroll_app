<?php

namespace App\Http\Controllers;

use App\DataTables\DocumentationsDataTable;
use App\Http\Requests\CreateDocumentationsRequest;
use App\Http\Requests\UpdateDocumentationsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Repositories\DocumentationsRepository;
use Illuminate\Http\Request;
use Flash;

class DocumentationsController extends AppBaseController
{
    /** @var DocumentationsRepository $documentationsRepository*/
    private $documentationsRepository;

    public function __construct(DocumentationsRepository $documentationsRepo)
    {
        $this->documentationsRepository = $documentationsRepo;
    }

    /**
     * Display a listing of the Documentations.
     */
    public function index(DocumentationsDataTable $documentationsDataTable)
    {
    return $documentationsDataTable->render('documentations.index');
    }


    /**
     * Show the form for creating a new Documentations.
     */
    public function create()
    {
        $employees = Employee::pluck('first_name', 'id');
        return view('documentations.create', compact('employees'));
    }

    /**
     * Store a newly created Documentations in storage.
     */
    // public function store(CreateDocumentationsRequest $request)
    // {
    //     $input = $request->all();

    //     $documentations = $this->documentationsRepository->create($input);

    //     Flash::success('Documentations saved successfully.');

    //     return redirect(route('documentations.index'));
    // }


    public function store(CreateDocumentationsRequest $request)
    {
        // Validate the incoming request
        $request->validate([
            
            'employee_id' => 'required|exists:employees,id',
            'document_type' => 'required|string|max:100',
            'document_name' => 'required|string|max:100',
        ]);

        // Get all the form input data
        $input = $request->all();

        // Check if a file was uploaded
        if ($request->hasFile('file_path')) {
            // Define the storage folder
            $folder = 'Documentations';

            // Ensure the folder exists
            $path = storage_path('app/public/' . $folder);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            // Store the file in the 'Documentations' folder under 'public' disk and get the path
            $filePath = $request->file('file_path')->store($folder, 'public');

            // Add the file path to the input array
            $input['file_path'] = 'storage/' . $filePath;
        }

        // Save the form inputs along with the file path to the database
        $documentations = $this->documentationsRepository->create($input);

        // Show success message and redirect to the index page
        Flash::success('Documentations saved successfully.');

        return redirect(route('documentations.index'));
    }

    // public function store(CreateDocumentationsRequest $request)
    // {
    //     // Get all the form input data
    //     $input = $request->all();

    //     // Check if a file was uploaded and handle the file upload
    //     if ($request->hasFile('file')) {
    //         // Validate the file
    //         $request->validate([
    //             'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
    //         ]);

    //         // Store the file in the 'documents' folder under 'public' disk and get the path
    //         $filePath = $request->file('file')->store('documents', 'public');

    //         // Add the file path to the input array
    //         $input['file'] = 'storage/' . $filePath;
    //     }

    //     // Save the form inputs along with the file path to the database
    //     $documentations = $this->documentationsRepository->create($input);

    //     // Show success message and redirect to the index page
    //     Flash::success('Documentations saved successfully.');

    //     return redirect(route('documentations.index'));
    // }



    /**
     * Display the specified Documentations.
     */
    public function show($id)
    {
        $documentations = $this->documentationsRepository->find($id);

        if (empty($documentations)) {
            Flash::error('Documentations not found');

            return redirect(route('documentations.index'));
        }

        return view('documentations.show')->with('documentations', $documentations);
    }

    /**
     * Show the form for editing the specified Documentations.
     */
    public function edit($id)
    {
        $documentations = $this->documentationsRepository->find($id);

        if (empty($documentations)) {
            Flash::error('Documentations not found');

            return redirect(route('documentations.index'));
        }

        return view('documentations.edit')->with('documentations', $documentations);
    }

    /**
     * Update the specified Documentations in storage.
     */
    public function update($id, UpdateDocumentationsRequest $request)
    {
        $documentations = $this->documentationsRepository->find($id);

        if (empty($documentations)) {
            Flash::error('Documentations not found');

            return redirect(route('documentations.index'));
        }

        $documentations = $this->documentationsRepository->update($request->all(), $id);

        Flash::success('Documentations updated successfully.');

        return redirect(route('documentations.index'));
    }

    /**
     * Remove the specified Documentations from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $documentations = $this->documentationsRepository->find($id);

        if (empty($documentations)) {
            Flash::error('Documentations not found');

            return redirect(route('documentations.index'));
        }

        $this->documentationsRepository->delete($id);

        Flash::success('Documentations deleted successfully.');

        return redirect(route('documentations.index'));
    }
}
