@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Siswa</h3>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">+ Tambah Siswa</a>
    </div>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kelas</th>
                <th width="220">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>
                        <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-outline-info">Detail</a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data siswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection