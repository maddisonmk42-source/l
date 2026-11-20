<x-app-layout>

    <div class="min-h-screen bg-[#090909] text-white py-10">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">

                <div>
                    <p class="text-red-600 font-bold tracking-[0.3em] text-xs uppercase">
                        Porsche Cup Management
                    </p>

                    <h1 class="text-4xl font-black italic uppercase mt-2">
                        Circuits
                    </h1>

                    <p class="text-gray-400 mt-2">
                        Manage racing circuits
                    </p>
                </div>

                <a href="{{ route('circuits.create') }}"
                   class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg font-bold text-center transition">
                    + Add Circuit
                </a>

            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-900/30 border border-green-700 text-green-400 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Circuit Database -->
            <div class="bg-[#141414] border border-gray-800 rounded-xl overflow-hidden">

                <div class="p-6 border-b border-gray-800">
                    <h2 class="text-xl font-bold uppercase">
                        Circuit Database
                    </h2>
                </div>

                @if ($circuits->count() > 0)

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">

                        @foreach ($circuits as $circuit)

                            <!-- Circuit Card -->
                            <div class="bg-[#1c1c1c] border border-gray-800 rounded-xl overflow-hidden flex flex-col h-full">

                                <!-- Image -->
                                @if ($circuit->circuit_image)

                                    <img src="{{ asset('storage/' . $circuit->circuit_image) }}"
                                         class="w-full h-52 object-cover"
                                         alt="{{ $circuit->circuit_name }}">

                                @else

                                    <div class="w-full h-52 bg-[#252525] flex items-center justify-center text-gray-500">
                                        No Circuit Image
                                    </div>

                                @endif

                                <!-- Information -->
                                <div class="p-5 flex flex-col flex-1">

                                    <!-- Name -->
                                    <div class="min-h-[64px]">
                                        <h3 class="text-xl font-black uppercase italic line-clamp-2">
                                            {{ $circuit->circuit_name }}
                                        </h3>
                                    </div>

                                    <!-- Country -->
                                    <p class="text-red-500 font-semibold min-h-[28px]">
                                        {{ $circuit->country }}
                                    </p>

                                    <!-- Specifications -->
                                    <div class="grid grid-cols-2 gap-3 mt-4">

                                        <div class="bg-[#111] p-3 rounded-lg">
                                            <p class="text-gray-500 text-xs uppercase">
                                                Length
                                            </p>

                                            <p class="font-bold mt-2">
                                                {{ number_format($circuit->circuit_length, 2) }} km
                                            </p>
                                        </div>

                                        <div class="bg-[#111] p-3 rounded-lg">
                                            <p class="text-gray-500 text-xs uppercase">
                                                Turns
                                            </p>

                                            <p class="font-bold mt-2">
                                                {{ $circuit->number_of_turns }}
                                            </p>
                                        </div>

                                    </div>

                                    <!-- Lap Record -->
                                    <div class="bg-[#111] p-3 rounded-lg mt-3 min-h-[70px]">

                                        <p class="text-gray-500 text-xs uppercase">
                                            Lap Record
                                        </p>

                                        <p class="font-bold mt-2">
                                            {{ $circuit->lap_record ?: 'Not available' }}
                                        </p>

                                    </div>

                                    <!-- Buttons -->
                                    <div class="flex gap-3 mt-auto pt-6">

                                        <a href="{{ route('circuits.edit', $circuit->id) }}"
                                           class="flex-1 text-center bg-yellow-600 hover:bg-yellow-700 py-3 rounded-lg font-bold transition">
                                            Edit
                                        </a>

                                        <form action="{{ route('circuits.destroy', $circuit->id) }}"
                                              method="POST"
                                              class="flex-1"
                                              onsubmit="return confirm('Are you sure you want to delete this circuit?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="w-full bg-red-600 hover:bg-red-700 py-3 rounded-lg font-bold transition">
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="p-16 text-center">

                        <h3 class="text-xl font-bold text-gray-300">
                            No Circuits Found
                        </h3>

                        <p class="text-gray-500 mt-2">
                            Start by adding your first racing circuit.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>