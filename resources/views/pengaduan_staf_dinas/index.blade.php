@extends('template.main')

@section('content_template')
<section class="bg-white py-6 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 space-y-3 sm:space-y-0">
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-600 font-semibold" aria-label="Breadcrumb">
            <ol class="list-none flex flex-wrap items-center space-x-2">
                <li><a href="{{ url('/') }}" class="hover:underline text-blue-600 font-semibold">Homepage</a></li>
                <li class="text-gray-600 select-none font-semibold">/</li>
                <li><a href="#" class="hover:underline text-blue-600 font-semibold">Layanan</a></li>
                <li class="text-gray-600 select-none font-semibold">/</li>
                <li class="text-gray-500 font-semibold">Pengaduan Kasus</li>
            </ol>
        </nav>

        <!-- Tombol -->
        <button id="btnBuatPengaduan"
            class="bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
            + Buat Pengaduan
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3"><input type="checkbox" /></th>
                    <th class="px-4 py-3 text-left">ID Pengaduan</th>
                    <th class="px-4 py-3 text-left">Nama Korban</th>
                    <th class="px-4 py-3 text-left">Kecamatan</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Jenis Kasus</th>
                    <th class="px-4 py-3 text-left">Bentuk Kekerasan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-800">
                @php
                    $statuses = ['Diproses', 'Selesai', 'Ditolak', 'Diproses', 'Selesai', 'Selesai', 'Ditolak', 'Selesai', 'Selesai', 'Selesai'];
                @endphp
                @for ($i = 0; $i < 10; $i++)
                    @php
                        $status = $statuses[$i];
                        $badgeColor = match($status) {
                            'Diproses' => 'bg-yellow-400 text-white',
                            'Ditolak' => 'bg-red-600 text-white',
                            'Selesai' => 'bg-green-600 text-white',
                            default => 'bg-gray-300 text-black',
                        };
                    @endphp
                    <tr>
                        <td class="px-4 py-3"><input type="checkbox" /></td>
                        <td class="px-4 py-3">102387{{ $i }}</td>
                        <td class="px-4 py-3">Aisyah Nanda</td>
                        <td class="px-4 py-3">Bojongsoang</td>
                        <td class="px-4 py-3">12-02-2025</td>
                        <td class="px-4 py-3">Kekerasan terhadap perempuan</td>
                        <td class="px-4 py-3">Fisik</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badgeColor }}">
                                {{ $status }}
                            </span>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
        <div>Menampilkan 1 - 10 dari 50 entri</div>
        <div class="flex space-x-1">
            <button class="px-3 py-1 border rounded hover:bg-gray-100">&laquo;</button>
            @for ($p = 1; $p <= 5; $p++)
                <button
                    class="px-3 py-1 border rounded {{ $p === 2 ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">{{ $p }}</button>
            @endfor
            <button class="px-3 py-1 border rounded hover:bg-gray-100">&raquo;</button>
        </div>
    </div>
</section>
@endsection
