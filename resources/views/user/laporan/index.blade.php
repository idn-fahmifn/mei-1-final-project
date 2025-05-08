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
                        <h2 class="font-semibold text-xl dark:text-white mb-1">Laporan saya</h2>
                        <span class="dark:text-gray-300"> Data laporan saya yang sudah diajukan, </span> <br>
                        <span class="dark:text-gray-300"> Klik pada Judul Laporan untuk melihat detail. </span>
                    </div>
                    <div class="">
                        <a href="" class="text-red-600 font-semibold hover:text-red-500">Ajukan</a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="border border-collapse border-x-0 border-gray-300 bg-red-400">
                                <th class="py-2 px-4 dark:text-gray-300 uppercase text-sm">Judul Laporan</th>
                                <th class="py-2 px-4 dark:text-gray-300 uppercase text-sm">Status</th>
                                <th class="py-2 px-4 dark:text-gray-300 uppercase text-sm">Tanggal Laporan</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="border border-collapse border-x-0 border-gray-300">
                                        <td class="py-2 px-4 dark:text-gray-300 uppercase text-xs">
                                            <a
                                                href="{{route('user.laporan.detail', $item->id)}}">{{$item->judul_laporan}}</a>
                                        </td>
                                        <td class="py-2 px-4 dark:text-gray-300 uppercase text-xs">{{$item->status}}</td>
                                        <td class="py-2 px-4 dark:text-gray-300 uppercase text-xs">{{$item->created_at}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>