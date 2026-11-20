<x-app-layout>

    <div class="min-h-screen bg-[#090909] text-white py-10">

        <div class="max-w-4xl mx-auto px-6">

            <!-- Header -->
            <div class="mb-8">
                <p class="text-red-600 font-bold tracking-[0.3em] text-xs uppercase">
                    Porsche Cup Management
                </p>

                <h1 class="text-4xl font-black italic uppercase mt-2">
                    Add Circuit
                </h1>

                <p class="text-gray-400 mt-2">
                    Register a new racing circuit
                </p>
            </div>

            <!-- Form -->
            <div class="bg-[#141414] border border-gray-800 rounded-xl p-6 md:p-8">

                <form action="{{ route('circuits.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Circuit Name -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold mb-2">
                                Circuit Name
                            </label>

                            <input type="text"
                                   name="circuit_name"
                                   value="{{ old('circuit_name') }}"
                                   placeholder="Enter circuit name"
                                   class="w-full bg-[#090909] border border-gray-700 text-white rounded-lg p-3 focus:border-red-600 focus:ring-red-600">

                            @error('circuit_name')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Country -->
                        <div>
                            <label class="block text-sm font-bold mb-2">
                                Country
                            </label>

                            <input type="text"
                                   name="country"
                                   value="{{ old('country') }}"
                                   placeholder="Enter country"
                                   class="w-full bg-[#090909] border border-gray-700 text-white rounded-lg p-3 focus:border-red-600 focus:ring-red-600">

                            @error('country')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Circuit Length -->
                        <div>
                            <label class="block text-sm font-bold mb-2">
                                Circuit Length (KM)
                            </label>

                            <input type="number"
                                   name="circuit_length"
                                   value="{{ old('circuit_length') }}"
                                   step="0.01"
                                   min="0"
                                   placeholder="Example: 7.00"
                                   class="w-full bg-[#090909] border border-gray-700 text-white rounded-lg p-3 focus:border-red-600 focus:ring-red-600">

                            @error('circuit_length')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Number of Turns -->
                        <div>
                            <label class="block text-sm font-bold mb-2">
                                Number of Turns
                            </label>

                            <input type="number"
                                   name="number_of_turns"
                                   value="{{ old('number_of_turns') }}"
                                   min="1"
                                   placeholder="Example: 19"
                                   class="w-full bg-[#090909] border border-gray-700 text-white rounded-lg p-3 focus:border-red-600 focus:ring-red-600">

                            @error('number_of_turns')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lap Record -->
                        <div>
                            <label class="block text-sm font-bold mb-2">
                                Lap Record
                            </label>

                            <input type="text"
                                   name="lap_record"
                                   value="{{ old('lap_record') }}"
                                   placeholder="Example: 1:45.678"
                                   class="w-full bg-[#090909] border border-gray-700 text-white rounded-lg p-3 focus:border-red-600 focus:ring-red-600">

                            @error('lap_record')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Circuit Image -->
                        <div class="md:col-span-2">

                            <label class="block text-sm font-bold mb-2">
                                Circuit Image
                            </label>

                            <input type="file"
                                   name="circuit_image"
                                   accept="image/jpeg,image/png,image/webp"
                                   class="w-full bg-[#090909] border border-gray-700 text-gray-300 rounded-lg p-3">

                            <p class="text-gray-500 text-xs mt-2">
                                JPG, JPEG, PNG, WEBP. Maximum 2 MB.
                            </p>

                            @error('circuit_image')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mt-8">

                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 px-7 py-3 rounded-lg font-bold transition">
                            SAVE CIRCUIT
                        </button>

                        <a href="{{ route('circuits.index') }}"
                           class="bg-[#292929] hover:bg-[#383838] px-7 py-3 rounded-lg font-bold text-center transition">
                            CANCEL
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>