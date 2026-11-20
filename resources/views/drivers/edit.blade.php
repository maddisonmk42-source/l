<x-app-layout>
    <div class="min-h-screen bg-[#101010] text-white px-6 py-10">
        <div class="max-w-3xl mx-auto">

            <!-- Header -->
            <div class="mb-8">
                <a href="{{ route('drivers.index') }}"
                   class="text-red-500 hover:text-red-400 text-sm font-bold">
                    ← BACK TO DRIVERS
                </a>

                <p class="text-red-600 font-bold tracking-[4px] text-sm mt-6">
                    PORSCHE CUP MANAGEMENT
                </p>

                <h1 class="text-3xl font-extrabold mt-2">
                    EDIT DRIVER
                </h1>

                <p class="text-gray-400 mt-2">
                    Update driver information.
                </p>
            </div>

            <!-- Form -->
            <div class="bg-[#1a1a1a] border border-gray-800 rounded-xl p-6 md:p-8">

                <form action="{{ route('drivers.update', $driver->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <!-- Driver Name -->
                    <div class="mb-5">
                        <label class="block text-sm font-bold mb-2">Driver Name</label>

                        <input type="text"
                               name="driver_name"
                               value="{{ old('driver_name', $driver->driver_name) }}"
                               class="w-full !bg-[#242424] !text-white placeholder-gray-500 border border-gray-700 rounded-lg px-4 py-3 focus:border-red-600 focus:ring-red-600">

                        @error('driver_name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Racing Number -->
                    <div class="mb-5">
                        <label class="block text-sm font-bold mb-2">Racing Number</label>

                        <input type="text"
                               name="racing_number"
                               value="{{ old('racing_number', $driver->racing_number) }}"
                               class="w-full !bg-[#242424] !text-white placeholder-gray-500 border border-gray-700 rounded-lg px-4 py-3 focus:border-red-600 focus:ring-red-600">

                        @error('racing_number')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Country -->
                    <div class="mb-5">
                        <label class="block text-sm font-bold mb-2">Country</label>

                        <input type="text"
                               name="country"
                               value="{{ old('country', $driver->country) }}"
                               class="w-full !bg-[#242424] !text-white placeholder-gray-500 border border-gray-700 rounded-lg px-4 py-3 focus:border-red-600 focus:ring-red-600">

                        @error('country')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div class="mb-5">
                        <label class="block text-sm font-bold mb-2">Date of Birth</label>

                        <input type="date"
                               name="date_of_birth"
                               value="{{ old('date_of_birth', $driver->date_of_birth) }}"
                               class="w-full !bg-[#242424] !text-white border border-gray-700 rounded-lg px-4 py-3 focus:border-red-600 focus:ring-red-600">

                        @error('date_of_birth')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Team -->
                    <div class="mb-5">
                        <label class="block text-sm font-bold mb-2">Team</label>

                        <input type="text"
                               name="team"
                               value="{{ old('team', $driver->team) }}"
                               class="w-full !bg-[#242424] !text-white placeholder-gray-500 border border-gray-700 rounded-lg px-4 py-3 focus:border-red-600 focus:ring-red-600">

                        @error('team')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Photo -->
                    <div class="mb-5">
                        <label class="block text-sm font-bold mb-3">Current Photo</label>

                        @if($driver->photo)
                            <img src="{{ asset('storage/' . $driver->photo) }}"
                                 class="w-32 h-32 object-cover rounded-lg border border-gray-700">
                        @else
                            <p class="text-gray-500 text-sm">No photo uploaded.</p>
                        @endif
                    </div>

                    <!-- New Photo -->
                    <div class="mb-8">
                        <label class="block text-sm font-bold mb-2">Change Photo</label>

                        <input type="file"
                               name="photo"
                               accept="image/*"
                               class="w-full !bg-[#242424] !text-white border border-gray-700 rounded-lg px-4 py-3 focus:border-red-600 focus:ring-red-600">

                        <p class="text-gray-500 text-xs mt-2">
                            Leave empty to keep the current photo.
                        </p>

                        @error('photo')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">

                        <button type="submit"
                                class="bg-red-700 hover:bg-red-800 px-6 py-3 rounded-lg font-bold transition">
                            UPDATE DRIVER
                        </button>

                        <a href="{{ route('drivers.index') }}"
                           class="bg-[#333333] hover:bg-[#444444] px-6 py-3 rounded-lg font-bold text-center transition">
                            CANCEL
                        </a>

                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>