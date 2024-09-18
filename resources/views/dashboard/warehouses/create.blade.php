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
            <form action="/dashboard/warehouses" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-teal-700 font-semibold mb-2">Nama Gudang</label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-teal-300 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                    @error('name')
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
                    <a href="/dashboard/warehouses" class="btn-danger mr-4">Batal</a>
                    <button type="submit" class="btn-primary">Simpan</button>
                </div>
            </form>
        </div>   
    </div>
</div>
@endsection