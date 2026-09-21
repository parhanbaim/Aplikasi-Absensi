@extends('layout')

@section('content')
    <h3>{{ $siswa->name }} <small class="text-muted">({{ $siswa->kelas }})</small></h3>
    <p>Riwayat Kehadiran:</p>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($absensis as $absensi)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}</td>
                    <td>
                        @php
                            $warna = match ($absensi->status) {
                                'hadir' => 'success',
                                'izin' => 'info',
                                'sakit' => 'warning',
                                'alpha' => 'danger',
                            };
                        @endphp
                        <span class="badge bg-{{ $warna }}">{{ ucfirst($absensi->status) }}</span>
                    </td>
                    <td>{{ $absensi->keterangan ?? '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="3">Belum ada riwayat absensi.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $absensis->links() }}
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection