{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-cover bg-center"
    style="background-image: url('{{ asset('assets/image.png') }}');">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8 flex flex-col items-center">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/image.png') }}" alt="logo" class="h-20 w-20">
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Set New Password</h2>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <!-- Set New Password Form -->
        <form method="POST" action="#" class="w-full">
            @csrf

            <input type="hidden" name="token" value="{{ $token ?? request()->route('token') }}">

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input name="password" type="password" placeholder="Password"
                    class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none"
                    required>
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input name="password_confirmation" type="password" placeholder="Konfirmasi Password"
                    class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none"
                    required>
            </div>

            <!-- Reset Password Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition mb-4">
                Reset Password
            </button>
        </form>
    </div>
</body>

</html>
