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

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>