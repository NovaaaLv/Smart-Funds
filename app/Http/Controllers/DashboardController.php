<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function dashboardView()
    {
        return Inertia::render('Dashboard');
    }
    public function expensesView()
    {
        $userId = Auth::id();
        $expenses = Expenses::where('user_id', $userId)->get();
        return Inertia::render('Admin/Expenses', [
            'expenses' => $expenses,
        ]);
    }
    public function incomeView()
    {
        $userId = Auth::id();
        $expenses = Expenses::where('user_id', $userId)->get();
        $deposits = Deposit::where('user_id', $userId)->get();
        return Inertia::render('Admin/Income', [
            'deposits' => $deposits,
            'expenses' => $expenses,
        ]);
    }
}
