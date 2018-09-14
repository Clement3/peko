<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use App\PriceFilter;
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
        $filters = PriceFilter::all()->sortBy('name');

        return view('admin/products/create', [
            'categories' => $categories,
            'filters' => $filters
        ]);
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
            'filter' => 'required|exists:price_filters,id',
            'price' => 'required|numeric',
            'price_kilo' => 'required|numeric',
            'quantity' => 'required|numeric',
            'picture' => 'nullable|image'
        ]);

        if ($request->has('picture')) {
            $picture = $request->file('picture')->store('products', 'public');
        }

        Product::create([
            'slug' => str_slug($request->input('title')),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'price' => $request->input('price'),
            'price_kilo' => $request->input('price_kilo'),
            'picture' => isset($picture) ? $picture : null,
            'quantity' => $request->input('quantity'),
            'variety_id' => $request->input('variety'),
            'price_filter_id' => $request->input('filter')
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Vous avez bien rajouté le produit');
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
        $categories = Category::all()->sortBy('name');
        $filters = PriceFilter::all()->sortBy('name');

        return view('admin/products/edit', [
            'product' => $product,
            'categories' => $categories,
            'filters' => $filters
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
        $request->validate([
            'title' => 'bail|required|string|max:191',
            'body' => 'required|string',
            'variety' => 'required|exists:varieties,id',
            'filter' => 'required|exists:price_filters,id',
            'price' => 'required|numeric',
            'price_kilo' => 'required|numeric',
            'quantity' => 'required|numeric',
            'picture' => 'nullable|image'
        ]);

        if ($request->has('picture')) {
            $picture = $request->file('picture')->store('products', 'public');
        }

        $product->update([
            'slug' => str_slug($request->input('title')),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'price' => $request->input('price'),
            'price_kilo' => $request->input('price_kilo'),
            'picture' => isset($picture) ? $picture : null,
            'quantity' => $request->input('quantity'),
            'variety_id' => $request->input('variety'),
            'price_filter_id' => $request->input('filter')
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Vous avez bien éditer le produit');
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
