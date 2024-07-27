<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Expense;

class KanbanController extends Controller
{
    public function getCalendar() {
        $expenses = Expense::with('company')->get(); // Adjust as needed
        return response()->json($expenses);
    }

    public function show($companyId)
    {
        $company = Company::findOrFail($companyId);
        $kanbanData = $company->kanbanBoards; // Supondo que você tenha um relacionamento para os boards

        return response()->json($kanbanData);
    }
}
