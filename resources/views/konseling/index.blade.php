@extends('template.main')
@section('content_template')
    <style>
        #btnBuatkonseling:disabled {
            background-color: #9ca3af;
            /* abu-abu */
            cursor: not-allowed;
            /* hapus efek hover supaya gak berubah warna */
        }

        #btnBuatkonseling:disabled:hover {
            background-color: #9ca3af;
        }
    </style>
    <section class="bg-white py-6 px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb dan Tombol dalam 1 baris -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-10 space-y-3 sm:space-y-0">
            <!-- Breadcrumb -->
            <nav class="text-sm text-gray-600 font-semibold" aria-label="Breadcrumb">
                <ol class="list-none flex flex-wrap items-center space-x-2">
                    <li>
                        <a href="{{ url('/') }}" class="hover:underline text-blue-600 font-semibold">Homepage</a>
                    </li>
                    <li class="text-gray-600 select-none font-semibold">/</li>
                    <li>
                        <a href="#" class="hover:underline text-blue-600 font-semibold">Layanan</a>
                    </li>
                    <li class="text-gray-600 select-none font-semibold">/</li>
                    <li class="text-gray-500 font-semibold">Konseling </li>
                </ol>
            </nav>


            <!-- Tombol -->
            <button id="btnBuatkonseling" onclick="tampilkanFormKonseling()"
                class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                + Ajukan Jadwal
            </button>
        </div>

        <!-- Konten Kosong -->
        @if (true)
            <section class="mt-10 px-4 sm:px-6 lg:px-8" id="index-konseling-kosong">
                <h3 class="font-bold text-gray-800 text-lg mb-6">Layanan konseling Korban</h3>

                <!-- Data 1: Konfirmasi -->
                <div class="bg-white relative p-4 border-t border-gray-300">
                    <!-- Tombol container: absolute di md ke atas, block di mobile -->
                    <div
                        class="absolute md:top-4 md:right-4 md:flex md:gap-2 right-0 top-0 w-full md:w-auto bg-white md:bg-transparent p-4 md:p-0 flex justify-center gap-2">
                        <button class="bg-gray-600 text-white text-sm font-semibold px-3 py-1 rounded hover:bg-gray-700"
                            onclick="kembaliKeKontenPenjadwalanMasuk();">Penjadwalan Masuk</button>
                        <button
                            class="bg-blue-500 text-white text-sm font-semibold px-3 py-1 rounded hover:bg-blue-600">Konfirmasi</button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-10 mt-12 md:mt-4">
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Jenis Pelayanan</label>
                            <p class="text-gray-700">konseling Layanan Kesehatan</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Catatan</label>
                            <p class="text-gray-700">-</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Tanggal konseling</label>
                            <p class="text-gray-700">15 - 02 - 2025</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Waktu konseling</label>
                            <p class="text-gray-700">09 : 00</p>
                        </div>
                    </div>
                </div>

                <!-- Data 2: Diproses -->
                <div class="bg-white relative p-4 border-t border-gray-300">
                    <!-- Badge container: absolute di md ke atas, block di mobile -->
                    <div
                        class="absolute md:top-4 md:right-4 right-0 top-0 w-full md:w-auto bg-white md:bg-transparent p-4 md:p-0 flex justify-center md:justify-end">
                        <span
                            class="bg-yellow-400 text-white text-sm font-semibold px-3 py-1 rounded inline-block whitespace-nowrap">Penjadwalan
                            Diproses</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-10 mt-12 md:mt-4">
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Jenis Pelayanan</label>
                            <p class="text-gray-700">konseling Layanan Kesehatan</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Catatan</label>
                            <p class="text-gray-700">-</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Tanggal konseling</label>
                            <p class="text-gray-700">15 - 02 - 2025</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Waktu konseling</label>
                            <p class="text-gray-700">09 : 00</p>
                        </div>
                    </div>
                </div>

                <!-- Data 3: Berhasil -->
                <div class="bg-white relative p-4 border-t border-gray-300">
                    <div
                        class="absolute md:top-4 md:right-4 right-0 top-0 w-full md:w-auto bg-white md:bg-transparent p-4 md:p-0 flex justify-center md:justify-end">
                        <span
                            class="bg-green-500 text-white text-sm font-semibold px-3 py-1 rounded inline-block whitespace-nowrap">Penjadwalan
                            Berhasil</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-10 mt-12 md:mt-4">
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Jenis Pelayanan</label>
                            <p class="text-gray-700">konseling Psikologis</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Catatan</label>
                            <p class="text-gray-700">Dilakukan secara daring.</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Tanggal konseling</label>
                            <p class="text-gray-700">10 - 02 - 2025</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Waktu konseling</label>
                            <p class="text-gray-700">14 : 00</p>
                        </div>
                    </div>
                </div>

                <!-- Data 4: Gagal -->
                <div class="bg-white relative p-4 border-t border-gray-300">
                    <div
                        class="absolute md:top-4 md:right-4 right-0 top-0 w-full md:w-auto bg-white md:bg-transparent p-4 md:p-0 flex justify-center md:justify-end">
                        <span
                            class="bg-red-500 text-white text-sm font-semibold px-3 py-1 rounded inline-block whitespace-nowrap">Penjadwalan
                            Gagal</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-10 mt-12 md:mt-4">
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Jenis Pelayanan</label>
                            <p class="text-gray-700">konseling Hukum</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Catatan</label>
                            <p class="text-gray-700">Pelapor tidak hadir.</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Tanggal konseling</label>
                            <p class="text-gray-700">12 - 02 - 2025</p>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Waktu konseling</label>
                            <p class="text-gray-700">10 : 00</p>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <div id="index-konseling-kosong" class="text-center py-16 text-gray-500 max-w-xl mx-auto">
                <p class="text-2xl font-semibold mb-2">Tidak Ada Jadwal konseling</p>
                <p class="text-base sm:text-lg">Anda belum mendapatkan penjadwalan konseling.</p>
            </div>
        @endif
        <section id="show-penjadwalan-masuk" class=" hidden bg-white py-6 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
                <h3 class="font-bold text-gray-800 text-lg mb-6">Layanan konseling Korban</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-10 mb-8">
                    <!-- Jenis konseling -->
                    <div>
                        <label class="block font-semibold text-gray-800 mb-1">Jenis konseling</label>
                        <p class="text-gray-700">konseling Layanan Kesehatan</p>
                    </div>

                    <!-- Catatan -->
                    <div>
                        <label class="block font-semibold text-gray-800 mb-1">Catatan</label>
                        <p class="text-gray-700">-</p>
                    </div>

                    <!-- Tanggal konseling -->
                    <div>
                        <label class="block font-semibold text-gray-800 mb-1">Tanggal konseling</label>
                        <p class="text-gray-700">15 - 02 - 2025</p>
                    </div>

                    <!-- Waktu konseling -->
                    <div>
                        <label class="block font-semibold text-gray-800 mb-1">Waktu konseling</label>
                        <p class="text-gray-700">09 : 00</p>
                    </div>
                </div>

                <hr class="mb-8">

                <!-- Tombol Konfirmasi -->
                <div class="flex justify-center gap-4">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition"
                        onclick="kembaliKeKontenkonseling();">
                        Konfirmasi Kehadiran
                    </button>
                    <button class="bg-blue-400 text-white px-6 py-2 rounded hover:bg-blue-500 transition"
                        onclick="kembaliKeKontenkonseling();">
                        Berhalangan Hadir
                    </button>
                </div>
            </div>
        </section>

    </section>
    
    <section id="form-layanan-konseling" class="hidden bg-white py-6 px-4 sm:px-6 lg:px-8">
        <main class="max-w-6xl mx-auto p-6 bg-white rounded-md">
            <h3 class="font-bold text-gray-800 text-lg mb-6">Layanan Konseling Korban</h3>

            <form class="space-y-10">
                <section>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Jenis konseling -->
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Jenis Pelayanan *</label>
                            <select
                                class="w-full bg-blue-50 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                                <option selected disabled hidden>Jenis Pelayanan</option>
                                <option value="hukum">konseling Hukum</option>
                                <option value="psikologis">konseling Psikologis</option>
                                <option value="medis">konseling Medis</option>
                            </select>
                        </div>

                        <!-- Catatan -->
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Catatan</label>
                            <input type="text" placeholder="Catatan"
                                class="w-full bg-blue-50 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none" />
                        </div>

                        <!-- Tanggal konseling -->
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Tanggal konseling *</label>
                            <input type="date"
                                class="w-full bg-blue-50 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none" />
                        </div>

                        <!-- Waktu konseling -->
                        <div>
                            <label class="block font-semibold text-gray-800 mb-1">Waktu konseling *</label>
                            <select
                                class="w-full bg-blue-50 text-gray-800 px-4 py-2 border-b border-gray-300 focus:outline-none">
                                <option selected disabled hidden>- - : - -</option>
                                @for ($i = 8; $i <= 17; $i++)
                                    @php
                                        $formattedTime = sprintf('%02d:00', $i);
                                    @endphp
                                    <option value="{{ $formattedTime }}">{{ $formattedTime }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>
                </section>

                <!-- Tombol Aksi -->
                <div class="flex justify-center mt-6 gap-4">
                    <button type="button" onclick="kembaliKeKontenkonselingKosong()"
                        class="bg-blue-400 text-white px-6 py-2 rounded hover:bg-blue-500 transition">Batal</button>
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">Simpan</button>
                </div>
            </form>
        </main>
    </section>

    <script>
        function tampilkanFormKonseling() {
            document.getElementById('index-konseling-kosong').classList.add('hidden');
            document.getElementById('form-layanan-konseling').classList.remove('hidden');
            const btn = document.getElementById('btnBuatkonseling');
            btn.disabled = true; // disable tombol sebenarnya
        }


        function kembaliKeKontenkonselingKosong() {
            document.getElementById('form-layanan-konseling').classList.add('hidden');
            document.getElementById('index-konseling-kosong').classList.remove('hidden');
            const btn = document.getElementById('btnBuatkonseling');
            btn.disabled = false; // enable tombol kembali
        }

        function kembaliKeKontenPenjadwalanMasuk() {
            document.getElementById('form-layanan-konseling').classList.add('hidden');
            document.getElementById('index-konseling-kosong').classList.add('hidden');
            document.getElementById('show-penjadwalan-masuk').classList.remove('hidden');
            const btn = document.getElementById('btnBuatkonseling');
            btn.disabled = true; // enable tombol kembali
        }

        function kembaliKeKontenPenjadwalanMasuk() {
            document.getElementById('form-layanan-konseling').classList.add('hidden');
            document.getElementById('index-konseling-kosong').classList.add('hidden');
            document.getElementById('show-penjadwalan-masuk').classList.remove('hidden');
            const btn = document.getElementById('btnBuatkonseling');
            btn.disabled = true; // enable tombol kembali
        }

        function kembaliKeKontenkonseling() {
            document.getElementById('index-konseling-kosong').classList.remove('hidden');
            document.getElementById('show-penjadwalan-masuk').classList.add('hidden');
            const btn = document.getElementById('btnBuatkonseling');
            btn.disabled = false; // enable tombol kembali
        }
    </script>
@endsection
