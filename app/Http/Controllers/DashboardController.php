<?php

namespace App\Http\Controllers;

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
    public function featuresView()
    {
        $userId = Auth::id();
        $expenses = Expenses::where('user_id', $userId)->get();
        return Inertia::render('Admin/Features', [
            'expenses' => $expenses,
        ]);
    }
}
