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
                <div id="products-container">
                    @php
                        $dataProducts = json_decode($purchase->products);
                    @endphp
                    @foreach ($dataProducts as $index => $dataProduct)
                        <div class="mb-4 product-row">
                            <!-- Kategori Produk -->
                            <label for="categories[{{ $index }}]" class="block text-gray-700">Kategori Produk {{ $index + 1 }}</label>
                            <select name="categories[{{ $index }}]" id="categories[{{ $index }}]" class="w-full mt-1 p-2 border rounded @error('categories.' . $index) border-red-500 @enderror" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('categories.' . $index, $dataProduct->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categories.' . $index)
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Produk -->
                            <label for="products[{{ $index }}]" class="block text-gray-700">Produk {{ $index + 1 }}</label>
                            <select name="products[{{ $index }}]" id="products[{{ $index }}]" class="w-full mt-1 p-2 border rounded @error('products.' . $index) border-red-500 @enderror" required>
                                <option value="">Pilih Produk</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ old('products.' . $index, $dataProduct->id) == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('products.' . $index)
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Kuantitas -->
                            <label for="quantities[{{ $index }}]" class="block text-gray-700">Kuantitas {{ $index + 1 }}</label>
                            <input type="number" name="quantities[{{ $index }}]" id="quantities[{{ $index }}]" value="{{ old('quantities.' . $index, $dataProduct->quantity) }}" class="w-full mt-1 p-2 border rounded @error('quantities.' . $index) border-red-500 @enderror" required>
                            @error('quantities.' . $index)
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Harga Satuan -->
                            <label for="unit_prices[{{ $index }}]" class="block text-gray-700">Harga Satuan {{ $index + 1 }}</label>
                            <input type="number" step="0.01" name="unit_prices[{{ $index }}]" id="unit_prices[{{ $index }}]" value="{{ old('unit_prices.' . $index, $dataProduct->unit_price) }}" class="w-full mt-1 p-2 border rounded @error('unit_prices.' . $index) border-red-500 @enderror" required>
                            @error('unit_prices.' . $index)
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Harga Total -->
                            <label for="total_prices[{{ $index }}]" class="block text-gray-700">Harga Total {{ $index + 1 }}</label>
                            <input type="number" step="0.01" name="total_prices[{{ $index }}]" id="total_prices[{{ $index }}]" value="{{ old('total_prices.' . $index, $dataProduct->total_price) }}" class="w-full mt-1 p-2 border rounded @error('total_prices.' . $index) border-red-500 @enderror" readonly>
                            @error('total_prices.' . $index)
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Hapus Baris -->
                            <button type="button" class="remove-row mt-2 bg-red-500 text-white p-2 rounded">Hapus Baris</button>
                        </div>
                    @endforeach
                </div>

                <!-- Tambah Produk Button -->
                <button type="button" id="add-product" class="bg-blue-500 text-white p-2 rounded">Tambah Produk</button>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="bg-green-500 text-white p-3 rounded-lg">Simpan Pembelian</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function calculateTotalPrice(index) {
            const quantity = document.querySelector(`#quantities\\[${index}\\]`).value;
            const unitPrice = document.querySelector(`#unit_prices\\[${index}\\]`).value;
            const totalPrice = quantity * unitPrice;
            document.querySelector(`#total_prices\\[${index}\\]`).value = totalPrice.toFixed(2);
        }

        document.querySelectorAll('[id^="quantities"], [id^="unit_prices"]').forEach(input => {
            input.addEventListener('input', function (e) {
                const index = e.target.id.match(/\d+/)[0];
                calculateTotalPrice(index);
            });
        });

        document.getElementById('add-product-row').addEventListener('click', function () {
            const index = document.querySelectorAll('.product-row').length;
            const container = document.getElementById('products-container');
            const rowHtml = `
                <div class="mb-4 product-row">
                    <label for="categories[${index}]" class="block text-gray-700">Kategori Produk ${index + 1}</label>
                    <select name="categories[${index}]" id="categories[${index}]" class="w-full mt-1 p-2 border rounded" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    
                    <label for="products[${index}]" class="block text-gray-700">Produk ${index + 1}</label>
                    <select name="products[${index}]" id="products[${index}]" class="w-full mt-1 p-2 border rounded" required>
                        <option value="">Pilih Produk</option>
                        @foreach ($products as $productOption)
                            <option value="{{ $productOption->id }}">{{ $productOption->name }}</option>
                        @endforeach
                    </select>

                    <label for="quantities[${index}]" class="block text-gray-700">Kuantitas ${index + 1}</label>
                    <input type="number" name="quantities[${index}]" id="quantities[${index}]" class="w-full mt-1 p-2 border rounded" required>
                    
                    <label for="unit_prices[${index}]" class="block text-gray-700">Harga Satuan ${index + 1}</label>
                    <input type="number" step="0.01" name="unit_prices[${index}]" id="unit_prices[${index}]" class="w-full mt-1 p-2 border rounded" required>
                    
                    <label for="total_prices[${index}]" class="block text-gray-700">Harga Total ${index + 1}</label>
                    <input type="number" step="0.01" name="total_prices[${index}]" id="total_prices[${index}]" class="w-full mt-1 p-2 border rounded" readonly>
                    
                    <button type="button" class="remove-row mt-2 bg-red-500 text-white p-2 rounded">Hapus Baris</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', rowHtml);

            document.querySelectorAll('[id^="quantities"], [id^="unit_prices"]').forEach(input => {
                input.addEventListener('input', function (e) {
                    const index = e.target.id.match(/\d+/)[0];
                    calculateTotalPrice(index);
                });
            });

            document.querySelectorAll('.remove-row').forEach(button => {
                button.addEventListener('click', function () {
                    this.parentElement.remove();
                });
            });
        });

        document.querySelectorAll('.remove-row').forEach(button => {
            button.addEventListener('click', function () {
                this.parentElement.remove();
            });
        });
    });
</script>
@endsection
@endsection

