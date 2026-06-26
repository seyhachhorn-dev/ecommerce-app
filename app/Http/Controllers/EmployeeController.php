<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = new Employee();
        return view('employee.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'FirstName'  => 'required|min:3|max:20',
            'LastName'   => 'required|min:3|max:20',
            'Department' => 'required|min:2|max:20',
            'Salary'     => 'required|numeric|min:0',
        ]);

        Employee::create([
            'FirstName'  => $request->FirstName,
            'LastName'   => $request->LastName,
            'Department' => $request->Department,
            'Salary'     => $request->Salary,
        ]);

        Session::flash('employee_create', 'New employee has been created.');

        return redirect()->route('employee.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'FirstName'  => 'required|min:3|max:20',
            'LastName'   => 'required|min:3|max:20',
            'Department' => 'required|min:2|max:20',
            'Salary'     => 'required|numeric|min:0',
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'FirstName'  => $request->FirstName,
            'LastName'   => $request->LastName,
            'Department' => $request->Department,
            'Salary'     => $request->Salary,
        ]);

        Session::flash('employee_update', 'Employee has been updated.');

        return redirect()->route('employee.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        Session::flash('employee_delete', 'Employee has been deleted.');

        return redirect()->route('employee.index');
    }
}