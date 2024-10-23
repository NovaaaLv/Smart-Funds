<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    public function testView()
    {
        return Inertia::render('Admin/Settings');
    }

    public function testPost(Request $request)
    {

        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required',
            'alamat' => 'required'
        ]);

        if ($validated) {
            Test::create($validated);
        } else {
        }
    }
}
