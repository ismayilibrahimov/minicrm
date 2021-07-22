<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        $companies = Company::all();

        return view('employees.create', compact('companies'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'string|email',
            'phone' => 'string',
            'company_id' => 'integer|required',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }


    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }


    public function edit(Employee $employee)
    {
        $companies = Company::all();

        return view('employees.edit', compact('employee', 'companies'));
    }


    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'string|email',
            'phone' => 'string',
            'company_id' => 'integer|required',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully!');
    }
}
