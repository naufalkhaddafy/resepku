<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tulis Resepmu ...') }}
        </h2>
        @if (session('fail'))
            <div class="w-full bg-red-700 rounded-lg p-5 mt-6">
                <p class="text-sm text-white">Gagal menambahkan resep</p>
            </div>
        @endif
    </x-slot>

    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('recipe.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Judul')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Deskripsi -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Deskripsi')" />
                            <textarea id="description" class="block mt-1 w-full rounded" name="description" :value="old('description')"" required>
                            </textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Bahan-bahan -->
                        <div class="mt-4">
                            <x-input-label for="ingredient" :value="__('Bahan-bahan')" />
                            <x-text-input id="ingredient" class="block mt-1 w-full" type="text" name="ingredient[0]"
                                required autocomplete="new-ingredient" :value="old('ingredient')" />
                            <div id="dynamic"></div>
                            <button class="p-2" onclick="addIngredient()" type="button">+ Item Bahan</button>
                            <x-input-error :messages="$errors->get('ingredient')" class="mt-2" />

                        </div>

                        <!-- Langkah-langkah -->
                        <div class="mt-4">
                            <x-input-label for="step" :value="__('Langkah-langkah')" />
                            <x-text-input id="step" class="block mt-1 w-full" type="text" name="step[0]" .
                                value="1. " required autocomplete="new-step" />
                            <div id="dynamic2"></div>
                            <button class="p-2" onclick="addStep()" type="button">+ Item Langkah</button>
                            <x-input-error :messages="$errors->get('step')" class="mt-2" />
                        </div>


                        <!-- Upload image -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Upload Foto Masakan')" />
                            <x-text-input id="image" class="block mt-1 w-full p-2" type="file" name="image"
                                required autocomplete="new-image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <input name="user_id" type="hidden" value="{{ auth()->user()->id }}" />
                        <!-- Upload image -->
                        <div class="mt-4 ">
                            <x-primary-button class="block w-full py-4">
                                {{ __('Terbitkan Resep') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            i = 1;
            s = 1;
            j = 2;

            function addIngredient() {
                document.getElementById("dynamic").insertAdjacentHTML("beforeEnd", "<input type='text' name='ingredient[" + i++
                    +
                    "]' class='block mt-4 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'/>"
                );
            }

            function addStep() {
                document.getElementById("dynamic2").insertAdjacentHTML("beforeEnd", "<input type='text' name='step[" + s++ +
                    "]' class='block mt-4 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm' value='" +
                    j++ + ". '/>"
                );
            }
        </script>
    @endpush
</x-app-layout>
