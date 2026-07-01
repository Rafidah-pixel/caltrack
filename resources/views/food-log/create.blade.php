<x-app-layout>

<div class="max-w-4xl mx-auto mt-8">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Makanan
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('food-log.store') }}" method="POST">

        @csrf

        <div class="mb-4">

            <label class="block font-semibold mb-2">
                Pilih Makanan
            </label>

            <select
                name="food_id"
                class="w-full border rounded p-2"
                required>

                <option value="">-- Pilih Makanan --</option>

                @foreach($foods as $food)

                    <option value="{{ $food->id }}">

                        {{ $food->name }}
                        ({{ $food->calories }} kkal)

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-4">

            <label class="block font-semibold mb-2">

                Jumlah Porsi

            </label>

            <input
                type="number"
                name="quantity"
                value="1"
                min="1"
                class="w-full border rounded p-2"
                required>

        </div>

        <div class="mb-4">

            <label class="block font-semibold mb-2">

                Tanggal & Jam Makan

            </label>

            <input
                type="datetime-local"
                name="consumed_at"
                value="{{ now()->format('Y-m-d\TH:i') }}"
                class="w-full border rounded p-2"
                required>

        </div>

        <button
            type="submit"
            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">

            Simpan

        </button>

    </form>

</div>

</x-app-layout>