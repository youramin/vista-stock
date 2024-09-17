@extends('dashboard.layouts.main')

@section('container')
    <div class="flex justify-center">
        <div class="mt-16 z-0 mb-8">
            <div class="flex p-1 w-full">
                @include('dashboard.layouts.title')
                <div class="col text-end">
                    <a href="{{ route('purchases.index') }}" class="btn-danger index-link">
                        <svg class="fill-current w-5" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                        stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="mx-1 hidden sm:flex">Kembali</span>
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Detail Nota Pembelian
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nomor Nota: {{ $purchase->purchase_number }}</h5>
                    <p class="card-text"><strong>Tanggal Pembelian:</strong> {{ $purchase->purchase_date->format('d-m-Y') }}</p>
                    <p class="card-text"><strong>Supplier:</strong> {{ $purchase->supplier->name ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Gudang:</strong> {{ $purchase->warehouse->name ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Pengguna:</strong> {{ $purchase->user->name ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $purchase->description ?? 'N/A' }}</p>
        
                    <h4>Detail Produk:</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Kuantitas</th>
                                <th>Harga Satuan</th>
                                <th>Harga Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase->products as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ number_format($product->pivot->unit_price, 2, ',', '.') }}</td>
                                <td>{{ number_format($product->pivot->total_price, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    

@endsection
