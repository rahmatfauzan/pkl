<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        $categories=categories::all();
        return view('category', compact('categories'));
    }

    public function tambah(Request $request)
    {
        categories::create($request->all());
        return redirect('/category');
    }

    public function hapus(Request $request)
    {
        $categories=categories::findorFail($request->id);
        $categories->delete();
        return redirect('/category');
    }

    public function edit(Request $request)
    {
        $categories=categories::findorFail($request->id);
        $request->validate([
            'name' => 'required|string',
        ]);
        $categories->name=$request->name;
        $categories->save();
        return redirect('/category');
    }
}
