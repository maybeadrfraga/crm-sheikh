<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Expense;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable'
        ]);

        Company::create($request->all());
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',            
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $company = Company::findOrFail($id);
        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->website = $request->input('website');

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->logo = $logoPath;
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function dash()
{
    $expenses = Expense::with('company')->get();
    // dd($expenses);
    return view('static-pages.dashboards.default', compact('expenses'));
}

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
