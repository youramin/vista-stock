@extends('dashboard.layouts.main')

@section('container')
<div class="flex justify-center mt-16">
    <div class="w-full max-w-6xl p-8 bg-white shadow-md rounded-lg">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col items-start">
                <div class="flex items-center mb-2">
                    <div class="w-1/4">
                        <img src="{{ asset('img/logo-Vista-Media.png') }}" alt="Logo" class="w-20 h-20 rounded-full">
                    </div>
                    <div class="w-3/4 pl-4">
                        <p class="text-lg font-semibold">Detail Pembelian Barang</p>
                        <p class="text-sm">PT. Vista Media </p>
                    </div>
                </div>
            </div>
            <hr class="w-full border-t-2 border-gray-300">
        </div>

        <!-- Purchase Information -->
        <div class="mb-4">
            <div class="flex mb-4">
                <div class="w-1/2">
                    <label for="purchase_number" class="block text-gray-700">No :</label>
                    <p class="mt-1 p-2 border rounded">{{ $purchase->purchase_number }}</p>
                </div>
                <div class="w-1/2">
                    <label for="purchase_date" class="block text-gray-700">Tgl. Pembelian:</label>
                    <p class="mt-1 p-2 border rounded">{{ $purchase->purchase_date->format('d-m-Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Supplier & Warehouse Information -->
        <div class="mb-4">
            <div class="flex mb-4">
                <div class="w-1/2">
                    <label class="block text-gray-700">Supplier:</label>
                    <p class="mt-1 p-2 border rounded">{{ $purchase->supplier->name }}</p>
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700">Gudang:</label>
                    <p class="mt-1 p-2 border rounded">{{ optional($purchase->warehouse)->name }}</p>
                </div>
            </div>
        </div>

        <!-- Product Details Table -->
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
                <tbody>
                    @if ($purchase->products->isEmpty())
                        <p>Tidak ada produk terkait dengan pembelian ini.</p>
                    @else
                        @foreach ($purchase->products as $product)
                            <tr>
                                <td>{{ optional($product->category)->name ?? 'Tidak ada kategori' }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->unit_price }}</td>
                                <td>{{ $product->total_price }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="flex space-x-2">
            <button type="button" class="btn-danger" onclick="window.history.back();">
                Kembali
            </button>
        </div>
    </div>
</div>
@endsection





