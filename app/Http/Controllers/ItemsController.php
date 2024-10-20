<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'item_name' => 'required|max:225',
            'amount' => 'required|numeric|min:1',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
            'date' => 'required|date'
        ]);

        $validatedData = array_merge($validatedData, ['user_id' => Auth::id()]);


        Expenses::create($validatedData);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }
}
