<x-app-layout>

<div class="max-w-7xl mx-auto py-8 px-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-bold text-green-700">
                Dashboard CalTrack
            </h1>

            <p class="text-gray-500 mt-2">
                Selamat datang,
                <span class="font-semibold">
                    {{ Auth::user()->name }}
                </span>
            </p>

        </div>

        <div class="flex flex-wrap gap-3 mt-5 md:mt-0">

            <a href="{{ route('profile-gizi.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow transition">

                Profil Gizi

            </a>

            <a href="{{ route('food-log.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg shadow transition">

                + Tambah Makanan

            </a>

            <a href="{{ route('food-log.index') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-lg shadow transition">

                Riwayat Makanan

            </a>

        </div>

    </div>

    {{-- PROFIL GIZI --}}
    @if($profile)

    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">

        <h2 class="text-2xl font-bold text-green-700 mb-6">

            Profil Gizi Remaja

        </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5">

            <div>

                <p class="text-gray-500 text-sm">

                    Umur

                </p>

                <h3 class="text-2xl font-bold">

                    {{ $profile->age }} Tahun

                </h3>

            </div>

            <div>

                <p class="text-gray-500 text-sm">

                    Jenis Kelamin

                </p>

                <h3 class="text-2xl font-bold">

                    {{ $profile->gender }}

                </h3>

            </div>

            <div>

                <p class="text-gray-500 text-sm">

                    Berat Badan

                </p>

                <h3 class="text-2xl font-bold">

                    {{ $profile->weight }} kg

                </h3>

            </div>

            <div>

                <p class="text-gray-500 text-sm">

                    Tinggi Badan

                </p>

                <h3 class="text-2xl font-bold">

                    {{ $profile->height }} cm

                </h3>

            </div>

            <div>

                <p class="text-gray-500 text-sm">

                    IMT

                </p>

                <h3 class="text-2xl font-bold text-blue-600">

                    {{ number_format($imt,2) }}

                </h3>

            </div>

            <div>

                <p class="text-gray-500 text-sm">

                    BMR

                </p>

                <h3 class="text-2xl font-bold text-red-500">

                    {{ round($bmr) }} kkal

                </h3>

            </div>

        </div>

    </div>

    @endif

    {{-- STATUS GIZI WHO --}}
    @if($profile)

    <div class="rounded-xl shadow-lg p-6 mb-8 bg-green-50 border-l-8 border-green-600">

        <h2 class="text-2xl font-bold mb-4">

            Status Gizi (WHO IMT/U)

        </h2>

        <h3 class="text-3xl font-bold {{ $statusColor }}">

            {{ $statusGizi }}

        </h3>

        <p class="mt-4 text-gray-700 leading-relaxed">

            {{ $edukasi }}

        </p>

    </div>

    @endif

    {{-- RINGKASAN ASUPAN HARI INI --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        {{-- Kalori --}}
        <div class="bg-white rounded-xl shadow-lg p-6">

            <p class="text-gray-500 mb-2">

                Kalori

            </p>

            <h2 class="text-4xl font-bold text-blue-600">

                {{ round($totalCalories) }}

            </h2>

            <p class="text-gray-500 mt-2">

                Target {{ round($targetCalories) }} kkal

            </p>

        </div>

        {{-- Protein --}}
        <div class="bg-white rounded-xl shadow-lg p-6">

            <p class="text-gray-500 mb-2">

                Protein

            </p>

            <h2 class="text-4xl font-bold text-green-600">

                {{ round($totalProtein) }} g

            </h2>

            <p class="text-gray-500 mt-2">

                Target {{ round($targetProtein) }} g

            </p>

        </div>

        {{-- Karbohidrat --}}
        <div class="bg-white rounded-xl shadow-lg p-6">

            <p class="text-gray-500 mb-2">

                Karbohidrat

            </p>

            <h2 class="text-4xl font-bold text-yellow-500">

                {{ round($totalCarbs) }} g

            </h2>

            <p class="text-gray-500 mt-2">

                Target {{ round($targetCarbs) }} g

            </p>

        </div>

        {{-- Lemak --}}
        <div class="bg-white rounded-xl shadow-lg p-6">

            <p class="text-gray-500 mb-2">

                Lemak

            </p>

            <h2 class="text-4xl font-bold text-red-500">

                {{ round($totalFat) }} g

            </h2>

            <p class="text-gray-500 mt-2">

                Target {{ round($targetFat) }} g

            </p>

        </div>

    </div>

    {{-- PROGRESS PEMENUHAN GIZI --}}
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">

        <h2 class="text-2xl font-bold mb-6">

            Progress Pemenuhan Gizi Harian

        </h2>

        {{-- Kalori --}}
        <div class="mb-6">

            <div class="flex justify-between mb-2">

                <span>Kalori</span>

                <span>{{ $caloriePercent }}%</span>

            </div>

            <div class="w-full bg-gray-200 rounded-full h-4">

                <div
                    class="bg-blue-600 h-4 rounded-full transition-all duration-500"
                    style="width: {{ $caloriePercent }}%">
                </div>

            </div>

        </div>

        {{-- Protein --}}
        <div class="mb-6">

            <div class="flex justify-between mb-2">

                <span>Protein</span>

                <span>{{ $proteinPercent }}%</span>

            </div>

            <div class="w-full bg-gray-200 rounded-full h-4">

                <div
                    class="bg-green-600 h-4 rounded-full transition-all duration-500"
                    style="width: {{ $proteinPercent }}%">
                </div>

            </div>

        </div>

        {{-- Karbohidrat --}}
        <div class="mb-6">

            <div class="flex justify-between mb-2">

                <span>Karbohidrat</span>

                <span>{{ $carbsPercent }}%</span>

            </div>

            <div class="w-full bg-gray-200 rounded-full h-4">

                <div
                    class="bg-yellow-500 h-4 rounded-full transition-all duration-500"
                    style="width: {{ $carbsPercent }}%">
                </div>

            </div>

        </div>

        {{-- Lemak --}}
        <div>

            <div class="flex justify-between mb-2">

                <span>Lemak</span>

                <span>{{ $fatPercent }}%</span>

            </div>

            <div class="w-full bg-gray-200 rounded-full h-4">

                <div
                    class="bg-red-500 h-4 rounded-full transition-all duration-500"
                    style="width: {{ $fatPercent }}%">
                </div>

            </div>

        </div>

    </div>

    {{-- EDUKASI GIZI --}}
    <div class="bg-blue-50 border-l-4 border-blue-500 rounded-xl p-6 mb-8">

        <h2 class="text-2xl font-bold mb-3">

            Edukasi Gizi Harian

        </h2>

        <p class="text-gray-700 leading-relaxed">

            {{ $message }}

        </p>

    </div>

    {{-- REKOMENDASI MAKANAN --}}
    @if(count($recommendations) > 0)

    <div class="bg-green-50 rounded-xl shadow-lg p-6 mb-8">

        <h2 class="text-2xl font-bold text-green-700 mb-5">

            Rekomendasi Makanan

        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">

            @foreach($recommendations as $food)

                <div class="bg-white rounded-lg shadow p-4 border border-green-100">

                    <h3 class="font-semibold text-lg">

                        {{ $food }}

                    </h3>

                </div>

            @endforeach

        </div>

    </div>

    @endif

    {{-- RIWAYAT MAKANAN HARI INI --}}
    <div class="bg-white rounded-xl shadow-lg p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">

                Riwayat Konsumsi Hari Ini

            </h2>

            <a href="{{ route('food-log.index') }}"
               class="text-green-600 hover:text-green-700 font-semibold">

                Lihat Semua →

            </a>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead>

                    <tr class="bg-green-600 text-white">

                        <th class="px-4 py-3 text-left">Jam</th>

                        <th class="px-4 py-3 text-center">Waktu Makan</th>

                        <th class="px-4 py-3 text-left">Nama Makanan</th>

                        <th class="px-4 py-3 text-center">Jumlah</th>

                        <th class="px-4 py-3 text-center">Kalori</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($logs->take(5) as $log)

                        @php

                            $hour = \Carbon\Carbon::parse($log->consumed_at)->hour;

                            if($hour >= 5 && $hour < 11){
                                $label = 'Sarapan';
                                $badge = 'bg-yellow-100 text-yellow-700';
                            }
                            elseif($hour >= 11 && $hour < 15){
                                $label = 'Makan Siang';
                                $badge = 'bg-green-100 text-green-700';
                            }
                            elseif($hour >= 15 && $hour < 18){
                                $label = 'Snack';
                                $badge = 'bg-blue-100 text-blue-700';
                            }
                            elseif($hour >= 18 && $hour < 22){
                                $label = 'Makan Malam';
                                $badge = 'bg-red-100 text-red-700';
                            }
                            else{
                                $label = 'Larut Malam';
                                $badge = 'bg-gray-100 text-gray-700';
                            }

                        @endphp

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-4 py-3">

                                {{ \Carbon\Carbon::parse($log->consumed_at)->format('H:i') }}

                            </td>

                            <td class="px-4 py-3 text-center">

                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badge }}">

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

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-8 text-gray-500">

                                Belum ada makanan yang dicatat hari ini.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>