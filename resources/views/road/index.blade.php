@extends('layouts.layout')

@section('title','Detail Jalan')
@section('judul','Detail Jalan')
@section('content')
<h3>{{$dataJalanPengaduan[0]->jalan}},{{$dataJalanPengaduan[0]->kecamatan}},{{$dataJalanPengaduan[0]->kota}}</h3>

<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Pengaduan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Diverifikasi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Diperbaiki</a>
    </li>
  </ul>
  
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane container active" id="home">
        <br>
        <h3>Total Pengaduan: {{$dataCountPengaduan}}</h3>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataJalanPengaduan as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="#" class="pop" id="{{asset('images/small')}}/{{$m->picture}}"><img id="imageresource" height="80" src="{{asset('images/small')}}/{{$m->picture}}"></a></td>
                        <td>{{$m->address}}</td>
                        <td>{{$m->description}}
                        </td>
                        <th>{{$m->created_at}}</th>
                        <td>
                            
                            <button data-toggle='modal' data-target='#myModal' data-lat="" id="streetView" class="btn btn-primary">
                                Street View
                            </button>
                        </td>
                        
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade" id="menu1">
        <br>
        <h3>Total Diverifikasi: {{$dataCountDiverifikasi}}</h3>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Diverifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataJalanDiverifikasi as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="#" class="pop" id="{{asset('images/small')}}/{{$m->picture}}"><img id="imageresource" height="80" src="{{asset('images/small')}}/{{$m->picture}}"></a></td>
                        <td>{{$m->address}}</td>
                        <td>{{$m->description}}
                        </td>
                        <th>{{$m->updated_at}}</th>
                        <td>
                            {{-- {{$m->detail_coordinate["0"]->latitude}} --}}
                            <button data-toggle='modal' data-target='#myModal' data-lat="" id="streetView" class="btn btn-primary">
                                Street View
                            </button>
                        </td>
                        
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade" id="menu2">
        <br>
        <h3>Total Diperbaiki: {{$dataCountDiperbaiki}}</h3>
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Diperbaiki</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataJalanDiperbaiki as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="#" class="pop" id="{{asset('images/small')}}/{{$m->picture}}"><img id="imageresource" height="80" src="{{asset('images/small')}}/{{$m->picture}}"></a></td>
                        <td>{{$m->address}}</td>
                        <td>{{$m->description}}
                        </td>
                        <th>{{$m->updated_at}}</th>
                        <td>
                            {{-- {{$m->detail_coordinate["0"]->latitude}} --}}
                            <button data-toggle='modal' data-target='#myModal' data-lat="" id="streetView" class="btn btn-primary">
                                Street View
                            </button>
                        </td>
                        
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>


<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          
        </div>
        <div class="modal-body" style="text-align:center">
          <img src="" id="imagepreview" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Street Map</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="pano" style="height:300px; width:100%;"></div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $(".pop").on("click", function() {
        var foto = $(this).attr('id');
        $('#imagemodal').modal('show');
        $('#imagepreview').attr('src', foto);
    });

    $('#streetView').on('click',function(e){
        var latitude = $(this).attr('data-lat');
        console.log("data"+latitude);
        // var panorama = new google.maps.StreetViewPanorama(
        //     document.getElementById('pano'), {
        //     position: {lat: response[i].latitude, lng: response[i].longitude},
        //     pov: {
        //         heading: 240,
        //         pitch: 0
        //     },
        //     visible: true
        // });
        
    });

</script>

@endsection