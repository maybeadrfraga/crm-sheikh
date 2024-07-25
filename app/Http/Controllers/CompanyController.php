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
        $user = auth()->user();
        $allExpenses = Expense::with('company')->get();
        $recentExpenses = Expense::with('company')->orderBy('date', 'desc')->take(5)->get();
        // $companies = Company::all();
        $companies = Company::with('expenses')->get();

        // Calcular o total dos gastos
        $totalSpending = $companies->sum(function ($company) {
            return $company->expenses->sum('amount');
        });

        // Adicionar a porcentagem ao objeto da empresa
        foreach ($companies as $company) {
            $companyTotalSpending = $company->expenses->sum('amount');
            $company->total_spending = $companyTotalSpending;
            $company->spending_percentage = $totalSpending > 0 ? ($companyTotalSpending / $totalSpending) * 100 : 0;
        }        

        return view('static-pages.dashboards.default', compact('user', 'totalSpending', 'allExpenses', 'recentExpenses', 'companies'));

    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
