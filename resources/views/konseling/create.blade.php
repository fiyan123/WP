{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Jadwal Konseling') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('staff.konseling.store') }}" class="space-y-6" id="konselingForm">
                        @csrf

                        <!-- ID Pengaduan -->
                        <div>
                            <x-input-label for="pengaduan_id" :value="__('ID Pengaduan')" />
                            <select id="pengaduan_id" name="pengaduan_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Pilih ID Pengaduan</option>
                                @foreach ($pengaduans as $pengaduan)
                                    <option value="{{ $pengaduan->id }}" {{ old('pengaduan_id') == $pengaduan->id ? 'selected' : '' }}>
                                        {{ $pengaduan->id }} - {{ $pengaduan->nama_pelapor }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('pengaduan_id')" />
                        </div>

                        <!-- Nama Korban (akan diisi via JS/Ajax berdasarkan pengaduan_id) -->
                        <div>
                            <x-input-label for="korban_id" :value="__('Nama Korban')" />
                            <select id="korban_id" name="korban_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" disabled>
                                <option value="">Pilih Korban</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('korban_id')" />
                            <p id="no-korban-message" class="mt-2 text-sm text-gray-600" style="display: none;">
                                Pengaduan ini belum memiliki data korban.
                            </p>
                        </div>

                        <!-- Jenis Layanan -->
                        <div>
                            <x-input-label for="jenis_layanan" :value="__('Jenis Layanan Konseling')" />
                            <select id="jenis_layanan" name="jenis_layanan" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Pilih Jenis Layanan</option>
                                @foreach ($layanans as $layanan)
                                    <option value="{{ $layanan->nama_layanan }}" {{ old('jenis_layanan') == $layanan->nama_layanan ? 'selected' : '' }}>
                                        {{ $layanan->nama_layanan }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('jenis_layanan')" />
                        </div>

                        <!-- Nama Konselor -->
                        <div>
                            <x-input-label for="nama_konselor" :value="__('Nama Konselor')" />
                            <select id="nama_konselor" name="nama_konselor" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" disabled>
                                <option value="">Pilih Nama Konselor</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('nama_konselor')" />
                        </div>

                        <!-- Jadwal Konseling -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Tanggal Konseling -->
                            <div>
                                <x-input-label for="tanggal_konseling" :value="__('Tanggal Konseling')" />
                                <x-text-input id="tanggal_konseling" 
                                             class="block mt-1 w-full" 
                                             type="date" 
                                             name="tanggal_konseling" 
                                             :value="old('tanggal_konseling')" 
                                             required />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal_konseling')" />
                            </div>

                            <!-- Waktu Konseling -->
                            <div>
                                <x-input-label for="waktu_konseling" :value="__('Waktu Konseling')" />
                                <x-text-input id="waktu_konseling" 
                                             class="block mt-1 w-full" 
                                             type="time" 
                                             name="waktu_konseling" 
                                             :value="old('waktu_konseling')" 
                                             required />
                                <p class="mt-1 text-sm text-gray-500">Pilih waktu (format: HH:MM dalam 24 jam)</p>
                                <x-input-error class="mt-2" :messages="$errors->get('waktu_konseling')" />
                            </div>
                        </div>

                        <!-- Tempat Konseling -->
                        <div>
                            <x-input-label for="tempat_konseling" :value="__('Tempat Konseling')" />
                            <x-text-input id="tempat_konseling" 
                                         class="block mt-1 w-full" 
                                         type="text" 
                                         name="tempat_konseling" 
                                         :value="old('tempat_konseling')" 
                                         required />
                            <x-input-error class="mt-2" :messages="$errors->get('tempat_konseling')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-secondary-button onclick="window.history.back()" class="mr-3">
                                {{ __('Batal') }}
                            </x-secondary-button>
                            <x-primary-button>
                                {{ __('Buat Jadwal') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden data container for JavaScript -->
    <div id="pengaduan-data" 
         data-pengaduan="{{ json_encode($pengaduans->map(function($pengaduan) {
             return [
                 'id' => $pengaduan->id,
                 'korban' => $pengaduan->korban ? $pengaduan->korban->map(function($korban) {
                     return [
                         'id' => $korban->id,
                         'nama' => $korban->nama ?? 'Nama tidak tersedia'
                     ];
                 }) : []
             ];
         })) }}"
         data-layanan="{{ json_encode($layanans) }}"
         data-instruktur="{{ json_encode($instrukturs) }}"
         data-old-jenis-layanan="{{ old('jenis_layanan') }}"
         data-old-nama-konselor="{{ old('nama_konselor') }}"
         style="display: none;">
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pengaduanSelect = document.getElementById('pengaduan_id');
            const korbanSelect = document.getElementById('korban_id');
            const noKorbanMessage = document.getElementById('no-korban-message');
            const dataContainer = document.getElementById('pengaduan-data');
            const jenisLayananSelect = document.getElementById('jenis_layanan');
            const namaKonselorSelect = document.getElementById('nama_konselor');
            const form = document.getElementById('konselingForm');

            // Get data from hidden container
            const pengaduanData = JSON.parse(dataContainer.getAttribute('data-pengaduan'));
            const layananData = JSON.parse(dataContainer.getAttribute('data-layanan'));
            const instrukturData = JSON.parse(dataContainer.getAttribute('data-instruktur'));
            const oldJenisLayanan = dataContainer.getAttribute('data-old-jenis-layanan');
            const oldNamaKonselor = dataContainer.getAttribute('data-old-nama-konselor');

            function updateKorbanOptions() {
                const selectedPengaduanId = pengaduanSelect.value;
                
                // Reset korban dropdown
                korbanSelect.innerHTML = '<option value="">Pilih Korban</option>';
                korbanSelect.disabled = true;
                noKorbanMessage.style.display = 'none';

                if (selectedPengaduanId) {
                    // Cari pengaduan yang dipilih
                    const selectedPengaduan = pengaduanData.find(p => p.id == selectedPengaduanId);
                    
                    if (selectedPengaduan) {
                        if (selectedPengaduan.korban && selectedPengaduan.korban.length > 0) {
                            // Tambah semua korban untuk pengaduan ini
                            selectedPengaduan.korban.forEach(function(korban) {
                                const option = document.createElement('option');
                                option.value = korban.id;
                                option.textContent = korban.nama;
                                korbanSelect.appendChild(option);
                            });
                            korbanSelect.disabled = false;
                        } else {
                            // Tidak ada korban
                            noKorbanMessage.style.display = 'block';
                        }
                    }
                }
            }

            function updateNamaKonselorOptions() {
                const selectedLayanan = jenisLayananSelect.value;
                
                // Reset nama konselor dropdown
                namaKonselorSelect.innerHTML = '<option value="">Pilih Nama Konselor</option>';
                namaKonselorSelect.disabled = true;

                if (selectedLayanan) {
                    // Filter instruktur berdasarkan nama_layanan yang sama dengan jenis_layanan yang dipilih
                    const filteredInstrukturs = instrukturData.filter(function(instruktur) {
                        return instruktur.nama_layanan === selectedLayanan;
                    });

                    if (filteredInstrukturs.length > 0) {
                        // Tambah instruktur yang sesuai
                        filteredInstrukturs.forEach(function(instruktur) {
                            const option = document.createElement('option');
                            option.value = instruktur.nama;
                            option.textContent = instruktur.nama + ' - ' + instruktur.posisi;
                            
                            // Set selected if this is the old value
                            if (oldNamaKonselor && instruktur.nama === oldNamaKonselor) {
                                option.selected = true;
                            }
                            
                            namaKonselorSelect.appendChild(option);
                        });
                        namaKonselorSelect.disabled = false;
                    } else {
                        // Tidak ada instruktur untuk layanan ini
                        namaKonselorSelect.innerHTML = '<option value="">Tidak ada konselor untuk layanan ini</option>';
                    }
                }
            }

            pengaduanSelect.addEventListener('change', updateKorbanOptions);
            jenisLayananSelect.addEventListener('change', updateNamaKonselorOptions);

            // Initial call on page load
            updateKorbanOptions();
            updateNamaKonselorOptions();

            // Validasi form sebelum submit
            form.addEventListener('submit', function(e) {
                const korbanId = korbanSelect.value;
                const pengaduanId = pengaduanSelect.value;
                
                console.log('Form submission attempt:', {
                    pengaduan_id: pengaduanId,
                    korban_id: korbanId
                });

                if (!korbanId || !pengaduanId) {
                    e.preventDefault();
                    alert('Silakan pilih pengaduan dan korban terlebih dahulu');
                    
                    // Highlight field yang error
                    if (!pengaduanId) {
                        pengaduanSelect.classList.add('border-red-500');
                    }
                    if (!korbanId) {
                        korbanSelect.classList.add('border-red-500');
                    }
                    return false;
                }

                // Log final values sebelum submit
                console.log('Form submitted with:', {
                    pengaduan_id: pengaduanId,
                    korban_id: korbanId,
                    form_data: new FormData(form)
                });
            });

            // Tambahkan visual feedback saat input berubah
            pengaduanSelect.addEventListener('focus', function() {
                this.classList.remove('border-red-500');
            });
        });
    </script>
    @endpush
</x-app-layout>  --}}

@extends('template.main')

@section('content_template')
    <section class="bg-white p-6 rounded-md shadow">
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-600 font-semibold mb-4" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ url('/') }}" class="text-blue-600 hover:underline">Homepage</a></li>
                <li>/</li>
                <li><a href="#" class="text-blue-600 hover:underline">Layanan</a></li>
                <li>/</li>
                <li><a href="#" class="text-blue-600 hover:underline">Konseling</a></li>
                <li>/</li>
                <li class="text-gray-500">Buat Jadwal</li>
            </ol>
        </nav>

        <h2 class="font-bold text-lg mb-4 mt-10">Layanan Konseling Korban</h2>

        <div class="border border-gray-300 p-4 rounded-md space-y-2 bg-white">

            <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf

                <!-- ID Pengaduan -->
                <div>
                    <label class="block text-sm font-medium mb-1">ID Pengaduan</label>
                    <select name="pengaduan_id" class="w-full border rounded p-2" required>
                        <option value="">Pilih ID Pengaduan</option>
                    </select>
                </div>

                <!-- Nama Korban -->
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Korban</label>
                    <input type="text" class="w-full border rounded p-2" name="nama_korban"
                        value="{{ old('nama_korban') }}">
                </div>

                <!-- Tanggal Konseling -->
                <div>
                    <label class="block text-sm font-medium mb-1">Tanggal Konseling *</label>
                    <input type="date" name="tanggal" class="w-full border rounded p-2" required>
                </div>

                <!-- Waktu Konseling -->
                <div>
                    <label class="block text-sm font-medium mb-1">Waktu Konseling *</label>
                    <input type="time" name="waktu" class="w-full border rounded p-2" required>
                </div>

                <!-- Jenis Pelayanan -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-1">Jenis Pelayanan *</label>
                    <select name="jenis_pelayanan" class="w-full border rounded p-2" required>
                        <option value="">Pilih Jenis Pelayanan</option>
                        <option value="Asesmen Psikologis">Asesmen Psikologis</option>
                        <option value="Intervensi Psikologis">Intervensi Psikologis</option>
                    </select>
                </div>

                <!-- Tombol -->
                <div class="md:col-span-2 flex justify-center gap-2 mt-4">
                    <a href="{{ route('konseling.index') }}"
                        class="px-4 py-2 bg-blue-400 text-white rounded hover:bg-blue-400">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
