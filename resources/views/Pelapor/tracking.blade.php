{{-- <!DOCTYPE html>
<html>
<head>
    <title>Tracking Pengaduan</title>
</head>
<body>
    <h1>Tracking Pengaduan</h1>
    
    @if (session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    <table border="1">
        <tr>
            <th>No. Pengaduan</th>
            <th>Tanggal</th>
            <th>Pelapor</th>
            <th>Korban</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @forelse($pengaduans as $pengaduan)
            <tr>
                <td>{{ $pengaduan->id }}</td>
                <td>{{ $pengaduan->created_at->format('d/m/Y') }}</td>
                <td>{{ $pengaduan->pelapor ? $pengaduan->pelapor->nama_pelapor : '-' }}</td>
                <td>{{ $pengaduan->korban && $pengaduan->korban->count() > 0 ? $pengaduan->korban->first()->nama : '-' }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $pengaduan->status)) }}</td>
                <td>
                    <a href="{{ route('pengaduan.show', $pengaduan->id) }}">Detail Pengaduan</a>
                    <a href="{{ route('tracking.show', $pengaduan->id) }}">Tracking</a>
                    @if (Auth::user()->role !== 'pelapor')
                        <a href="{{ route('staff.tracking.edit', $pengaduan->id) }}">Update Status</a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Tidak ada data pengaduan</td>
            </tr>
        @endforelse
    </table>
</body>
</html>  --}}

@extends('template.main')
@section('content_template')
    <section class="bg-white py-6 px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <nav class="text-sm text-gray-600 font-semibold" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ url('/') }}" class="text-blue-600 hover:underline">Homepage</a></li>
                    <li class="text-gray-600">/</li>
                    <li><a href="{{ route('tracking.index') }}" class="text-blue-600 hover:underline">Layanan</a></li>
                    <li class="text-gray-600">/</li>
                    <li class="text-gray-500">Track Pengaduan</li>
                </ol>
            </nav>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <!-- Tab -->
            <div class="mb-6">
                <button class="bg-blue-100 text-blue-700 px-4 py-2 rounded font-semibold shadow-sm cursor-default" disabled>
                    Laporan Pengaduan 1
                </button>
            </div>

            <!-- Tracking Content with Timeline -->
            <div>
                <div class="mb-4">
                    <span class="font-bold text-gray-800 text-base">Pengaduan Kasus - Aisya Fanani</span>
                </div>
                <div class="overflow-x-auto">
                    <div class="relative">
                        <table class="min-w-full text-sm">
                            <tbody>
                                @php
                                    $steps = [
                                        ['waktu' => '12 Februari<br>12.30', 'judul' => 'Laporan Pengaduan Masuk'],
                                        ['waktu' => '12 Februari<br>12.30', 'judul' => 'Laporan Pengaduan Diproses'],
                                        [
                                            'waktu' => '12 Februari<br>12.30',
                                            'judul' => 'Layanan Pendampingan Pengajuan Jadwal Dikirim',
                                        ],
                                        [
                                            'waktu' => '12 Februari<br>12.30',
                                            'judul' => 'Layanan Pendampingan Pengajuan Jadwal DItinjau',
                                        ],
                                        [
                                            'waktu' => '12 Februari<br>12.30',
                                            'judul' =>
                                                'Layanan Pendampingan Pengajuan Jadwal Disetujui<br><a href="#" class="text-blue-600 hover:underline text-xs">Lihat detail</a>',
                                        ],
                                        [
                                            'waktu' => '12 Februari<br>12.30',
                                            'judul' => 'Layanan Konseling Menerima Jadwal',
                                        ],
                                        [
                                            'waktu' => '12 Februari<br>12.30',
                                            'judul' =>
                                                'Layanan Konseling<br><span class="inline-flex items-center"><svg class="w-4 h-4 text-blue-600 mr-1" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="10"/></svg>Konfirmasi Jadwal Konseling Berhasil</span><br><a href="#" class="text-blue-600 hover:underline text-xs">Lihat detail</a>',
                                        ],
                                    ];
                                    // Ganti $currentStep ke step yang sedang diproses (0-based index)
                                    $currentStep = count($steps) - 1; // bulat biru di akhir saja
                                    $lastIndex = count($steps) - 1;
                                @endphp
                                @foreach ($steps as $i => $step)
                                    <tr>
                                        <td class="pr-6 py-2 text-gray-500 text-right align-top" style="width: 90px;">
                                            {!! $step['waktu'] !!}
                                        </td>
                                        <td class="relative py-2 align-top" style="width: 40px;">
                                            <div class="flex flex-col items-center h-full">
                                                <!-- Circle -->
                                                <span
                                                    class="w-4 h-4 rounded-full border-4 border-white shadow relative z-10
                                                        @if ($i == $currentStep) bg-blue-600
                                                        @elseif($i < $currentStep) bg-gray-300
                                                        @else bg-gray-100 @endif"></span>
                                                @if ($i < $lastIndex)
                                                    <!-- Vertical Line -->
                                                    <span class="block w-1"
                                                        style="
                                                            height: 36px;
                                                            margin-top: -2px;
                                                            margin-bottom: -2px;
                                                            background-color:
                                                                @if ($i < $currentStep) #d1d5db /* gray-300 */
                                                                @else #e5e7eb /* gray-100 */ @endif;
                                                        ">
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="py-2 text-gray-800 font-medium align-top">
                                            {!! $step['judul'] !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
