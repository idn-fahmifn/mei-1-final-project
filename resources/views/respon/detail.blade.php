<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Halaman Laporan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex justify-between">
                    <div class="">
                        <h2 class="font-semibold text-xl dark:text-white mb-1">Detail Laporan</h2>
                    </div>
                    <div class="">

                        <form action="{{route('user.laporan.delete', $data->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="text-sm bg-transparent text-red-500 fonr-semibold me-2"
                                onclick="return confirm('Hapus laporan?')">Hapus</button>

                            @if ($data->status != 'selesai')
                                <a href="{{route('admin.respon', $data->id)}}"
                                    class="text-red-600 text-sm font-semibold dark:text-gray-300">Respon</a>
                            @endif
                        </form>

                    </div>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <tbody class="border border-collapse border-x-0 border-gray-300">
                                <tr>
                                    <td class="py-2 px-4 dark:text-gray-300 uppercase text-sm">Judul Laporan</td>
                                    <td class="py-2 px-4 dark:text-gray-300 text-sm">{{$data->judul_laporan}}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 dark:text-gray-300 uppercase text-sm">Status</td>
                                    <td class="py-2 px-4 dark:text-gray-300 text-sm">{{$data->status}}</td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 dark:text-gray-300 uppercase text-sm">Tanggal Laporan</td>
                                    {{-- 3jam yang lalu --}}
                                    <td class="py-2 px-4 dark:text-gray-300 text-sm">
                                        {{$data->created_at->diffForHumans()}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-center mt-4">
                            <img src="{{asset('storage/images/laporan/' . $data->dokumentasi)}}" width="300"
                                alt="Dokumentasi Laporan">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">

                @foreach ($respon as $item)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-1">
                        <div class="p-6">
                            <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Respon</h4>
                            <p class="dark:text-gray-300">
                                {{$item->detail_respon}}
                            </p>
                        </div>
                    </div>
                @endforeach



            </div>

        </div>
    </div>
</x-app-layout>