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

        Category::create($request->all());

        return redirect()->route('dashboard.categorysuppliers.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category_Supplier $category_Supplier): Response
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category_Supplier $category_Supplier): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category_Supplier $category_Supplier): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category_Supplier $category_Supplier): RedirectResponse
    {
        //
    }
}
