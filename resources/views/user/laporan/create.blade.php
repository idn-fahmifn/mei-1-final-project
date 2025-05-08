<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Buat Laporan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl dark:text-gray-300 font-semibold mb-1">Buat Laporan Baru</h2>
                    <span class="dark:text-gray-300">Ajukan laporan anda, isi pada form dibawah.</span>
                </div>

                <div class="p-6">
                    {{-- form --}}
                    <form action="" method="post">
                        @csrf
                        <div>
                            <x-input-label for="judul_laporan" :value="__('Judul Laporan')" />
                            <x-text-input id="judul_laporan" class="block mt-1 w-full" type="text" name="judul_laporan"
                                :value="old('judul_laporan')" required />
                            <x-input-error :messages="$errors->get('judul_laporan')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="dokumentasi" :value="__('Dokumentasi')" />
                            <x-text-input id="dokumentasi" class="block mt-1 w-full p-4 dark:border border-gray-300" type="file" name="dokumentasi"
                                :value="old('dokumentasi')" required />
                            <x-input-error :messages="$errors->get('dokumentasi')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="dokumentasi" :value="__('Detail Laporan')" />
                            <textarea name="detail_laporan" id="detail_laporan" class="block mt-1 w-full p-4 dark:border border-gray-300  dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" :value="old('judul_laporan')" required ></textarea>
                            <x-input-error :messages="$errors->get('detail_laporan')" class="mt-2" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>