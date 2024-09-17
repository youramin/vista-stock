@extends('dashboard.layouts.main')

@section('container')
<div class="xl:flex xl:justify-center">
    <div class="mt-16 z-0 mb-8">
        <div class="flex p-1 w-full">
            @include('dashboard.layouts.title')
            @canany(['isAdmin', 'isMedia', 'isMarketing'])
            <div class="border-b">
                <a href="/dashboard/purchases/create" class="btn-primary index-link">
                    <svg class="fill-current w-5" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                        stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m12.002 2c5.518 0 9.998 4.48 9.998 9.998 0 5.517-4.48 9.997-9.998 9.997-5.517 0-9.997-4.48-9.997-9.997 0-5.518 4.48-9.998 9.997-9.998zm0 1.5c-4.69 0-8.497 3.808-8.497 8.498s3.807 8.497 8.497 8.497 8.498-3.807 8.498-8.497-3.808-8.498-8.498-8.498zm-.747 7.75h-3.5c-.414 0-.75.336-.75.75s.336.75.75.75h3.5v3.5c0 .414.336.75.75.75s.75-.336.75-.75v-3.5h3.5c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-3.5v-3.5c0-.414-.336-.75-.75-.75s-.75.336-.75.75z"
                            fill-rule="nonzero" />
                    </svg>
                    <span class="mx-1 hidden sm:flex">Tambah Pembelian</span>
                </a>
            </div>
            @endcanany
        </div>
        <!-- Purchase List -->
        <div class="w-[1200px] mt-5 bg-white shadow-md rounded-lg p-5">
            @if($purchases->isEmpty())
                <p class="text-gray-500">Belum ada nota pembelian.</p>
            @else
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr class="text-gray-700 bg-gray-200">
                            <th class="px-4 py-2">Tanggal Pembelian</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchases as $purchase)
                        <tr class="border-t">
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d F Y') }}
                            </td>
                            <td class="text-center">
                                <div class="flex justify-center space-x-2">
                                    <!-- Show Purchase Button -->
                                    <a href="{{ route('purchases.show', $purchase->id) }}" class="index-link bg-teal-500 hover:bg-teal-600 text-white rounded p-1">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.998 5C7.92 5 4.257 8.093 2.145 11.483A1.252 1.252 0 002 12.5c0 .18.048.359.145.517C4.257 16.39 7.92 19.5 11.998 19.5c4.143 0 7.796-3.09 9.864-6.493a1.253 1.253 0 00.138-.507c0-.175-.046-.351-.138-.507C19.794 8.093 16.142 5 11.998 5zm8.413 7c-1.837 2.878-4.897 5.5-8.413 5.5-3.465 0-6.532-2.632-8.404-5.5C5.466 9.132 8.534 6.5 11.998 6.5c3.518 0 6.579 2.624 8.413 5.5zm-8.411-4c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4z" />
                                        </svg>
                                    </a>

                                    <!-- Edit Purchase Button -->
                                    <a href="{{ route('purchases.edit', $purchase->id) }}" class="index-link bg-amber-400 hover:bg-amber-500 text-white rounded p-1">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 6c.398 0 .75.352.75.75 0 .414-.336.75-.75.75-1.505 0-7.75 0-7.75 0v12h17v-8.749c0-.414.336-.75.75-.75s.75.336.75.75v9.249c0 .621-.522 1-1 1h-18c-.48 0-1-.379-1-1v-13c0-.481.38-1 1-1zm1.521 9.689 9.012-9.012c.133-.133.217-.329.217-.532 0-.179-.065-.363-.218-.515l-2.423-2.415c-.143-.143-.333-.215-.522-.215s-.378.072-.523.215l-9.027 8.996c-.442 1.371-1.158 3.586-1.264 3.952-.126.433.198.834.572.834.41 0 .696-.099 4.176-1.308zm-2.258-2.392 1.17 1.171c-.704.232-1.274.418-1.729.566zm.968-1.154 7.356-7.331 1.347 1.342-7.346 7.347z" />
                                        </svg>
                                    </a>

                                    <!-- Delete Purchase Button -->
                                    <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="index-link bg-red-600 hover:bg-red-700 text-white rounded p-1">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z" fill-rule="nonzero"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection

