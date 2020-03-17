@extends('layouts.layout')

@section('title','Riwayat Pengaduan')
@section('judul','Riwayat Pengaduan')
@section('content')
<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>No.</th>
                <th>Alamat</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Tanggal Pengaduan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->address }}</td>
                <td>{{$m->description}}</td>
                <td>
                    @if($m->status == '0')
                        Belum Diverifikasi
                    @elseif($m->status == '1')
                        Sudah Diverifikasi
                    @else
                        Sudah Diperbaiki
                    @endif
                </td>
                <th>{{$m->created_at}}</th>
                <td>
                    <form action="/jalan/{{$m->id}}/" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-fw fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection