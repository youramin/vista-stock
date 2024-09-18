@extends('dashboard.layouts.main')

@section('container')

<div class="flex justify-center mt-16 ">
    <div class="w-full max-w-lg">
        @include('dashboard.layouts.title')
        
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-5">
            <form action="/dashboard/suppliers" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-teal-700 font-semibold mb-2">Nama Supplier</label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-teal-300 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category_supplier_id" class="block text-teal-700 font-semibold mb-2">Kategori supplier</label>
                    <select name="category_supplier_id" id="category_id" class="w-full p-2 border border-teal-300 rounded-lg @error('category_id') border-red-500 @enderror">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categorysuppliers as $categorysupplier)
                            <option value="{{ $categorysupplier->id }}" {{ old('category_supplier_id', $supplier->category_supplier_id ?? '') == $categorysupplier->id ? 'selected' : '' }}>{{ $categorysupplier->name }}</option>
                        @endforeach
                    </select>
                    @error('category_supplier_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="description" class="block text-teal-700 font-semibold mb-2">Deskripsi</label>
                    <textarea name="description" id="description" class="w-full p-2 border border-teal-300 rounded-lg @error('description') border-red-500 @enderror" rows="4">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="flex justify-end">
                    <a href="/dashboard/suppliers" class="btn-danger mr-4">Batal</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </div>
            </form>
        </div>   
    </div>
</div>
@endsection

