<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()-> view ('dashboard.products.index', [
            'products'=>Product::with('category')->get(),
            'title' => 'Daftar Barang'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $categories = Category::all();
        return response()-> view ('dashboard.products.create', [
            'title' => 'Tambah Barang',
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|max:225',
            'name' => 'required|string|max:225',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',

        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): Response
    {
        return response()->view('dashboard.products.show', [
            'product' => $product,
            'title' => 'Detail Barang'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Response
    {
        $categories = Category::all();
        return response()->view('dashboard.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'title' => 'Edit Barang',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|max:225',
            'name' => 'required|string|max:225',
            'description' => 'nullable|json',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}
