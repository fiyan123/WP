{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('template.main')
@section('content_template')
    <section class="bg-white py-6 px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <nav class="text-sm text-gray-600 font-semibold" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ url('/') }}" class="text-blue-600 hover:underline">Homepage</a></li>
                    <li class="text-gray-600">/</li>
                    <li class="text-gray-500">Profil</li>
                </ol>
            </nav>
        </div>

        <!-- Profile Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Profil</h1>
            <div class="flex flex-col items-start mb-6">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Aisya+Nanda&background=E5E7EB&color=374151&size=96"
                        alt="Profile Photo" class="w-20 h-20 rounded-full border-4 border-gray-200 shadow">
                    <button
                        class="absolute bottom-0 right-0 bg-blue-600 text-white text-xs px-3 py-1 rounded-full shadow hover:bg-blue-700 transition">
                        <span class="font-bold">Ubah</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Informasi Pribadi & Alamat -->
        <div id="profile-display">
            <!-- Informasi Pribadi -->
            <div class="mb-8">
                <h2 class="font-bold text-base text-gray-800 mb-4">Informasi Pribadi</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-12 text-sm">
                    <div>
                        <div class="mb-2">
                            <span class="font-bold text-gray-700">Nama Lengkap</span>
                            <div class="text-gray-800">Aisya Nanda</div>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">Email</span>
                            <div class="text-gray-800">aisna0803@gmail.com</div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <span class="font-bold text-gray-700">NIK</span>
                            <div class="text-gray-800">3523151508030001</div>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">No Handphone</span>
                            <div class="text-gray-800">085861015105</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-6 border-gray-200">

            <!-- Informasi Alamat -->
            <div class="mb-8">
                <h2 class="font-bold text-base text-gray-800 mb-4">Informasi Alamat</h2>
                <div class="mb-4">
                    <span class="font-bold text-gray-700">Alamat</span>
                    <div class="text-gray-800">
                        Jl. Telekomunikasi No. 49, Kel. Sukapura, Kec. Dayeuhkolot, Kab. Bandung
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-12 text-sm">
                    <div>
                        <div class="mb-2">
                            <span class="font-bold text-gray-700">Kelurahan</span>
                            <div class="text-gray-800">Buahbatu</div>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">Kabupaten/ Kota</span>
                            <div class="text-gray-800">Kabupaten Bandung</div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <span class="font-bold text-gray-700">Kecamatan</span>
                            <div class="text-gray-800">Bojongsoang</div>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">Provinsi</span>
                            <div class="text-gray-800">Jawa Barat</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <button onclick="toggleEditProfile()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded text-sm font-semibold shadow">
                    <span class="font-bold">Edit Profil</span>
                </button>
            </div>
        </div>

        <!-- Edit Form -->
        <form id="profile-form" action="{{ route('profile.update') }}" method="POST" class="hidden">
            @csrf
            @method('PUT')
            <div class="mb-8">
                <h2 class="font-bold text-base text-gray-800 mb-4">Informasi Pribadi</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-12 text-sm">
                    <div>
                        <div class="mb-2">
                            <label class="font-bold text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" value="Aisya Nanda"
                                class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                        </div>
                        <div>
                            <label class="font-bold text-gray-700">Email</label>
                            <input type="email" name="email" value="aisna0803@gmail.com"
                                class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <label class="font-bold text-gray-700">NIK</label>
                            <input type="text" name="nik" value="3523151508030001"
                                class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                        </div>
                        <div>
                            <label class="font-bold text-gray-700">No Handphone</label>
                            <input type="text" name="phone" value="085861015105"
                                class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-6 border-gray-200">

            <div class="mb-8">
                <h2 class="font-bold text-base text-gray-800 mb-4">Informasi Alamat</h2>
                <div class="mb-4">
                    <label class="font-bold text-gray-700">Alamat</label>
                    <input type="text" name="alamat"
                        value="Jl. Telekomunikasi No. 49, Kel. Sukapura, Kec. Dayeuhkolot, Kab. Bandung"
                        class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-12 text-sm">
                    <div>
                        <div class="mb-2">
                            <label class="font-bold text-gray-700">Kelurahan</label>
                            <input type="text" name="kelurahan" value="Buahbatu"
                                class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                        </div>
                        <div>
                            <label class="font-bold text-gray-700">Kabupaten/ Kota</label>
                            <input type="text" name="kabupaten" value="Kabupaten Bandung"
                                class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <label class="font-bold text-gray-700">Kecamatan</label>
                            <input type="text" name="kecamatan" value="Bojongsoang"
                                class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                        </div>
                        <div>
                            <label class="font-bold text-gray-700">Provinsi</label>
                            <input type="text" name="provinsi" value="Jawa Barat"
                                class="w-full bg-gray-100 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center gap-4">
                <button type="button" onclick="toggleEditProfile()"
                    class="bg-blue-200 hover:bg-blue-300 text-white px-6 py-2 rounded text-sm font-semibold shadow">
                    Batal
                </button>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded text-sm font-semibold shadow">
                    Simpan
                </button>
            </div>
        </form>
    </section>

    <script>
        function toggleEditProfile() {
            document.getElementById('profile-display').classList.toggle('hidden');
            document.getElementById('profile-form').classList.toggle('hidden');
        }

        function toggleForm() {
            document.getElementById('status-display').classList.add('hidden');
            document.getElementById('status-form').classList.remove('hidden');
        }
    </script>
@endsection
