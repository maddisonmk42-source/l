<x-app-layout>
    <div class="min-h-screen bg-[#090909] py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black italic text-white">
                        RACING <span class="text-red-600">TEAMS</span>
                    </h1>
                    <p class="text-gray-400 text-sm mt-2">
                        Manage Porsche Cup Racing Teams
                    </p>
                </div>

                <a href="{{ route('teams.create') }}"
                   class="px-5 py-3 bg-red-700 hover:bg-red-800 text-white font-bold rounded-lg transition">
                    + ADD NEW TEAM
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 bg-green-900/30 border border-green-700 text-green-400 px-5 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Teams Table -->
            <div class="bg-[#151515] border border-[#333] rounded-xl overflow-hidden shadow-2xl">

                <div class="px-6 py-5 border-b border-[#333]">
                    <h2 class="text-lg font-bold text-white">
                        Registered Teams
                    </h2>
                    <p class="text-gray-500 text-sm mt-1">
                        Total Teams: {{ $teams->count() }}
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-[#202020] text-gray-400 uppercase text-xs tracking-wider">
                            <tr>
                                <th class="px-6 py-4">Logo</th>
                                <th class="px-6 py-4">Team Name</th>
                                <th class="px-6 py-4">Country</th>
                                <th class="px-6 py-4">Founded</th>
                                <th class="px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#333]">
                            @forelse ($teams as $team)
                                <tr class="hover:bg-[#202020] transition">

                                    <!-- Logo -->
                                    <td class="px-6 py-4">
                                        @if ($team->logo)
                                            <img
                                                src="{{ asset('storage/' . $team->logo) }}"
                                                alt="{{ $team->team_name }}"
                                                class="w-14 h-14 object-contain bg-[#242424] rounded-lg p-1"
                                            >
                                        @else
                                            <div class="w-14 h-14 bg-[#242424] rounded-lg flex items-center justify-center text-gray-500 text-xs">
                                                NO LOGO
                                            </div>
                                        @endif
                                    </td>

                                    <!-- Team Name -->
                                    <td class="px-6 py-4">
                                        <span class="font-bold text-white">
                                            {{ $team->team_name }}
                                        </span>
                                    </td>

                                    <!-- Country -->
                                    <td class="px-6 py-4 text-gray-300">
                                        {{ $team->country }}
                                    </td>

                                    <!-- Founded -->
                                    <td class="px-6 py-4 text-gray-300">
                                        {{ $team->founded_year ?? '-' }}
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-2">

                                            <a href="{{ route('teams.edit', $team->id) }}"
                                               class="px-3 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-xs font-bold rounded-md">
                                                EDIT
                                            </a>

                                            <form action="{{ route('teams.destroy', $team->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this team?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="px-3 py-2 bg-red-700 hover:bg-red-800 text-white text-xs font-bold rounded-md">
                                                    DELETE
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <p class="text-gray-400 font-semibold">
                                            No teams registered yet.
                                        </p>
                                        <p class="text-gray-600 text-sm mt-2">
                                            Add your first racing team to get started.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>