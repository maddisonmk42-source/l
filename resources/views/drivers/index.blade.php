<x-app-layout>
    <div class="min-h-screen bg-[#101010] text-white px-6 py-10">

        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <p class="text-red-600 font-bold tracking-[4px] text-sm">
                        PORSCHE CUP MANAGEMENT
                    </p>

                    <h1 class="text-3xl md:text-4xl font-extrabold mt-2">
                        DRIVER MANAGEMENT
                    </h1>

                    <p class="text-gray-400 mt-2">
                        Manage your racing drivers and driver information.
                    </p>
                </div>

                <a href="{{ route('drivers.create') }}"
                   class="bg-red-700 hover:bg-red-800 px-6 py-3 rounded-lg font-bold transition">
                    + ADD DRIVER
                </a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-900/40 border border-green-700 text-green-300 px-5 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Driver Table -->
            <div class="bg-[#1a1a1a] border border-gray-800 rounded-xl overflow-hidden">

                <div class="p-6 border-b border-gray-800">
                    <h2 class="text-xl font-bold">Registered Drivers</h2>
                    <p class="text-gray-400 text-sm mt-1">
                        Total drivers: {{ $drivers->count() }}
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">

                        <thead class="bg-[#242424] text-gray-400 text-sm uppercase">
                            <tr>
                                <th class="px-6 py-4">Photo</th>
                                <th class="px-6 py-4">Number</th>
                                <th class="px-6 py-4">Driver Name</th>
                                <th class="px-6 py-4">Country</th>
                                <th class="px-6 py-4">Date of Birth</th>
                                <th class="px-6 py-4">Team</th>
                                <th class="px-6 py-4">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-800">

                            @forelse($drivers as $driver)
                                <tr class="hover:bg-[#222222] transition">

                                    <td class="px-6 py-4">
                                        @if($driver->photo)
                                            <img src="{{ asset('storage/' . $driver->photo) }}"
                                                 class="w-14 h-14 object-cover rounded-lg">
                                        @else
                                            <div class="w-14 h-14 bg-gray-800 rounded-lg flex items-center justify-center text-gray-500">
                                                <span class="text-xs">NO IMG</span>
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="bg-red-700 px-3 py-1 rounded font-bold">
                                            #{{ $driver->racing_number }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 font-bold">
                                        {{ $driver->driver_name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-300">
                                        {{ $driver->country }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-300">
                                        {{ $driver->date_of_birth ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-300">
                                        {{ $driver->team ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">

                                            <a href="{{ route('drivers.edit', $driver->id) }}"
                                               class="bg-yellow-600 hover:bg-yellow-700 px-3 py-2 rounded text-sm font-bold">
                                                Edit
                                            </a>

                                            <form action="{{ route('drivers.destroy', $driver->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus driver ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="bg-red-700 hover:bg-red-800 px-3 py-2 rounded text-sm font-bold">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-12 text-gray-500">
                                        Belum ada data pembalap.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-gray-600 text-xs tracking-widest">
                PORSCHE CUP MANAGEMENT SYSTEM
            </div>

        </div>
    </div>
</x-app-layout>