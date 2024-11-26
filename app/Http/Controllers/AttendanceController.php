<?php

namespace App\Http\Controllers;

use App\DataTables\AttendanceDataTable;
use App\Http\Requests\CreateAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Employee;
use App\Repositories\AttendanceRepository;
use Illuminate\Http\Request;
use Flash;

class AttendanceController extends AppBaseController
{
    /** @var AttendanceRepository $attendanceRepository*/
    private $attendanceRepository;

    public function __construct(AttendanceRepository $attendanceRepo)
    {
        $this->attendanceRepository = $attendanceRepo;
    }

    /**
     * Display a listing of the Attendance.
     */
    public function index(AttendanceDataTable $attendanceDataTable)
    {
    return $attendanceDataTable->render('attendances.index');
    }


    /**
     * Show the form for creating a new Attendance.
     */
    public function create()
    {
        $employees = Employee::pluck('first_name', 'id');
        return view('attendances.create', compact('employees'));
    }

    /**
     * Store a newly created Attendance in storage.
     */
    public function store(CreateAttendanceRequest $request)
    {
        $input = $request->all();

        $attendance = $this->attendanceRepository->create($input);

        Flash::success('Attendance saved successfully.');

        return redirect(route('attendances.index'));
    }

    /**
     * Display the specified Attendance.
     */
    public function show($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        return view('attendances.show')->with('attendance', $attendance);
    }

    /**
     * Show the form for editing the specified Attendance.
     */
    public function edit($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $employees = Employee::pluck('first_name', 'id');

        return view('attendances.edit', compact('employees'));
    }

    /**
     * Update the specified Attendance in storage.
     */
    public function update($id, UpdateAttendanceRequest $request)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $attendance = $this->attendanceRepository->update($request->all(), $id);

        Flash::success('Attendance updated successfully.');

        return redirect(route('attendances.index'));
    }

    /**
     * Remove the specified Attendance from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $this->attendanceRepository->delete($id);

        Flash::success('Attendance deleted successfully.');

        return redirect(route('attendances.index'));
    }
}
