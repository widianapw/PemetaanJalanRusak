@extends('layout_new.maps')

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
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group">
                            @if($m->status == '0')
                                <a href="/jalan/{{$m->id}}/edit"><button type="submit" class="btn btn-warning"><i class="fa fa-fw fa-pen"></i></button></a>
                            @endif
                            <form action="/jalan/{{$m->id}}/" method="POST">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection