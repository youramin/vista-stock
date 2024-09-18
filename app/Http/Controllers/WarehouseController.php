<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()-> view ('dashboard.warehouses.index', [
            'warehouses'=>Warehouse::all(),
            'title' => 'Daftar Gudang'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()-> view ('dashboard.warehouses.create', [
            'title' => 'Tambah Gudang'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Set code --> start
        $dataCategory = Warehouse::all()->last();
        if($dataCategory){
            $lastCode = (int)substr($dataCategory->code,4,3);
            $newCode = $lastCode + 1;
        } else {
            $newCode = 1;
        }
        

        if($newCode < 10 ){
            $code = 'GDA-00'.$newCode;
        } else {
            $code = 'GDA-0'.$newCode;
        }
        // Set code --> end

        $request->request->add(['code' => $code]);
        
        $request->validate([
            'code' => 'required|unique:warehouses',
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
        ]);

        Warehouse::create($request->all());

        return redirect()->route('warehouses.index')
                         ->with('success', 'Data gudang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse): Response
    {
        return response()->view('dashboard.warehouses.show', [
            'warehouse' => $warehouse,
            'title' => 'Detail Gudang'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse): Response
    {
        return response()->view('dashboard.warehouses.edit', [
            'warehouse' => $warehouse,
            'title' => 'Edit Data Gudang'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse): RedirectResponse
    {
        $request->validate([
            'code' => 'required|string|max:225',
            'name' => 'required|string|max:225',
            'description' => 'nullable|string',
        ]);

        $warehouse->update($request->all());

        return redirect()->route('warehouses.index')
                         ->with('success', 'Data gudang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse): RedirectResponse
    {
        $warehouse->delete();

        return redirect()->route('warehouses.index')
                         ->with('success', 'Data gudang berhasil dihapus.');
    }
}
