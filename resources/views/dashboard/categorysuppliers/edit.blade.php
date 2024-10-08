@extends('dashboard.layouts.main')

@section('container')
<div class="flex justify-center mt-16">
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
            <form action="/dashboard/categorysuppliers/{{ $categorysupplier->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-teal-700 font-semibold mb-2">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-teal-300 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name', $categorysupplier->name) }}" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="code" class="block text-teal-700 font-semibold mb-2">Kode Kategori</label>
                    <input type="text" name="code" id="code" class="w-full p-2 border border-teal-300 rounded-lg @error('code') border-red-500 @enderror" value="{{ old('code', $categorysupplier->code) }}" required>
                    @error('code')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="description" class="block text-teal-700 font-semibold mb-2">Deskripsi</label>
                    <textarea name="description" id="description" class="w-full p-2 border border-teal-300 rounded-lg @error('description') border-red-500 @enderror" rows="4">{{ old('description', $categorysupplier->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="flex justify-end">
                    <a href="/dashboard/categorysuppliers" class="btn-danger mr-4">Batal</a>
                    <button type="submit" class="btn-primary">Update</button>
                </div>
            </form>
        </div>  
    </div>
</div>
@endsection

