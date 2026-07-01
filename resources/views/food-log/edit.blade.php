<x-app-layout>

<div class="max-w-3xl mx-auto py-8 px-6">

    <div class="bg-white rounded-xl shadow-lg p-6">

        <h1 class="text-3xl font-bold text-green-700 mb-6">

            Edit Riwayat Makanan

        </h1>

        @if ($errors->any())

            <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg p-4 mb-6">

                <ul class="list-disc pl-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('food-log.update', $foodLog) }}" method="POST">

            @csrf
            @method('PUT')

            {{-- Makanan --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">

                    Pilih Makanan

                </label>

                <select
                    name="food_id"
                    class="w-full border rounded-lg p-3"
                    required>

                    @foreach($foods as $food)

                        <option
                            value="{{ $food->id }}"
                            {{ old('food_id', $foodLog->food_id) == $food->id ? 'selected' : '' }}>

                            {{ $food->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- Jumlah --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">

                    Jumlah Porsi

                </label>

                <input
                    type="number"
                    step="0.1"
                    min="1"
                    name="quantity"
                    value="{{ old('quantity', $foodLog->quantity) }}"
                    class="w-full border rounded-lg p-3"
                    required>

            </div>

            {{-- Waktu --}}
            <div class="mb-6">

                <label class="block font-semibold mb-2">

                    Waktu Konsumsi

                </label>

                <input
                    type="datetime-local"
                    name="consumed_at"
                    value="{{ old('consumed_at', \Carbon\Carbon::parse($foodLog->consumed_at)->format('Y-m-d\TH:i')) }}"
                    class="w-full border rounded-lg p-3"
                    required>

            </div>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                    Simpan Perubahan

                </button>

                <a
                    href="{{ route('food-log.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>