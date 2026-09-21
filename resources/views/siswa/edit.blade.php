@extends('layout')

@section('content')
    <h3>Edit Siswa</h3>

    <form action="{{ route('siswa.update', $siswa) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $siswa->name) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $siswa->kelas) }}">
        </div>
        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection