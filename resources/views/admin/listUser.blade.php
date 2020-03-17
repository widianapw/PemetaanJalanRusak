@extends('layouts.layout')

@section('title','List User')
@section('judul','List User')
@section('content')
<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>No.</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Jumlah Pengaduan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->email }}</td>
                <td>{{$m->name}}</td>
                <td>{{$m->countPengaduan}}
                </td>
                <th>
                    <form action="/admin/updateStatus/{{$m->id}}" method="POST">
                        @method("PUT")
                        @csrf
                        @if($m->status == "0")
                        <button type="submit" class="btn btn-danger">
                            Suspend
                        </button>
                        @else
                        <button type="submit" class="btn btn-success">
                            Return
                        </button>
                        @endif
                    </form>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection