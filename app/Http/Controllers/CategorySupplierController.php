<?php

namespace App\Http\Controllers;

use App\Models\CategorySupplier;
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
            'categorysuppliers'=>CategorySupplier::all(),
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

        CategorySupplier::create($request->all());

        return redirect()->route('categorysuppliers.index')
                         ->with('success', 'Kategori supplier berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategorySupplier $categorysupplier): Response
    {
        return response()->view('dashboard.categorysuppliers.show', [
            'categorysupplier' => $categorysupplier,
            'title' => 'Detail Kategori supplier'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategorySupplier $categorysupplier): Response
    {
        return response()->view('dashboard.categorysuppliers.edit', [
            'categorysupplier' => $categorysupplier,
            'title' => 'Edit Kategori supplier'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategorySupplier $categorysupplier): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|max:225',
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
        ]);

        $categorysupplier->update($request->all());

        return redirect()->route('categorysuppliers.index')
                         ->with('success', 'Kategori supplier berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategorySupplier $categorysupplier): RedirectResponse
    {
        $categorysupplier->delete();

        return redirect()->route('categorysuppliers.index')
                         ->with('success', 'Kategori supplier berhasil dihapus.');
    }
}
