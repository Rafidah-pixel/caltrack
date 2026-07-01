<x-app-layout>

<div class="max-w-7xl mx-auto py-8 px-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-bold text-green-700">

                Riwayat Makanan

            </h1>

            <p class="text-gray-500 mt-2">

                Seluruh riwayat konsumsi makanan yang pernah dicatat.

            </p>

        </div>

        <div class="flex gap-3 mt-5 md:mt-0">

            <a href="{{ route('dashboard') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg shadow">

                ← Dashboard

            </a>

            <a href="{{ route('food-log.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg shadow">

                + Tambah Makanan

            </a>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    {{-- FILTER --}}
    <div class="bg-white rounded-xl shadow-lg p-5 mb-6">

        <form
            method="GET"
            action="{{ route('food-log.index') }}"
            class="flex flex-col md:flex-row gap-4 items-end">

            <div>

                <label class="block text-sm font-semibold mb-2">

                    Filter Tanggal

                </label>

                <input
                    type="date"
                    name="date"
                    value="{{ request('date') }}"
                    class="border rounded-lg px-4 py-2">

            </div>

            <div class="flex gap-2">

                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                    Filter

                </button>

                <a
                    href="{{ route('food-log.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                    Reset

                </a>

            </div>

        </form>

    </div>

    {{-- TABEL --}}
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

                        Nama Makanan

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
                            $label='🌅 Sarapan';
                        }
                        elseif($hour >=11 && $hour <15){
                            $badge='bg-green-100 text-green-700';
                            $label='☀️ Makan Siang';
                        }
                        elseif($hour >=15 && $hour <18){
                            $badge='bg-blue-100 text-blue-700';
                            $label='🍪 Snack';
                        }
                        elseif($hour >=18 && $hour <22){
                            $badge='bg-red-100 text-red-700';
                            $label='🌙 Makan Malam';
                        }
                        else{
                            $badge='bg-gray-200 text-gray-700';
                            $label='🌃 Larut Malam';
                        }

                    @endphp

                    <tr class="border-b hover:bg-green-50 transition">

                        <td class="px-4 py-3">

                            {{ \Carbon\Carbon::parse($log->consumed_at)->format('d M Y') }}

                        </td>

                        <td class="px-4 py-3 font-medium">

                            {{ \Carbon\Carbon::parse($log->consumed_at)->format('H:i') }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $badge }}">

                                {{ $label }}

                            </span>

                        </td>

                        <td class="px-4 py-3 font-medium">

                            {{ $log->food->name }}

                        </td>

                        <td class="px-4 py-3 text-center">

                            {{ $log->quantity }}

                        </td>

                        <td class="px-4 py-3 text-center font-semibold text-green-700">

                            {{ round($log->food->calories * $log->quantity) }}
                            kkal

                        </td>

                        <td class="px-4 py-3">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('food-log.edit', $log->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition">

                                    ✏ Edit

                                </a>

                                <form
                                    action="{{ route('food-log.destroy', $log->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus makanan ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition">

                                        🗑 Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="py-12 text-center">

                            <div class="flex flex-col items-center">

                                <div class="text-6xl mb-3">

                                    🍽️

                                </div>

                                <h3 class="text-xl font-bold text-gray-700">

                                    Belum Ada Riwayat Makanan

                                </h3>

                                <p class="text-gray-500 mt-2">

                                    Yuk mulai catat makanan pertamamu hari ini.

                                </p>

                                <a
                                    href="{{ route('food-log.create') }}"
                                    class="mt-5 bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">

                                    + Tambah Makanan

                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    <div class="mt-6">

        {{ $logs->links() }}

    </div>

</div>

</x-app-layout>