{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
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
        <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Forgot Password</h2>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <!-- Forgot Password Form -->
        <form method="POST" action="{{ route('password.email') }}" class="w-full">
            @csrf

            <!-- NIK -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                <input name="nik" type="text" placeholder="NIK" value="{{ old('nik') }}"
                    class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none" required>
                @error('nik')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input name="email" type="email" placeholder="Email" value="{{ old('email') }}"
                    class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none" required>
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Send Reset Link Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition mb-4">
                Send Reset Link
            </button>
        </form>

        <!-- Back to Login -->
        <div class="text-center mt-2">
            <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">Kembali ke halaman Login</a>
        </div>
    </div>
</body>

</html>
