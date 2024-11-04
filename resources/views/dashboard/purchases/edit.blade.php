@extends('dashboard.layouts.main')

@section('container')
<div class="xl:flex xl:justify-center">
    <div class="mt-16 z-0 mb-8">
        <div class="flex p-1 w-full">
            @include('dashboard.layouts.title')
            <div class="border-b">
                <a href="{{ route('purchases.index') }}" class="btn-danger index-link">
                    <svg class="fill-current w-5" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                        stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="mx-1 hidden sm:flex">Kembali</span>
                </a>
            </div>
        </div>

        <!-- Edit Purchase Form -->
        <div class="w-[1200px] mt-5 bg-white shadow-md rounded-lg p-5">
            <h2 class="text-2xl font-semibold mb-4">Edit Data Pembelian</h2>
            
            <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Tanggal Pembelian -->
                <div class="mb-4">
                    <label for="purchase_date" class="block text-gray-700">Tanggal Pembelian</label>
                    <input type="date" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', $purchase->purchase_date->format('Y-m-d')) }}" class="w-full mt-1 p-2 border rounded @error('purchase_date') border-red-500 @enderror" required>
                    @error('purchase_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor Pembelian -->
                <div class="mb-4">
                    <label for="purchase_number" class="block text-gray-700">Nomor Pembelian</label>
                    <input type="text" name="purchase_number" id="purchase_number" value="{{ old('purchase_number', $purchase->purchase_number) }}" class="w-full mt-1 p-2 border rounded @error('purchase_number') border-red-500 @enderror" required>
                    @error('purchase_number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Supplier -->
                <div class="mb-4">
                    <label for="supplier_id" class="block text-gray-700">Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="w-full mt-1 p-2 border rounded @error('supplier_id') border-red-500 @enderror" required>
                        <option value="">Pilih Penyedia</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id', $purchase->supplier_id) == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gudang -->
                <div class="mb-4">
                    <label for="warehouse_id" class="block text-gray-700">Gudang</label>
                    <select name="warehouse_id" id="warehouse_id" class="w-full mt-1 p-2 border rounded @error('warehouse_id') border-red-500 @enderror" required>
                        <option value="">Pilih Gudang</option>
                        @foreach ($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ old('warehouse_id', $purchase->warehouse_id) == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                    @error('warehouse_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Produk -->
                <div class="w-full max-w-6xl p-8 bg-white shadow-md rounded-lg mt-5">
                    <h3 class="text-lg font-semibold mb-2">Detail Produk</h3>
                    <table class="table-auto w-full text-left mb-4">
                        <thead>
                            <tr class="text-gray-700 bg-gray-200">
                                <th class="px-4 py-2">Kategori</th>
                                <th class="px-4 py-2">Nama Produk</th>
                                <th class="px-4 py-2">Jumlah Satuan</th>
                                <th class="px-4 py-2">Harga Satuan</th>
                                <th class="px-4 py-2">Total Harga</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="product-table">
                            @php
                                $dataProducts = json_decode($purchase->products);
                            @endphp
                            @foreach($dataProducts as $index => $dataProduct)
                                <tr class="product-row">
                                    <td class="px-4 py-2">
                                        <select name="category_id[]" class="w-full p-2 border rounded category-select" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id.' . $index, $purchase->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-4 py-2">
                                        <select name="products[]" class="w-full p-2 border rounded product-select" required>
                                            <option value="">Pilih Produk</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}" {{ old('products.' . $index, $dataProduct->id) == $product->id ? 'selected' : '' }}>
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-4 py-2">
                                        <input type="number" name="quantities[]" class="w-full p-2 border rounded" value="{{ old('quantities.' . $index, $dataProduct->quantity) }}" required>
                                    </td>
                                    <td class="px-4 py-2">
                                        <input type="number" name="unit_prices[]" class="w-full p-2 border rounded" value="{{ old('unit_prices.' . $index, $dataProduct->unit_price) }}" required>
                                    </td>
                                    <td class="px-4 py-2">
                                        <input type="number" name="total_prices[]" class="w-full p-2 border rounded" value="{{ old('total_prices.' . $index, $dataProduct->total_price) }}" readonly>
                                    </td>
                                    <td class="px-4 py-2">
                                        <button type="button" class="remove-row bg-red-500 text-white p-2 rounded">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" id="add-row" class="bg-blue-500 text-white p-2 rounded">Tambah Baris</button>
                </div>                
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productTable = document.getElementById('product-table');

        function calculateTotalPrice(row) {
            const quantityInput = row.querySelector('.quantity-input');
            const unitPriceInput = row.querySelector('.unit-price-input');
            const totalPriceInput = row.querySelector('.total-price-input');
            const totalPrice = (parseFloat(quantityInput.value) || 0) * (parseFloat(unitPriceInput.value) || 0);
            totalPriceInput.value = totalPrice.toFixed(2);
        }

        document.getElementById('add-row').addEventListener('click', function () {
            const newRow = productTable.querySelector('.product-row').cloneNode(true);
            newRow.querySelectorAll('input').forEach(input => input.value = '');
            productTable.appendChild(newRow);
            newRow.querySelector('.remove-row').addEventListener('click', function () {
                    newRow.remove();
            });
        });

        productTable.querySelectorAll('.remove-row').forEach(button => {
            button.addEventListener('click', function () {
                if (productTable.querySelectorAll('.product-row').length > 1) {
                    button.closest('.product-row').remove();
                } else {
                    alert('Minimal satu baris produk harus ada.');
                }
            });
        });
    });
</script>
@endsection
@endsection

