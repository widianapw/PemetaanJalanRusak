@extends('layouts.layout')

@section('title','Beranda')
@section('judul','Beranda')
@section('content')
    <div style="text-align:center;">
        @guest
            <h4>Ajukan Pengaduan Jalan Rusak Pada Website ini dengan login terlebih dahulu</h4>
            <br>
            <a href="/login"><button class="btn-primary btn-lg">Get Started</button></a>
        @else
        @if(Auth::user()->user_role == "user")
            <h4>Selamat datang {{Auth::user()->name}} <br> 
                Ajukan Pengaduan Jalan Rusak Pada Website ini</h4>
            <br>
            <a href="/jalan/create"><button class="btn-primary btn-lg">Ajukan Pengaduan</button></a>
        @elseif(Auth::user()->user_role == "admin")
            <h4>Selamat datang {{Auth::user()->name}}</h4>
        @endif
        @endguest
        
    </div>
@endsection