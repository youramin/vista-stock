<?php

namespace App\Http\Controllers;

use App\Models\Category_Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategorySupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()-> view ('dashboard.categorysuppliers.index', [
            'categorysuppliers'=>Category_Supplier::all(),
            'title' => 'Daftar Katagori Supplier'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()-> view ('dashboard.categorysuppliers.create', [
            'title' => 'Tambah Kategori Supplier'
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
            'description' => 'nullable|string',
        ]);

        Category_Supplier::create($request->all());

        return redirect()->route('categorysuppliers.index')
                         ->with('success', 'Kategori supplier berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category_Supplier $category_Supplier): Response
    {
        return response()->view('dashboard.categorysuppliers.show', [
            'category_supplier' => $category_Supplier,
            'title' => 'Detail Kategori supplier'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category_Supplier $category_Supplier): Response
    {
        return response()->view('dashboard.categorysuppliers.edit', [
            'category_supplier' => $category_Supplier,
            'title' => 'Edit Kategori supplier'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category_Supplier $category_Supplier): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|max:225',
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
        ]);

        $category_Supplier->update($request->all());

        return redirect()->route('categorysupplier.index')
                         ->with('success', 'Kategori supplier berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category_Supplier $category_Supplier): RedirectResponse
    {
        $category_Supplier->delete();

        return redirect()->route('categorysuppliers.index')
                         ->with('success', 'Kategori supplier berhasil dihapus.');
    }
}
