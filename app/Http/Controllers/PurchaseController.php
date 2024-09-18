<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class PurchaseController extends Controller
{
    public function index(): Response
    {

        return response()-> view ('dashboard.purchases.index', [
            'purchases'=>Purchase::with('products', 'category', 'supplier', 'warehouse', 'user')->get(),
            'title' => 'List Pembelian'
        ]);

    }


    public function create(): Response
    {
        $products = Product::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();

        $latestPurchase = Purchase::latest('created_at')->first();
        $nextId = $latestPurchase ? $latestPurchase->id + 1 : 1;
        $currentYear = date('Y');
        $currentMonth = date('m');
        $purchaseNumber = 'DB/VM/' . $currentMonth . '/' . $currentYear . '/' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        return response()-> view ('dashboard.purchases.create', [
            'title' => 'Buat data pembelian',
            'products' => $products,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'warehouses' => $warehouses,
            'purchaseNumber' => $purchaseNumber,
        ]);
    }

    
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'purchase_date' => 'required|date',
            'purchase_number' => 'required|string',
            'supplier_id' => 'required|exists:suppliers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'categories' => 'required|array',
            'categories.*' => 'required|exists:categories,id',
            'products' => 'required|array',
            'products.*' => 'required|exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
            'unit_prices' => 'required|array',
            'unit_prices.*' => 'required|numeric|min:0',
            'total_prices' => 'required|array',
            'total_prices.*' => 'required|numeric|min:0',
        ]);

        
        foreach ($request->products as $index => $productId) {
            Purchase::create([
                'purchase_date' => $request->purchase_date,
                'purchase_number' => $request->purchase_number,
                'supplier_id' => $request->supplier_id,
                'warehouses_id' => $request->warehouse_id,
                'category_id' => $request->categories[$index],
                'product_id' => $productId,
                'quantity' => $request->quantities[$index],
                'unit_price' => $request->unit_prices[$index],
                'total_price' => $request->total_prices[$index],
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect()->route('purchases.index')
                        ->with('success', 'Data pembelian berhasil disimpan.');
    }


    public function show(Purchase $purchase)
    {
       
        

        return view('dashboard.purchases.show', [
            'purchase' => $purchase->load('supplier', 'warehouse', 'products.category'),
            'title' => 'Detail Pembelian'
        ]);
    }

    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        $products = Product::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        return response()-> view ('dashboard.purchases.edit', [
            'title' => 'Edit data pembelian',
            'purchase' => $purchase,
            'products' => $products,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'warehouses' => $warehouses,
        ]);
    }

    
    public function update(Request $request, Purchase $purchase): RedirectResponse
    {
        $request->validate([
            'purchase_date' => 'required|date',
            'purchase_number' => 'required|string',
            'supplier_id' => 'required|exists:suppliers,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'categories' => 'required|array',
            'categories.*' => 'required|exists:categories,id',
            'products' => 'required|array',
            'products.*' => 'required|exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
            'unit_prices' => 'required|array',
            'unit_prices.*' => 'required|numeric|min:0',
            'total_prices' => 'required|array',
            'total_prices.*' => 'required|numeric|min:0',
        ]);

        $purchase->details()->delete();

        foreach ($request->products as $index => $productId) {
            Purchase::create([
                'purchase_date' => $request->purchase_date,
                'purchase_number' => $request->purchase_number,
                'supplier_id' => $request->supplier_id,
                'warehouses_id' => $request->warehouse_id,
                'category_id' => $request->categories[$index],
                'product_id' => $productId,
                'quantity' => $request->quantities[$index],
                'unit_price' => $request->unit_prices[$index],
                'total_price' => $request->total_prices[$index],
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect()->route('purchases.index')
                         ->with('success', 'Data pembelian berhasil diperbarui.');
    }


    public function destroy(Purchase $purchase): RedirectResponse
    {
        $purchase->delete();

        return redirect()->route('purchases.index')
                         ->with('success', 'Data pembelian berhasil dihapus.');
    }

    
}

