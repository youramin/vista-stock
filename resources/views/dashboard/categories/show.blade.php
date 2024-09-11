@extends('dashboard.layouts.main')

@section('container')
<div class="flex justify-center">
    <div class="w-full max-w-lg mt-16">
        <div class="flex p-1 w-full">
            @include('dashboard.layouts.title')
            @canany(['isAdmin', 'isMedia', 'isMarketing'])
                <div class="border-b">
                    <a href="/dashboard/categories/{{ $category->id }}/edit" class="index-link btn-primary">
                        <svg class="fill-current w-5" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m11.25 6c.398 0 .75.352.75.75 0 .414-.336.75-.75.75-1.505 0-7.75 0-7.75 0v12h17v-8.749c0-.414.336-.75.75-.75s.75.336.75.75v9.249c0 .621-.522 1-1 1h-18c-.48 0-1-.379-1-1v-13c0-.481.38-1 1-1zm1.521 9.689 9.012-9.012c.133-.133.217-.329.217-.532 0-.179-.065-.363-.218-.515l-2.423-2.415c-.143-.143-.333-.215-.522-.215s-.378.072-.523.215l-9.027 8.996c-.442 1.371-1.158 3.586-1.264 3.952-.126.433.198.834.572.834.41 0 .696-.099 4.176-1.308zm-2.258-2.392 1.17 1.171c-.704.232-1.274.418-1.729.566zm.968-1.154 7.356-7.331 1.347 1.342-7.346 7.347z" fill-rule="nonzero" />
                        </svg>
                        <span class="mx-1 hidden sm:flex">Edit Product</span>
                    </a>
                </div>
            @endcanany
        </div>
        <div class="bg-white p-5 rounded-lg shadow-lg mt-5">
            <h2 class="text-2xl font-bold text-teal-700 mb-4">{{ $category->name }}</h2>
            <div class="mb-4">
                <strong class="text-teal-700">Kode:</strong>
                <p class="text-slate-700">{{ $category->code }}</p>
            </div>
            <div class="mb-4">
                <strong class="text-teal-700">Deskripsi:</strong>
                <p class="text-slate-700">{{ $category->description }}</p>
            </div>
            @canany(['isAdmin', 'isMedia', 'isMarketing'])
                <form action="/dashboard/categories/{{ $category->id }}" method="post" class="mt-4">
                    @method('delete')
                    @csrf
                    <button class="btn-danger text-white w-full py-2 rounded bg-red-600 hover:bg-red-700 flex items-center justify-center" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $category->name }} dengan kode {{ $category->code }} ?')">
                        <svg class="fill-current w-5 inline-block mr-2" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm0 7.425 2.717-2.718c.146-.146.339-.219.531-.219.404 0 .75.325.75.75 0 .193-.073.384-.219.531l-2.717 2.717 2.727 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.53-.219l-2.729-2.728-2.728 2.728c-.146.146-.338.219-.53.219-.401 0-.751-.323-.751-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .385.073.531.219z" fill-rule="nonzero" />
                        </svg>Hapus Kategori
                    </button>
                </form>
            @endcanany
            <div class="mt-2">
                <a href="{{ url()->previous() }}" class="btn-primary text-white w-full py-2 rounded bg-blue-600 hover:bg-blue-700 flex items-center justify-center">
                    <svg class="fill-current w-5 h-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    kembali
                </a>
            </div>
            
        </div>
    </div>
</div>
@endsection
