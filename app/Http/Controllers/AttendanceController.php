<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with(['employee.position', 'employee.department'])->latest()->get();
        return view('attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();
        return view('attendance/create', compact('employees', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required',
            'date' => 'required|date',
            'check_in' => 'nullable|date_format:Y-m-d\TH:i',
            'check_out' => 'nullable|date_format:Y-m-d\TH:i',
            'status' => 'required|string|in:present,absent,on_leave,late'
        ]);

        Attendance::create($validated);
        return redirect()->route('attendances.index')->with('succes', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'employee_id' => 'required',
            'date' => 'required|date',
            'check_in' => 'nullable|date_format:Y-m-d\TH:i',
            'check_out' => 'nullable|date_format:Y-m-d\TH:i',
            'status' => 'required|string|in:present,absent,on_leave,late'
        ]);

        $attendance->update($validated);
        return redirect()->route('attendances.index')->with('success', 'berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
