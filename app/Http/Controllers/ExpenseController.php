<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Company;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('company')->get();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('expenses.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'amount' => 'required|numeric',
            'description' => 'required',
            'date' => 'required|date'
        ]);

        Expense::create($request->all());
        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        $companies = Company::all();
        return view('expenses.edit', compact('expense', 'companies'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'amount' => 'required|numeric',
            'description' => 'required',
            'date' => 'required|date'
        ]);

        $expense->update($request->all());
        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
    public function generateInvoice($id)
    {
        $expense = Expense::with('company')->findOrFail($id);

        $pdf = Pdf::loadView('expenses.invoices', compact('expense'));
        return $pdf->download('invoice-' . $expense->id . '.pdf');
    }
    
}
