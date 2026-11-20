<x-app-layout>
    <div class="min-h-screen bg-gray-950 text-white py-10">
        <div class="max-w-4xl mx-auto px-6">

            <div class="mb-8">
                <h1 class="text-3xl font-bold">EDIT CAR</h1>
                <p class="text-gray-400 mt-2">
                    Update Porsche Cup racing car information
                </p>
            </div>

            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 md:p-8">

                @if($errors->any())
                    <div class="bg-red-950 border border-red-800 text-red-300 p-4 rounded-lg mb-6">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('cars.update', $car) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-gray-300 mb-2">Car Number</label>
                            <input type="text" name="car_number"
                                   value="{{ old('car_number', $car->car_number) }}"
                                   required
                                   class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg p-3">
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2">Car Model</label>
                            <input type="text" name="model"
                                   value="{{ old('model', $car->model) }}"
                                   required
                                   class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg p-3">
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2">Production Year</label>
                            <input type="number" name="production_year"
                                   value="{{ old('production_year', $car->production_year) }}"
                                   min="1900" max="2100"
                                   required
                                   class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg p-3">
                        </div>

                        <div>
                            <label class="block text-gray-300 mb-2">Engine</label>
                            <input type="text" name="engine"
                                   value="{{ old('engine', $car->engine) }}"
                                   required
                                   class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg p-3">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-300 mb-2">Racing Team</label>
                            <input type="text" name="team"
                                   value="{{ old('team', $car->team) }}"
                                   class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg p-3">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-300 mb-3">Current Photo</label>

                            @if($car->photo)
                                <img src="{{ asset('storage/' . $car->photo) }}"
                                     class="w-full max-w-xl h-72 object-cover rounded-xl border border-gray-700 mb-4">
                            @else
                                <p class="text-gray-500 mb-4">No photo available.</p>
                            @endif

                            <label class="block text-gray-300 mb-2">Change Photo</label>
                            <input type="file" name="photo"
                                   accept=".jpg,.jpeg,.png,.webp"
                                   class="w-full bg-gray-800 border border-gray-700 text-gray-300 rounded-lg p-3">

                            <p class="text-gray-500 text-sm mt-2">
                                Leave empty if you don't want to change the photo.
                            </p>
                        </div>

                    </div>

                    <div class="flex flex-wrap gap-3 mt-8">
                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg font-semibold">
                            Update Car
                        </button>

                        <a href="{{ route('cars.index') }}"
                           class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-lg">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>