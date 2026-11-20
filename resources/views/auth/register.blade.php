<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#090909] px-4 py-10">

        <div class="w-full max-w-md">

            <!-- Header Porsche Cup -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-black italic tracking-wider text-white">
                    PORSCHE <span class="text-red-600">CUP</span>
                </h1>

                <div class="w-20 h-1 bg-red-600 mx-auto mt-3"></div>

                <p class="text-gray-400 text-xs tracking-[0.3em] mt-4 uppercase">
                    Racing Management System
                </p>
            </div>

            <!-- Register Card -->
            <div class="bg-[#151515] border border-[#333] rounded-xl shadow-2xl p-8">

                <div class="mb-7">
                    <h2 class="text-2xl font-bold text-white">
                        Create Account
                    </h2>

                    <p class="text-gray-400 text-sm mt-2">
                        Create your Porsche Cup management account.
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label
                            for="name"
                            value="Full Name"
                            class="text-gray-300 font-semibold"
                        />

                        <x-text-input
                            id="name"
                            class="block mt-2 w-full !bg-[#242424] !border-[#444] !text-white placeholder:!text-gray-500 focus:!border-red-600 focus:!ring-red-600 rounded-lg"
                            type="text"
                            name="name"
                            :value="old('name')"
                            placeholder="Enter your full name"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2"
                        />
                    </div>

                    <!-- Email -->
                    <div class="mt-5">
                        <x-input-label
                            for="email"
                            value="Email Address"
                            class="text-gray-300 font-semibold"
                        />

                        <x-text-input
                            id="email"
                            class="block mt-2 w-full !bg-[#242424] !border-[#444] !text-white placeholder:!text-gray-500 focus:!border-red-600 focus:!ring-red-600 rounded-lg"
                            type="email"
                            name="email"
                            :value="old('email')"
                            placeholder="Enter your email"
                            required
                            autocomplete="username"
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />
                    </div>

                    <!-- Password -->
                    <div class="mt-5">
                        <x-input-label
                            for="password"
                            value="Password"
                            class="text-gray-300 font-semibold"
                        />

                        <x-text-input
                            id="password"
                            class="block mt-2 w-full !bg-[#242424] !border-[#444] !text-white placeholder:!text-gray-500 focus:!border-red-600 focus:!ring-red-600 rounded-lg"
                            type="password"
                            name="password"
                            placeholder="Create a password"
                            required
                            autocomplete="new-password"
                        />

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-5">
                        <x-input-label
                            for="password_confirmation"
                            value="Confirm Password"
                            class="text-gray-300 font-semibold"
                        />

                        <x-text-input
                            id="password_confirmation"
                            class="block mt-2 w-full !bg-[#242424] !border-[#444] !text-white placeholder:!text-gray-500 focus:!border-red-600 focus:!ring-red-600 rounded-lg"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm your password"
                            required
                            autocomplete="new-password"
                        />

                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2"
                        />
                    </div>

                    <!-- Register Button -->
                    <div class="mt-7">
                        <button
                            type="submit"
                            class="w-full py-3 bg-red-700 hover:bg-red-800 text-white font-bold uppercase tracking-wider rounded-lg transition duration-200 shadow-lg"
                        >
                            Create Account
                        </button>
                    </div>

                </form>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400">
                        Already have an account?

                        <a
                            href="{{ route('login') }}"
                            class="text-red-500 hover:text-red-400 font-semibold"
                        >
                            Login Here
                        </a>
                    </p>
                </div>

                <!-- Footer Card -->
                <div class="mt-7 pt-5 border-t border-[#333] text-center">
                    <p class="text-xs text-gray-500 tracking-wider">
                        PORSCHE CUP MANAGEMENT SYSTEM
                    </p>
                </div>

            </div>

            <!-- Footer -->
            <p class="text-center text-gray-600 text-xs mt-7">
                © {{ date('Y') }} Porsche Cup Racing. All Rights Reserved.
            </p>

        </div>
    </div>
</x-guest-layout>