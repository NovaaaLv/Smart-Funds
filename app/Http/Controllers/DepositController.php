<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'income' => 'required|numeric|min:1',
            'date' => 'required|date'
        ]);

        $validatedData = array_merge($validatedData, ['user_id' => Auth::id()]);

        Deposit::create($validatedData);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'income' => 'required|numeric',
            'date' => 'required|date'
        ]);

        $deposit = Deposit::findOrFail($id);

        if ($deposit->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengupdate item ini.');
        }

        $deposit->update($validatedData);

        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }
}
