@extends('layout_new.maps')

@section('title','Digitasi Jalan')
@section('judul','Digitasi Jalan')
@section('content')
<a href="/admin/digitasiJalan/create"><button type="submit" class="btn btn-success">Tambahkan Digitasi</button></a>
<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Kecamatan</th>
                <th>Kota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->nama }}</td>
                <td>{{$m->kecamatan}}</td>
                <td>{{$m->kota}}
                </td>
                <td>
                    <form action="/admin/digitasiJalan/{{$m->id}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
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