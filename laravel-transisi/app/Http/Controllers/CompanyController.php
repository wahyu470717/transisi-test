<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    protected $companyRepo;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepo = $companyRepo;
    }

    public function index()
    {
        $companies = $this->companyRepo->getAllCompanies(5);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();

        // Simpan logo
        $logoPath = $this->companyRepo->storeLogo($request->file('logo'));

        // Simpan company data
        $this->companyRepo->createCompany([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'logo' => $logoPath,
            'website' => $validated['website'],
        ]);

        return redirect()->route('companies.index');
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:companies,email,' . $company->id,
            'logo' => 'sometimes|image|mimes:png|max:2048',
            'website' => 'sometimes|required|url',
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo
            $this->companyRepo->deleteLogo($company->logo);

            // Store new logo
            $logoPath = $this->companyRepo->storeLogo($request->file('logo'));

            $validated['logo'] = $logoPath;
        }

        $this->companyRepo->updateCompany($company, $validated);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }


    public function destroy(Company $company)
    {

        $this->companyRepo->deleteLogo($company->logo);


        $this->companyRepo->deleteCompany($company);

        return redirect()->route('companies.index');
    }
}
