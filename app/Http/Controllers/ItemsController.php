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
            'date' => 'required'
        ]);

        $validatedData['user_id'] = Auth::id();
        Expenses::create($validatedData);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }



    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|max:225',
            'amount' => 'required|numeric|min:1',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
            'date' => 'required|date'
        ]);

        $expense = Expenses::findOrFail($id);

        if ($expense->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengupdate item ini.');
        }

        $expense->update($validatedData);

        return redirect()->route('admin.expenses')->with('success', 'Data berhasil diupdate!');
    }


    public function destroy($id)
    {
        $expense = Expenses::findOrFail($id);

        if ($expense->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus item ini.');
        }

        $expense->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
