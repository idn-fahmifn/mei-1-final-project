<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Respon Laporan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl dark:text-gray-300 font-semibold mb-1">Respon Laporan {{$data->judul_laporan}}</h2>
                </div>

                <div class="p-6">
                    {{-- form --}}
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mt-4">
                            <x-input-label for="detail_respon" :value="__('Detail Respon')" />
                            <textarea name="detail_respon" id="detail_respon"
                                class="block mt-1 w-full p-4 dark:border border-gray-300  dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                :value="old('detail_respon')" required></textarea>
                            <x-input-error :messages="$errors->get('detail_respon')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-primary-button>
                                {{__('Buat Laporan')}}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>