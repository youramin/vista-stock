@extends('dashboard.layouts.main')

@section('container')
<div class="flex justify-center mt-16">
    <div class="w-full max-w-6xl p-8">
        <form action="{{ route('purchases.store') }}" method="POST">
            @csrf
            <div class="flex space-x-2">
                @include('dashboard.layouts.title')
                <button type="submit" class="btn-primary">Simpan</button>
                <button type="button" class="btn-danger" onclick="window.history.back();">
                    Batal
                </button>
            </div>
            <div class="w-full max-w-6xl p-8 bg-white shadow-md rounded-lg mt-5">
                <!-- Header Section -->
                <div class="mb-6">
                    <div class="flex flex-col items-start">
                        <div class="flex items-center mb-2">
                            <div class="w-1/4">
                                <img src="{{ asset('img/logo-Vista-Media.png') }}" alt="Logo" class="w-20 h-20 rounded-full">
                            </div>
                            <div class="w-3/4 pl-4">
                                <p class="text-lg font-semibold">Data Pembelian Barang</p>
                                <p class="text-sm">PT. Vista Media </p>
                            </div>
                        </div>
                        <hr class="w-full border-t-2 border-gray-300">
                    </div>
                </div>
    
    
    
                <!-- No. Nota and Tanggal Pembelian -->
                <div class="flex mb-4">
                    <div class="w-1/2 mr-4">
                        <label for="purchase_number" class="block text-gray-700">No :</label>
                        <input type="text" name="purchase_number" id="purchase_number" class="w-full mt-1 p-2 border rounded" value="{{ $purchaseNumber }}" readonly>
                    </div>                                      
                    <div class="w-1/2">
                        <label for="purchase_date" class="block text-gray-700">Tgl. Pembelian:</label>
                        <input type="date" name="purchase_date" id="purchase_date" class="w-full mt-1 p-2 border rounded" required>
                    </div>
                </div>
    
                <!-- Product Table -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Detail Produk</h3>
                    <table class="table-auto w-full text-left mb-4">
                        <thead>
                            <tr class="text-gray-700 bg-gray-200">
                                <th class="px-4 py-2">Kategori</th>
                                <th class="px-4 py-2">Nama Produk</th>
                                <th class="px-4 py-2">Jumlah Satuan</th>
                                <th class="px-4 py-2">Harga Satuan</th>
                                <th class="px-4 py-2">Total Harga</th>
                            </tr>
                        </thead>
                        <p class="text-red-500 text-xs mb-2">Masukkan nominal angka tanpa titik atau simbol lain</p>
                        <tbody id="product-table">
                            <tr>
                                <td class="px-4 py-2">
                                    <select name="category_id" class="w-full p-2 border rounded category-select" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="px-4 py-2">
                                    <select name="products[]" class="w-full p-2 border rounded product-select" disabled required>
                                        <option value="">Pilih Produk</option>
                                    </select>
                                </td>                            
                                <td class="px-4 py-2">
                                    <input type="number" name="quantities[]" class="w-full p-2 border rounded" placeholder="Jumlah" required>
                                </td>
                                <td class="px-4 py-2">
                                    <input type="number" name="unit_prices[]" class="w-full p-2 border rounded" placeholder="Harga Satuan" required>
                                </td>
                                <td class="px-4 py-2">
                                    <input type="number" name="total_prices[]" class="w-full p-2 border rounded" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" id="add-row" class="btn-primary  text-white w-full py-2 rounded flex items-center justify-center">
                        <svg class="fill-current w-5 inline-block mr-2" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m21 3.998c0-.478-.379-1-1-1h-16c-.62 0-1 .519-1 1v16c0 .621.52 1 1 1h16c.478 0 1-.379 1-1zm-16.5.5h15v15h-15zm6.75 6.752h-3.5c-.414 0-.75.336-.75.75s.336.75.75.75h3.5v3.5c0 .414.336.75.75.75s.75-.336.75-.75v-3.5h3.5c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-3.5v-3.5c0-.414-.336-.75-.75-.75s-.75.336-.75.75z" fill-rule="nonzero"/>
                        </svg>Tambah Baris
                    </button>
                </div>
    
                <!-- Supplier and Warehouse -->
                <div class="flex mb-4">
                    <div class="w-1/2 mr-4">
                        <label for="supplier" class="block text-gray-700">Supplier:</label>
                        <select name="supplier_id" id="supplier" class="w-full mt-1 p-2 border rounded">
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="warehouse" class="block text-gray-700">Gudang:</label>
                        <select name="warehouse_id" id="warehouse" class="w-full mt-1 p-2 border rounded">
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
           
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add new row to the table
        document.getElementById('add-row').addEventListener('click', function () {
            let table = document.getElementById('product-table');
            let row = table.insertRow();
            row.innerHTML = `
                <td class="px-4 py-2">
                    <select name="categories[]" class="w-full p-2 border rounded category-select" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="px-4 py-2">
                    <select name="products[]" class="w-full p-2 border rounded product-select" disabled required>
                        <option value="">Pilih Produk</option>
                    </select>
                </td>                            
                <td class="px-4 py-2">
                    <input type="number" name="quantities[]" class="w-full p-2 border rounded" placeholder="Jumlah" required>
                </td>
                <td class="px-4 py-2">
                    <input type="number" name="unit_prices[]" class="w-full p-2 border rounded" placeholder="Harga Satuan" required>
                </td>
                <td class="px-4 py-2">
                    <input type="number" name="total_prices[]" class="w-full p-2 border rounded" readonly>
                </td>
                <td class="px-4 py-2">
                    <button type="button" class="remove-row btn-danger text-white w-full py-2 rounded flex items-center justify-center">
                        Hapus
                    </button>
                </td>
            `;
        });

        // Handle input events for price calculation
        document.addEventListener('input', function (event) {
            if (event.target.name === 'quantities[]' || event.target.name === 'unit_prices[]') {
                let row = event.target.closest('tr');
                let quantity = row.querySelector('input[name="quantities[]"]').value;
                let unitPrice = row.querySelector('input[name="unit_prices[]"]').value;
                let totalPrice = row.querySelector('input[name="total_prices[]"]');
                totalPrice.value = quantity * unitPrice;
            }
        });

        // Handle change events for category selection
        document.addEventListener('change', function (event) {
            if (event.target.classList.contains('category-select')) {
                let categoryId = event.target.value;
                let productSelect = event.target.closest('tr').querySelector('.product-select');
                
                // Clear existing options
                productSelect.innerHTML = '<option value="">Pilih Produk</option>';

                if (categoryId) {
                    fetch(`/products/${categoryId}`)
                        .then(response => response.json())
                        .then(products => {
                            products.forEach(product => {
                                let option = document.createElement('option');
                                option.value = product.id;
                                option.textContent = product.name;
                                productSelect.appendChild(option);
                            });
                            productSelect.disabled = false; // Enable the product select
                        })
                        .catch(error => {
                            console.error('Error fetching products:', error);
                        });
                } else {
                    productSelect.disabled = true; // Disable the product select if no category
                }
            }
        });

        // Remove row from the table
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-row')) {
                let row = event.target.closest('tr');
                row.remove();
            }
        });
    });
</script>

@endsection
