{{-- Hello 2024 Keep Spirit Guyss --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resep Terbaru') }}
        </h2>
        @if (session('create'))
            <div class="w-full bg-green-700 rounded-lg p-5 mt-6">
                <p class="text-sm text-white">Berhasil menambahkan resep</p>
            </div>
        @elseif(session('like'))
            <div class="w-full bg-green-700 rounded-lg p-5 mt-6">
                <p class="text-sm text-white">Menyukai resep</p>
            </div>
        @elseif(session('unlike'))
            <div class="w-full bg-red-700 rounded-lg p-5 mt-6">
                <p class="text-sm text-white">Batal Menyukai resep</p>
            </div>
        @endif
    </x-slot>
    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden sm:rounded-lg">
                <div class="grid grid-cols-1  md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">
                    @foreach ($reseps as $resep)
                        <a href="{{ route('recipe.show', $resep->id) }}" class="bg-gray-50 shadow-lg rounded-lg p-1">
                            <img src="{{ asset('images/' . $resep->image) }}" class="box-content rounded w-full h-52"
                                alt="">
                            <p class="my-2 font-semibold font-italic text-sm">{{ count($resep->likes) }} orang
                                menyukai ini</p>
                            <h1 class="text-2xl font-semibold text-slate-500 mt-2">{{ $resep->title }}</h1>
                            <h1 class="text-sm mb-2 text-slate-400 font-italic">
                                {{ $resep->user->name == auth()->user()->name ? 'Anda' : $resep->user->name }} -
                                {{ $resep->created_at->diffForHumans() }}
                            </h1>
                            <p class="h-28">{{ Str::limit($resep->description, 150) }} </p>
                            <form action="{{ route('liking', $resep->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="{{ Auth::user()->likes()->where('recipe_id', $resep->id)->first()? 'bg-gray-600': 'bg-rose-500' }} rounded w-full p-1 text-white font-semibold hover:bg-rose-400">
                                    {{ Auth::user()->likes()->where('recipe_id', $resep->id)->first()? 'Batal Menyukai': 'Suka' }}
                                </button>
                            </form>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
