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
        $selectedCategory = request('category', '');

        return view('products.productList', [
            "products" => Product::latest()->filter(request(['search', 'category']))->paginate(10)->withQueryString(),
            "title" => "Product List",
            "active" => "product",
            "selectedCategory" => $selectedCategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.addProduct', [
            "title" => "Add New Product",
            "active" => "product"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:products|max:255',
            'description' => 'required|max:255',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0', // 'regex:/^\d+(\.\d{1,2})?$/'
            'barcode' => 'required|unique:products|max:255',
            'category' => 'required',
            'series' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::create($validatedData);

        return redirect('/products')->with('success', 'New product has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.detailsProduct', [
            "title" => "Details Product",
            "active" => "product",
            "product" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
