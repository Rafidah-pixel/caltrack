<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        Profil Gizi
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile-gizi.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                Umur (Tahun)
            </label>

            <input
                type="number"
                name="age"
                min="10"
                max="19"
                value="{{ old('age', $profile->age ?? '') }}"
                class="border rounded w-full p-2"
                required>
        </div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Jenis Kelamin
            </label>

            <select
                name="gender"
                class="border rounded w-full p-2"
                required>

                <option value="">-- Pilih Jenis Kelamin --</option>

                <option value="laki-laki"
                    {{ old('gender', $profile->gender ?? '') == 'laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>

                <option value="perempuan"
                    {{ old('gender', $profile->gender ?? '') == 'perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>

            </select>

        </div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Berat Badan (kg)
            </label>

            <input
                type="number"
                step="0.1"
                name="weight"
                value="{{ old('weight', $profile->weight ?? '') }}"
                class="border rounded w-full p-2"
                required>

        </div>

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Tinggi Badan (cm)
            </label>

            <input
                type="number"
                step="0.1"
                name="height"
                value="{{ old('height', $profile->height ?? '') }}"
                class="border rounded w-full p-2"
                required>

        </div>

        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Tingkat Aktivitas
            </label>

            <select
                name="activity_level"
                class="border rounded w-full p-2"
                required>

                <option value="sedentary"
                    {{ old('activity_level', $profile->activity_level ?? '') == 'sedentary' ? 'selected' : '' }}>
                    Sangat Jarang Bergerak
                </option>

                <option value="light"
                    {{ old('activity_level', $profile->activity_level ?? '') == 'light' ? 'selected' : '' }}>
                    Ringan
                </option>

                <option value="moderate"
                    {{ old('activity_level', $profile->activity_level ?? '') == 'moderate' ? 'selected' : '' }}>
                    Sedang
                </option>

                <option value="active"
                    {{ old('activity_level', $profile->activity_level ?? '') == 'active' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="very_active"
                    {{ old('activity_level', $profile->activity_level ?? '') == 'very_active' ? 'selected' : '' }}>
                    Sangat Aktif
                </option>

            </select>

        </div>

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">

            Simpan Profil

        </button>

    </form>

</div>

</x-app-layout>