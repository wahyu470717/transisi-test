<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeRequest;
use App\Imports\EmployeesImport;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{


    public function index()
    {
        $employees = Employee::paginate(5);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();
        Employee::create($validated);
        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, Employee $employee)
    {

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:employees,email,' . $employee->id,
            'company_id' => 'nullable|exists:companies,id',
        ]);

        // Update hanya field yang diterima dan diubah
        $employee->update($validated);

        // Redirect kembali ke daftar employee
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }

    public function exportPdf($companyId)
    {

        $company = Company::with('employees')->findOrFail($companyId);

        $pdf = PDF::loadView('employees.pdf', compact('company'));


        return $pdf->download("employees_{$company->name}.pdf");
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new EmployeesImport, $request->file('file'));

        return redirect()->back()->with('success', 'File imported successfully!');
    }
}
