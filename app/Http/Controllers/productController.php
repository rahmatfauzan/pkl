<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function dashboard(){
        $products=products::all();
        $categories=categories::all();
        return view('/dashboard', compact('products', 'categories'));
    }

    public function edit(Request $request){
        $products=products::findorFail($request->id);
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);

        $products->name=$request->name;
        $products->description=$request->description;
        $products->price=$request->price;
        $products->category_id=$request->category_id;
        $products->quantity=$request->quantity;
        $products->save();

        return redirect('/dashboard');
    }

    public function hapus(Request $request){
        $products=products::findorFail($request->id);
        $products->delete();
        return redirect('/dashboard');
    }

    public function tambah(Request $request){
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);
        $products=products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id
        ]);
        return redirect('/dashboard');
    }
}

