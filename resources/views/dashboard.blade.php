<x-app-layout>

    <div class="min-h-screen bg-[#101010] text-white">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <!-- HERO SECTION -->
            <div class="relative overflow-hidden rounded-2xl mb-10
                bg-gradient-to-r from-[#240008] via-[#850018] to-[#C90024]
                border border-red-900/50">

                <div class="absolute right-0 top-0 h-full w-1/3 opacity-10
                    bg-[repeating-linear-gradient(135deg,white_0px,white_3px,transparent_3px,transparent_18px)]">
                </div>

                <div class="relative z-10 p-8 md:p-12">

                    <div class="flex items-center gap-2 mb-5">
                        <span class="w-2 h-2 rounded-full bg-red-300 animate-pulse"></span>
                        <span class="text-red-200 text-xs font-bold tracking-[4px] uppercase">
                            Racing Management System
                        </span>
                    </div>

                    <h1 class="text-3xl md:text-5xl font-black italic uppercase">
                        Welcome Back,
                    </h1>

                    <h2 class="text-3xl md:text-5xl font-black italic uppercase mt-2">
                        {{ Auth::user()->name }}
                    </h2>

                    <p class="text-gray-200 mt-5 max-w-xl">
                        Manage your Porsche Cup racing operations.
                        Monitor cars, drivers, teams and championship activities
                        from one central dashboard.
                    </p>

                    <a href="{{ route('cars.index') }}"
                       class="inline-flex items-center gap-3 mt-8
                       bg-white text-[#B00020] font-black uppercase
                       tracking-wider px-6 py-3 rounded-lg
                       hover:bg-gray-200 transition">
                        Explore Garage
                        <span>→</span>
                    </a>

                </div>

                <div class="absolute bottom-3 right-6 hidden md:block
                    text-white/10 font-black italic text-8xl select-none">
                    GT3
                </div>

            </div>


            <!-- SECTION TITLE -->
            <div class="flex items-center justify-between mb-6">

                <div>
                    <p class="text-red-500 text-xs font-bold tracking-[4px]">
                        SYSTEM OVERVIEW
                    </p>

                    <h2 class="text-2xl font-black uppercase mt-2">
                        Racing Statistics
                    </h2>
                </div>

                <div class="hidden sm:block text-right">
                    <p class="text-gray-500 text-xs uppercase tracking-wider">
                        System Status
                    </p>
                    <p class="text-green-500 font-bold text-sm mt-1">
                        ● ONLINE
                    </p>
                </div>

            </div>


            <!-- STATISTICS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-12">

                <!-- Cars -->
                <a href="{{ route('cars.index') }}"
                   class="bg-[#202020] border border-gray-800
                   hover:border-red-600 rounded-xl p-6 transition">

                    <div class="flex justify-between items-center">
                        <p class="text-gray-400 text-sm font-semibold uppercase">
                            Registered Cars
                        </p>
                        <span class="text-2xl">🏎️</span>
                    </div>

                    <h3 class="text-4xl font-black text-red-500 mt-5">
                        {{ $totalCars }}
                    </h3>

                    <p class="text-gray-500 text-xs mt-2">
                        Total cars registered
                    </p>

                </a>


                <!-- Drivers -->
                <a href="{{ route('drivers.index') }}"
                   class="bg-[#202020] border border-gray-800
                   hover:border-red-600 rounded-xl p-6 transition">

                    <div class="flex justify-between items-center">
                        <p class="text-gray-400 text-sm font-semibold uppercase">
                            Drivers
                        </p>
                        <span class="text-2xl">🏁</span>
                    </div>

                    <h3 class="text-4xl font-black text-white mt-5">
                        {{ $totalDrivers }}
                    </h3>

                    <p class="text-gray-500 text-xs mt-2">
                        Total registered drivers
                    </p>

                </a>


                <!-- Teams -->
                <a href="{{ route('teams.index') }}"
                   class="bg-[#202020] border border-gray-800
                   hover:border-red-600 rounded-xl p-6 transition">

                    <div class="flex justify-between items-center">
                        <p class="text-gray-400 text-sm font-semibold uppercase">
                            Racing Teams
                        </p>
                        <span class="text-2xl">🏆</span>
                    </div>

                    <h3 class="text-4xl font-black text-white mt-5">
                        {{ $totalTeams }}
                    </h3>

                    <p class="text-gray-500 text-xs mt-2">
                        Total registered teams
                    </p>

                </a>


                <!-- Circuits -->
                <div class="bg-[#202020] border border-gray-800
                    rounded-xl p-6">

                    <div class="flex justify-between items-center">
                        <p class="text-gray-400 text-sm font-semibold uppercase">
                            Circuits
                        </p>
                        <span class="text-2xl">🏟️</span>
                    </div>

                    <h3 class="text-4xl font-black text-white mt-5">
                        --
                    </h3>

                    <p class="text-gray-500 text-xs mt-2">
                        Circuit database
                    </p>

                </div>

            </div>


            <!-- MANAGEMENT CENTER -->
            <div class="mb-6">

                <p class="text-red-500 text-xs font-bold tracking-[4px]">
                    CONTROL PANEL
                </p>

                <h2 class="text-2xl font-black uppercase mt-2">
                    Management Center
                </h2>

                <p class="text-gray-400 text-sm mt-2">
                    Select a module to manage your racing operations.
                </p>

            </div>


            <!-- MANAGEMENT CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">


                <!-- CARS -->
                <a href="{{ route('cars.index') }}"
                   class="group bg-[#202020] border border-gray-800
                   hover:border-red-600 rounded-xl p-6 transition
                   hover:-translate-y-1">

                    <div class="w-14 h-14 flex items-center justify-center
                        bg-red-950 rounded-xl text-3xl">
                        🏎️
                    </div>

                    <h3 class="text-xl font-black uppercase mt-5
                        group-hover:text-red-500 transition">
                        Car Management
                    </h3>

                    <p class="text-gray-400 text-sm mt-3">
                        Manage car numbers, models, engines, racing teams
                        and vehicle photographs.
                    </p>

                    <div class="flex justify-between items-center mt-6">
                        <span class="text-red-500 font-bold text-sm uppercase">
                            Open Module
                        </span>
                        <span class="text-red-500 group-hover:translate-x-2 transition">
                            →
                        </span>
                    </div>

                </a>


                <!-- DRIVERS -->
                <a href="{{ route('drivers.index') }}"
                   class="group bg-[#202020] border border-gray-800
                   hover:border-red-600 rounded-xl p-6 transition
                   hover:-translate-y-1">

                    <div class="w-14 h-14 flex items-center justify-center
                        bg-red-950 rounded-xl text-3xl">
                        🏁
                    </div>

                    <h3 class="text-xl font-black uppercase mt-5
                        group-hover:text-red-500 transition">
                        Driver Management
                    </h3>

                    <p class="text-gray-400 text-sm mt-3">
                        Manage driver profiles, racing numbers and
                        driver information.
                    </p>

                    <div class="flex justify-between items-center mt-6">
                        <span class="text-red-500 font-bold text-sm uppercase">
                            Open Module
                        </span>
                        <span class="text-red-500 group-hover:translate-x-2 transition">
                            →
                        </span>
                    </div>

                </a>


                <!-- TEAMS -->
                <a href="{{ route('teams.index') }}"
                   class="group bg-[#202020] border border-gray-800
                   hover:border-red-600 rounded-xl p-6 transition
                   hover:-translate-y-1">

                    <div class="w-14 h-14 flex items-center justify-center
                        bg-red-950 rounded-xl text-3xl">
                        🏆
                    </div>

                    <h3 class="text-xl font-black uppercase mt-5
                        group-hover:text-red-500 transition">
                        Team Management
                    </h3>

                    <p class="text-gray-400 text-sm mt-3">
                        Organize racing teams and their championship
                        information.
                    </p>

                    <div class="flex justify-between items-center mt-6">
                        <span class="text-red-500 font-bold text-sm uppercase">
                            Open Module
                        </span>
                        <span class="text-red-500 group-hover:translate-x-2 transition">
                            →
                        </span>
                    </div>

                </a>


                <!-- CIRCUITS -->
                <div class="bg-[#202020] border border-gray-800
                    rounded-xl p-6 opacity-80">

                    <div class="w-14 h-14 flex items-center justify-center
                        bg-gray-800 rounded-xl text-3xl">
                        🏟️
                    </div>

                    <h3 class="text-xl font-black uppercase mt-5">
                        Circuit Management
                    </h3>

                    <p class="text-gray-400 text-sm mt-3">
                        Manage racing circuits, track layouts and
                        circuit information.
                    </p>

                    <p class="text-gray-500 font-bold text-xs mt-6 tracking-wider">
                        COMING SOON
                    </p>

                </div>


                <!-- SCHEDULE -->
                <div class="bg-[#202020] border border-gray-800
                    rounded-xl p-6 opacity-80">

                    <div class="w-14 h-14 flex items-center justify-center
                        bg-gray-800 rounded-xl text-3xl">
                        📅
                    </div>

                    <h3 class="text-xl font-black uppercase mt-5">
                        Race Schedule
                    </h3>

                    <p class="text-gray-400 text-sm mt-3">
                        Organize racing events, dates and
                        championship schedules.
                    </p>

                    <p class="text-gray-500 font-bold text-xs mt-6 tracking-wider">
                        COMING SOON
                    </p>

                </div>


                <!-- RESULTS -->
                <div class="bg-[#202020] border border-gray-800
                    rounded-xl p-6 opacity-80">

                    <div class="w-14 h-14 flex items-center justify-center
                        bg-gray-800 rounded-xl text-3xl">
                        📊
                    </div>

                    <h3 class="text-xl font-black uppercase mt-5">
                        Race Results
                    </h3>

                    <p class="text-gray-400 text-sm mt-3">
                        Track race results and championship standings.
                    </p>

                    <p class="text-gray-500 font-bold text-xs mt-6 tracking-wider">
                        COMING SOON
                    </p>

                </div>

            </div>


            <!-- FOOTER -->
            <footer class="border-t border-gray-800 mt-14 pt-8 pb-4">

                <div class="flex flex-col sm:flex-row
                    justify-between items-center gap-4">

                    <div>
                        <h3 class="font-black tracking-wider">
                            PORSCHE CUP
                        </h3>

                        <p class="text-gray-500 text-xs mt-1">
                            Racing Management System
                        </p>
                    </div>

                    <div class="text-red-600 font-black
                        tracking-[3px] text-xs">
                        RACE • PERFORMANCE • PRECISION
                    </div>

                </div>

                <p class="text-center text-gray-600 text-xs mt-8">
                    © {{ date('Y') }} Porsche Cup Management System.
                    All rights reserved.
                </p>

            </footer>

        </div>

    </div>

</x-app-layout>