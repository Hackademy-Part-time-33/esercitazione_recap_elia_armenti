<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('products.create');
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(StoreProductRequest $request)
    {
        $path_image = '';
        if ($request->hasFile('image')) {
            $orignal_name = $request->file('image')->getClientOriginalName(); //Prendo il nome del file
            $path_image = $request->file('image')->storeAs('public/images',  $orignal_name);
            // salvo il file in public/images e lo rinomino con original_name
        }

        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'image' => 'required',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' =>  $request->price,
            'image' => $path_image,
            'user_id' => auth()->user()->id 
        ]);

        $product->categories()->attach($request->products);
        return redirect()->route('products.index');

    }
    
    /**
    * Display the specified resource.
    */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric', // Regola di validazione per il campo 'price'
            'description' => 'required',
        ]);
    }
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
        ->with('success', 'Product deleted successfully.');
    }
}
