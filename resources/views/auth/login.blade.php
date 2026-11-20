<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-[#090909] px-4 py-10">

        <div class="w-full max-w-md">

            <!-- Logo / Header -->
            <div class="text-center mb-10">

                <h1 class="text-5xl font-black italic tracking-wider text-white">
                    PORSCHE <span class="text-[#E31837]">CUP</span>
                </h1>

                <div class="w-24 h-1 bg-[#E31837] mx-auto mt-5 mb-6"></div>

                <p class="text-gray-400 tracking-[0.35em] text-sm uppercase">
                    Racing Management System
                </p>

            </div>

            <!-- Login Card -->
            <div class="bg-[#151515] border border-gray-800 rounded-2xl p-7 sm:p-9 shadow-2xl">

                <!-- Heading -->
                <div class="mb-8">

                    <h2 class="text-3xl font-bold text-white">
                        Welcome Back
                    </h2>

                    <p class="text-gray-400 mt-3">
                        Login to access Porsche Cup Control Center.
                    </p>

                </div>

                <!-- Session Status -->
                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')" />

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <!-- Email -->
                    <div class="mb-6">

                        <label for="email"
                               class="block text-sm font-bold text-gray-300 mb-2">
                            Email Address
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Enter your email"
                            class="w-full bg-[#101010] border border-gray-700 text-white placeholder-gray-500 rounded-xl px-4 py-4 focus:border-[#E31837] focus:ring-1 focus:ring-[#E31837] transition">

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2" />

                    </div>

                    <!-- Password -->
                    <div class="mb-8"
                         x-data="{ showPassword: false }">

                        <label for="password"
                               class="block text-sm font-bold text-gray-300 mb-2">
                            Password
                        </label>

                        <div class="relative">

                            <input
                                id="password"
                                :type="showPassword ? 'text' : 'password'"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password"
                                class="w-full bg-[#101010] border border-gray-700 text-white placeholder-gray-500 rounded-xl px-4 py-4 pr-14 focus:border-[#E31837] focus:ring-1 focus:ring-[#E31837] transition">

                            <!-- Show / Hide Password -->
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-[#E31837] transition"
                                :aria-label="showPassword ? 'Hide password' : 'Show password'">

                                <!-- Eye Icon -->
                                <svg
                                    x-show="!showPassword"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>

                                </svg>

                                <!-- Eye Off Icon -->
                                <svg
                                    x-show="showPassword"
                                    x-cloak
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 012.19-3.61M6.18 6.18A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.02 10.02 0 01-4.132 5.411M9.88 9.88a3 3 0 004.24 4.24M3 3l18 18"/>

                                </svg>

                            </button>

                        </div>

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2" />

                    </div>

                    <!-- Login Button -->
                    <button
                        type="submit"
                        class="w-full bg-[#E31837] hover:bg-red-700 text-white font-black text-lg py-4 rounded-xl transition duration-300 tracking-wide">

                        LOGIN TO DASHBOARD

                    </button>

                </form>

                <!-- Create Account -->
                <div class="text-center mt-6">

                    <p class="text-gray-400 text-sm">
                        Don't have an account?

                        <a href="{{ route('register') }}"
                           class="text-[#E31837] font-bold hover:text-red-400 transition ml-1">
                            Create Account
                        </a>
                    </p>

                </div>

                <!-- Footer -->
                <div class="text-center mt-8">

                    <p class="text-gray-500 text-xs tracking-widest uppercase">
                        Porsche Cup Management System
                    </p>

                </div>

            </div>

            <!-- Copyright -->
            <div class="text-center mt-10">

                <p class="text-gray-600 text-xs">
                    © {{ date('Y') }} Porsche Cup Racing. All Rights Reserved.
                </p>

            </div>

        </div>

    </div>

</x-guest-layout>