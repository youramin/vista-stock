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
use \stdClass;

class PurchaseController extends Controller
{
    public function index(): Response
    {

        return response()-> view ('dashboard.purchases.index', [
            'purchases'=>Purchase::with('category', 'supplier', 'warehouse', 'user')->get(),
            'products' => Product::all(),
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
        $index = 0;
        $dataProducts = [];
        foreach ($request->products as $index=>$product){
            $dataProduct = new stdClass();
            $dataProduct->id = $product;
            $dataProduct->quantity = $request->quantities[$index];
            $dataProduct->unit_price = $request->unit_prices[$index];
            $dataProduct->total_price = $request->total_prices[$index];
            $dataProduct->category_id = $request->categories[$index];
            array_push($dataProducts, $dataProduct);
            $index++;
        };
        
        $request->request->add(['user_id' => auth()->user()->id]);
        $validateData = $request->validate([
            'purchase_date' => 'required',
            'purchase_number' => 'required',
            'supplier_id' => 'required',
            'warehouse_id' => 'required',
            'user_id' => 'required',
        ]);

        $validateData['products'] = json_encode($dataProducts);
        // dd($validateData);
        Purchase::create($validateData);


        return redirect()->route('purchases.index')
                        ->with('success', 'Data pembelian berhasil disimpan.');
    }


    public function show(Purchase $purchase)
    {
        // $purchase->load('supplier', 'warehouse', 'products.category', 'user');
        $suppliers = Supplier::with('purchases')->get();
        $warehouses = Warehouse::with('purchases')->get();
        return view('dashboard.purchases.show', [
            'purchase' => $purchase,
            'products' => Product::all(),
            'categories' => Category::all(),
            'title' => 'Detail Pembelian',
            compact('suppliers', 'warehouses')
        ]);
    }

    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        $products = Product::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();

        /* $purchase->products = json_decode($purchase->products, true); */

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
        $dataProducts = [];
        foreach ($request->products as $index => $productId){
            $dataProduct = new \stdClass();
            $dataProduct->id = $productId;
            $dataProduct->quantity = $request->quantities[$index];
            $dataProduct->unit_price = $request->unit_prices[$index];
            $dataProduct->total_price = $request->total_prices[$index] * $request->unit_prices[$index];
            $dataProduct->category_id = $request->categories[$index];
            $dataProducts[] = $dataProduct;
        };
        
        $validateData = $request->validate([
            'purchase_date' => 'required',
            'purchase_number' => 'required',
            'supplier_id' => 'required',
            'warehouse_id' => 'required',
            'user_id' => 'required',
        ]);

        $validateData['products'] = json_encode($dataProducts);
        $purchase->update($validateData);


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

