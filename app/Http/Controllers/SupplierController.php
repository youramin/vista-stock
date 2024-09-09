<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\CategorySupplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()-> view ('dashboard.suppliers.index', [
            'suppliers'=>Supplier::with('categorysupplier')->get(),
            'title' => 'Daftar supplier'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $categorysuppliers = CategorySupplier::all();
        return response()-> view ('dashboard.suppliers.create', [
            'title' => 'Tambah Supplier',
            'categorysuppliers' => $categorysuppliers,
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
            'category_supplier_id' => 'required|exists:category_suppliers,id',

        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')
                         ->with('success', 'suplier berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier): Response
    {
        return response()->view('dashboard.suppliers.show', [
            'supplier' => $supplier,
            'title' => 'Detail Supplier'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier): Response
    {
        $categorysuppliers = CategorySupplier::all();
        return response()->view('dashboard.suppliers.edit', [
            'supplier' => $supplier,
            'categorysupplier' => $categorysuppliers,
            'title' => 'Edit Barang',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|max:225',
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
            'category_supplier_id' => 'required|exists:category_suppliers,id',
        ]);

        $supplier->update($request->all());

        return redirect()->route('supplier.index')
                         ->with('success', 'Supplier berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier): RedirectResponse
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier berhasil dihapus.');
    }
}
