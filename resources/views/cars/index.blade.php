<x-app-layout>
    <div class="min-h-screen bg-gray-950 text-white py-10">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-bold">
                        CAR MANAGEMENT
                    </h1>
                    <p class="text-gray-400 mt-2">
                        Porsche Cup Racing Database
                    </p>
                </div>

                <a href="{{ route('cars.create') }}"
                   class="bg-red-600 hover:bg-red-700 px-5 py-3 rounded-lg font-semibold">
                    + Add New Car
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-900 text-green-300 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-900 rounded-xl border border-gray-800 overflow-hidden">

                <div class="p-6 border-b border-gray-800">
                    <h2 class="text-xl font-semibold">Registered Cars</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-800 text-gray-300 uppercase text-sm">
                            <tr>
                                <th class="p-4">Photo</th>
                                <th class="p-4">Number</th>
                                <th class="p-4">Model</th>
                                <th class="p-4">Year</th>
                                <th class="p-4">Engine</th>
                                <th class="p-4">Team</th>
                                <th class="p-4">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-800">
                            @forelse($cars as $car)
                                <tr class="hover:bg-gray-800/70">

                                    <td class="p-4">
                                        @if($car->photo)
                                            <img src="{{ asset('storage/' . $car->photo) }}"
                                                 class="w-28 h-16 object-cover rounded-lg">
                                        @else
                                            <span class="text-gray-500">No Photo</span>
                                        @endif
                                    </td>

                                    <td class="p-4 font-bold text-red-500">
                                        #{{ $car->car_number }}
                                    </td>

                                    <td class="p-4 font-semibold">
                                        {{ $car->model }}
                                    </td>

                                    <td class="p-4 text-gray-300">
                                        {{ $car->production_year }}
                                    </td>

                                    <td class="p-4 text-gray-300">
                                        {{ $car->engine }}
                                    </td>

                                    <td class="p-4 text-gray-300">
                                        {{ $car->team ?? '-' }}
                                    </td>

                                    <td class="p-4">
                                        <div class="flex gap-2">
                                            <a href="{{ route('cars.edit', $car) }}"
                                               class="bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded text-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('cars.destroy', $car) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus mobil ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="bg-red-600 hover:bg-red-700 px-3 py-2 rounded text-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-10 text-center text-gray-400">
                                        Belum ada data mobil.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <a href="{{ route('dashboard') }}"
               class="inline-block mt-6 text-gray-400 hover:text-white">
                ← Back to Dashboard
            </a>

        </div>
    </div>
</x-app-layout>