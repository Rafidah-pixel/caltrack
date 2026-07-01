<x-app-layout>

<div class="max-w-7xl mx-auto py-8 px-6">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-green-700">
                Riwayat Makanan
            </h1>

            <p class="text-gray-500 mt-2">
                Riwayat seluruh makanan yang pernah dikonsumsi.
            </p>

        </div>

        <a href="{{ route('food-log.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg shadow">

            + Tambah Makanan

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        <table class="min-w-full">

            <thead>

                <tr class="bg-green-600 text-white">

                    <th class="px-4 py-3 text-left">
                        Tanggal
                    </th>

                    <th class="px-4 py-3 text-left">
                        Jam
                    </th>

                    <th class="px-4 py-3 text-center">
                        Waktu Makan
                    </th>

                    <th class="px-4 py-3 text-left">
                        Makanan
                    </th>

                    <th class="px-4 py-3 text-center">
                        Jumlah
                    </th>

                    <th class="px-4 py-3 text-center">
                        Kalori
                    </th>

                    <th class="px-4 py-3 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($logs as $log)

                    @php

                        $hour = \Carbon\Carbon::parse($log->consumed_at)->hour;

                        if($hour >= 5 && $hour < 11){
                            $badge='bg-yellow-100 text-yellow-700';
                            $label='Sarapan';
                        }
                        elseif($hour >=11 && $hour <15){
                            $badge='bg-green-100 text-green-700';
                            $label='Makan Siang';
                        }
                        elseif($hour >=15 && $hour <18){
                            $badge='bg-blue-100 text-blue-700';
                            $label='Snack';
                        }
                        elseif($hour >=18 && $hour <22){
                            $badge='bg-red-100 text-red-700';
                            $label='Makan Malam';
                        }
                        else{
                            $badge='bg-gray-200 text-gray-700';
                            $label='Larut Malam';
                        }

                    @endphp

                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-4 py-3">

                            {{ \Carbon\Carbon::parse($log->consumed_at)->format('d M Y') }}

                        </td>

                        <td class="px-4 py-3">

                            {{ \Carbon\Carbon::parse($log->consumed_at)->format('H:i') }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $badge }}">

                                {{ $label }}

                            </span>

                        </td>

                        <td class="px-4 py-3">

                            {{ $log->food->name }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            {{ $log->quantity }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            {{ round($log->food->calories * $log->quantity) }} kkal

                        </td>

                        <td class="px-4 py-3">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('food-log.edit',$log->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('food-log.destroy',$log->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-8 text-gray-500">

                            Belum ada riwayat makanan.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $logs->links() }}

    </div>

</div>

</x-app-layout>