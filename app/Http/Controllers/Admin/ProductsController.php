<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin/products/index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name');

        return view('admin/products/create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|string|max:191',
            'body' => 'required|string',
            'variety' => 'required|exists:varieties,id',
            'price' => 'required|numeric',
            'price_kilo' => 'required|numeric',
            'picture' => 'nullable|file|mimes:jpeg,png|size:2048'
        ]);

        if ($request->has('picture')) {
            $picture = $request->file('picture')->store('products');

            return $picture;
        }

        Product::create([
            'slug' => str_slug($request->input('title')),
            'title' => $request->input('title'),
            'price' => $request->input('price')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin/products/show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin/products/edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Product $product)
    {
        // $request->validate([
        //     'title' => 'required|max:100',
        //     'body' => 'required|max:100',
        //     // 'picture' => 'required|string|max:255',
        
        // ]);
        $product->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            // 'picture' => $request->input('picture'),
           
        ]);

        return redirect()->route('admin.products.show', ['product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
