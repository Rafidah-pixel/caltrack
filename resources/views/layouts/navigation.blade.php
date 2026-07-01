<nav class="bg-white border-b border-gray-200">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <div class="flex items-center">

                <a href="{{ route('dashboard') }}"
                   class="font-bold text-xl text-blue-600">
                    CalTrack
                </a>

            </div>

            <div class="flex items-center gap-4">

                <span class="text-gray-600">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST"
                      action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded">
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>