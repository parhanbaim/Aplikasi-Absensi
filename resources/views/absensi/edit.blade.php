@extends('layout')

@section('content')
    <h3>Edit Absensi</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('absensi.update', $absensi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="siswa_id" class="form-label">Pilih Siswa</label>
            <select id="siswa_id" name="siswa_id" class="form-select" required>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}" {{ old('siswa_id', $absensi->siswa_id) == $siswa->id ? 'selected' : '' }}>
                        {{ $siswa->name }} ({{ $siswa->kelas }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $absensi->tanggal) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                @foreach (['hadir', 'izin', 'sakit', 'alpha'] as $opsi)
                    <option value="{{ $opsi }}" {{ old('status', $absensi->status) == $opsi ? 'selected' : '' }}>
                        {{ ucfirst($opsi) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" rows="3" class="form-control">{{ old('keterangan', $absensi->keterangan) }}</textarea>
        </div>
        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
