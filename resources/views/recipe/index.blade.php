<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resep Pembuatan ' . $resep->title) }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <img src="{{ asset('images/' . $resep->image) }}" class="box-content rounded w-full h-auto max-h-96"
                        alt="">
                    <p class="my-2 font-semibold font-italic text-sm">{{ count($resep->likes) }} orang menyukai ini</p>
                    <h1 class="text-4xl font-semibold text-slate-500 mt-2">{{ $resep->title }}</h1>
                    <h1 class="text-sm my-1 text-slate-400 font-italic">
                        {{ $resep->user->name == auth()->user()->name ? 'Anda' : $resep->user->name }} -
                        {{ $resep->created_at->diffForHumans() }}
                    </h1>
                    <p class="h-auto">{{ $resep->description }} </p>
                    <h1 class="text-3xl font-semibold text-slate-500 my-1">Bahan-bahan</h1>
                    @for ($i = 0; $i < count($resep->ingredient ?? []); $i++)
                        <p class="h-auto">{{ $resep->ingredient[$i] }} </p>
                    @endfor
                    <h1 class="text-3xl font-semibold text-slate-500 my-1">Langkah Pembuatan</h1>
                    @for ($i = 0; $i < count($resep->step ?? []); $i++)
                        <p class="h-auto mb-2">{{ $resep->step[$i] }} </p>
                    @endfor

                </div>
                <div class="p-8 mt-5">
                    <a href="{{ route('dashboard') }}"
                        class="bg-gray-500  rounded w-full p-2 text-white font-semibold hover:bg-rose-400">Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
