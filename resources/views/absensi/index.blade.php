@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Absensi</h3>
        <a href="{{ route('absensi.create') }}" class="btn btn-primary">+ Catat Absensi</a>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-auto">
            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-control">
        </div>
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">Semua Status</option>
                <option value="hadir" {{ request('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="izin" {{ request('status') == 'izin' ? 'selected' : '' }}>Izin</option>
                <option value="sakit" {{ request('status') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="alpha" {{ request('status') == 'alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-primary">Filter</button>
            <a href="{{ route('absensi.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Status</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($absensis as $absensi)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}</td>
                    <td>{{ $absensi->siswa->name }}</td>
                    <td>{{ $absensi->siswa->kelas }}</td>
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
                    <td>
                        <a href="{{ route('absensi.edit', $absensi) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form action="{{ route('absensi.destroy', $absensi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data absensi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $absensis->links() }}
@endsection