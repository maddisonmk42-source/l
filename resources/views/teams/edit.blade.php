<x-app-layout>
    <div class="min-h-screen bg-[#090909] py-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-8">
                <a href="{{ route('teams.index') }}"
                   class="text-red-500 hover:text-red-400 text-sm font-semibold">
                    ← BACK TO TEAMS
                </a>

                <h1 class="text-3xl font-black italic text-white mt-4">
                    EDIT <span class="text-red-600">TEAM</span>
                </h1>

                <p class="text-gray-400 text-sm mt-2">
                    Update Porsche Cup racing team information.
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-[#151515] border border-[#333] rounded-xl shadow-2xl p-6 sm:p-8">

                <form action="{{ route('teams.update', $team->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <!-- Team Name -->
                    <div>
                        <label for="team_name" class="block text-sm font-semibold text-gray-300">
                            Team Name <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="team_name"
                            name="team_name"
                            value="{{ old('team_name', $team->team_name) }}"
                            required
                            class="mt-2 w-full rounded-lg bg-[#242424] border border-[#444] text-white focus:border-red-600 focus:ring-red-600"
                        >

                        @error('team_name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Country -->
                    <div class="mt-5">
                        <label for="country" class="block text-sm font-semibold text-gray-300">
                            Country <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="country"
                            name="country"
                            value="{{ old('country', $team->country) }}"
                            required
                            class="mt-2 w-full rounded-lg bg-[#242424] border border-[#444] text-white focus:border-red-600 focus:ring-red-600"
                        >

                        @error('country')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Founded Year -->
                    <div class="mt-5">
                        <label for="founded_year" class="block text-sm font-semibold text-gray-300">
                            Founded Year
                        </label>

                        <input
                            type="number"
                            id="founded_year"
                            name="founded_year"
                            value="{{ old('founded_year', $team->founded_year) }}"
                            min="1900"
                            max="2100"
                            class="mt-2 w-full rounded-lg bg-[#242424] border border-[#444] text-white focus:border-red-600 focus:ring-red-600"
                        >

                        @error('founded_year')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Logo -->
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-300 mb-3">
                            Current Team Logo
                        </label>

                        <div class="bg-[#242424] border border-[#444] rounded-lg p-4 inline-block">
                            <img
                                src="{{ asset('storage/' . $team->logo) }}"
                                alt="{{ $team->team_name }}"
                                class="w-32 h-32 object-contain"
                            >
                        </div>
                    </div>

                    <!-- New Logo -->
                    <div class="mt-5">
                        <label for="logo" class="block text-sm font-semibold text-gray-300">
                            Change Team Logo
                        </label>

                        <input
                            type="file"
                            id="logo"
                            name="logo"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="mt-2 w-full rounded-lg bg-[#242424] border border-[#444] text-white file:bg-red-700 file:text-white file:border-0 file:rounded-md file:px-4 file:py-2 file:mr-4"
                        >

                        <p class="text-gray-500 text-xs mt-2">
                            Leave empty to keep the current logo. Maximum size: 2 MB.
                        </p>

                        @error('logo')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 mt-8">

                        <button
                            type="submit"
                            class="flex-1 py-3 bg-red-700 hover:bg-red-800 text-white font-bold uppercase tracking-wider rounded-lg transition"
                        >
                            Update Team
                        </button>

                        <a
                            href="{{ route('teams.index') }}"
                            class="flex-1 py-3 bg-[#303030] hover:bg-[#404040] text-gray-300 text-center font-bold rounded-lg transition"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>