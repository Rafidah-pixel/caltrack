<x-app-layout>

<div class="max-w-4xl mx-auto mt-8 bg-white shadow rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Makanan
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('food-log.store') }}" method="POST">

        @csrf

        <!-- Cari makanan -->
        <div class="mb-5 relative">

            <label class="block font-semibold mb-2">
                Cari Makanan
            </label>

            <input
                type="text"
                id="food-search"
                class="w-full border rounded-lg p-3"
                placeholder="Ketik nama makanan...">

            <input
                type="hidden"
                name="food_id"
                id="food_id">

            <div
                id="search-result"
                class="absolute w-full bg-white border rounded-lg shadow mt-1 hidden z-50 max-h-64 overflow-y-auto">
            </div>

        </div>

        <!-- Detail makanan -->
        <div
            id="food-detail"
            class="hidden bg-green-50 border border-green-300 rounded-lg p-4 mb-5">

            <h3 id="food-name"
                class="font-bold text-lg"></h3>

            <p id="food-calories"
               class="text-gray-600 mt-1"></p>

        </div>

        <!-- Jumlah -->
        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Jumlah Porsi
            </label>

            <input
                type="number"
                name="quantity"
                value="1"
                min="1"
                class="w-full border rounded-lg p-3"
                required>

        </div>

        <!-- Tanggal -->
        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Tanggal & Jam Makan
            </label>

            <input
                type="datetime-local"
                name="consumed_at"
                value="{{ now()->format('Y-m-d\TH:i') }}"
                class="w-full border rounded-lg p-3"
                required>

        </div>

        <button
            type="submit"
            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

            Simpan

        </button>

    </form>

</div>

<script>

const search=document.getElementById('food-search');
const result=document.getElementById('search-result');
const foodId=document.getElementById('food_id');

const foodDetail=document.getElementById('food-detail');
const foodName=document.getElementById('food-name');
const foodCalories=document.getElementById('food-calories');

search.addEventListener('keyup',function(){

    if(search.value.length<1){

        result.classList.add('hidden');
        result.innerHTML='';
        return;

    }

    fetch('/foods/search?q='+search.value)

    .then(res=>res.json())

    .then(data=>{

        result.innerHTML='';

        if(data.length===0){

            result.innerHTML='<div class="p-3 text-gray-500">Tidak ditemukan</div>';

        }

        data.forEach(food=>{

            result.innerHTML += `
            <div
                class="p-3 hover:bg-green-100 cursor-pointer food-item"
                data-id="${food.id}"
                data-name="${food.name}"
                data-calories="${food.calories}">

                <strong>${food.name}</strong><br>

                <small>${food.calories} kkal</small>

            </div>`;

        });

        result.classList.remove('hidden');

    });

});

result.addEventListener('click',function(e){

    let item=e.target.closest('.food-item');

    if(!item) return;

    foodId.value=item.dataset.id;

    search.value=item.dataset.name;

    foodName.innerHTML=item.dataset.name;

    foodCalories.innerHTML="Kalori : "+item.dataset.calories+" kkal";

    foodDetail.classList.remove('hidden');

    result.classList.add('hidden');

});

</script>

</x-app-layout>
