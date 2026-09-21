@extends('layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>{{ $absensi->siswa->name }}</h4>
            <p class="text-muted">{{ $absensi->siswa->kelas }}</p>
            <p>Tanggal: {{ \Carbon\Carbon::parse($absensi->tanggal)->format('d-m-Y') }}</p>
            <p>Status: <strong>{{ ucfirst($absensi->status) }}</strong></p>
            <p>Keterangan: {{ $absensi->keterangan ?? '__' }}</p>
        </div>
    </div>
    <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Kembali</a>
@endsection