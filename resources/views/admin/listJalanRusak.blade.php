@extends('layouts.layout')

@section('title','List Pengaduan')
@section('judul','List Pengaduan')
@section('content')
<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>No.</th>
                <th>Alamat</th>
                <th>Deskripsi</th>
                <th>Status</th>
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
                <th>
                    <button class="btn-primary" data-toggle="modal" data-target="#myModal">Ubah Status</button>
                </th>
            </tr>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
            
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Ubah Status</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
            
                        <!-- Modal body -->
                        <form action="/jalan/{{$m->id}}" method="POST" class="form-group">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                        
                            <p>Status:</p>
                            <select name="status" class="form-control">
                                <option value="0">Belum Diverifikasi</option>
                                <option value="1">Sudah Diverifikasi</option>
                                <option value="2">Sudah Diperbaiki</option>
                            </select>
                        
                        </div>
            
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" >Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

@endsection