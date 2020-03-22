@extends('layouts.layoutMap')

@section('title','Map Jalan Rusak Diperbaiki')
@section('judul','Map Jalan Rusak Diperbaiki')
@section('content')
<input type="text" id="search" class="form-control" placeholder="Search...">
<hr>
<div style="display:none" id="searchBox" class="table-responsive table-borderless">
    <h4>Total Data : <span id="total_records"></span></h4>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Alamat</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
@endsection
@section('content1')
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
<div id="map"></div>
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
    var map, infoWindow;
      function initMap() {
        var sv = new google.maps.StreetViewService();
        
        map = new google.maps.Map(document.getElementById('map'), {
            disableDefaultUI: true,
            center: {lat:-8.672716, lang:115.226089},
            zoom: 13,
            styles : styles['hide'],
            mapTypeControl : false,
        });
        var pos = {  
            lat: -8.672716,
            lng: 115.226089,
        };
        map.setZoom(15);
        map.setCenter(pos);

        

        infoWindow = new google.maps.InfoWindow;
        // if (navigator.geolocation) {
        //   navigator.geolocation.getCurrentPosition(function(position) {
        //     console.log(position.coords.longitude);
        //     var pos = {
            
        //       lat: position.coords.latitude,
        //       lng: position.coords.longitude,
        //     };

        //     infoWindow.setPosition(pos);
        //     infoWindow.setContent("<i class='fa fa-user'></i> Posisi anda saat ini");
        //     infoWindow.open(map);
        //     map.setZoom(15);
        //     map.setCenter(pos);

        //   }, function() {
        //     handleLocationError(true, infoWindow, map.getCenter());
        //   });
        // } else {
        //   // Browser doesn't support Geolocation
        //   handleLocationError(false, infoWindow, map.getCenter());
        // }

        $.ajax({
            url: 'getJalanDiperbaiki',
            type: 'get',
            dataType: 'json',
            success: function(response){
                
                $.each(response, function(i, obj){
                    var poly = new google.maps.Polyline({
                        geodesic: true,
                        strokeColor: '#FF0000',
                        strokeOpacity: 1.0,
                        strokeWeight: 5
                    });
                    poly.setMap(map)
                    var path = [];
                    if(response[i].detail_coordinate.length>1){
                        var arr_coor = response[i].detail_coordinate;
                        $.each(arr_coor, function(j, obj){
                            path.push(new google.maps.LatLng(arr_coor[j].latitude, arr_coor[j].longitude));
                        });
                        poly.setPath(path);
                        
                    }
                    
                    marker = new google.maps.Marker({
                        map: map,
                        position: {lat: response[i].detail_coordinate[0].latitude, lng: response[i].detail_coordinate[0].longitude},
                        icon: {
                            url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
                        }
                    });  
                    var pos = {
                        lat: response[i].detail_coordinate[0].latitude,
                        lng: response[i].detail_coordinate[0].longitude
                    };
                    poly.addListener('click', function(e){
                        console.log(response[i].picture);
                        infoWindow.setPosition(pos)
                        infoWindow.setContent("<div style='text-align:center'><img height='100px' alt='...' width = 'auto' src={{asset('images/small')}}/"+response[i].picture+"></div>"+
                        "<b>alamat : </b>"+ response[i].address
                        +"<br><br><b>Deskripsi : </b>"+ response[i].description
                        +"<br><hr><button class='btn-success btn-block' id='streetView' data-toggle='modal' data-target='#myModal'>360 View</button>");
                        infoWindow.open(map);
                        $('#streetView').on('click',function(e){
                            var panorama = new google.maps.StreetViewPanorama(
                                document.getElementById('pano'), {
                                position: pos,
                                pov: {
                                    heading: 240,
                                    pitch: 0
                                },
                            });
                            
                        });
                    });

                    marker.addListener('click', function(e){
                        infoWindow.setPosition(pos)
                        infoWindow.setContent("<div style='text-align:center'><img height='100px' alt='...' width = 'auto' src={{asset('images/small')}}/"+response[i].picture+"></div>"+
                        "<b>alamat : </b>"+ response[i].address
                        +"<br><br><b>Deskripsi : </b>"+ response[i].description
                        +"<br><hr><button class='btn-success btn-block' id='streetView' data-toggle='modal' data-target='#myModal'>360 View</button>");
                        infoWindow.open(map);
                        $('#streetView').on('click',function(e){
                            var panorama = new google.maps.StreetViewPanorama(
                                document.getElementById('pano'), {
                                position: {lat: response[i].latitude, lng: response[i].longitude},
                                pov: {
                                    heading: 240,
                                    pitch: 0
                                },
                                visible: true
                            });
                            
                        });
                    });
                });
            }
        });
      }

      var styles= {
            hide:[
                {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [
                    {
                        "visibility": "off"
                    }
                    ]
                },
//                 {
            //     "elementType": "labels",
            //     "stylers": [
            //       {
            //         "visibility": "off"
            //       }
            //     ]
            //   },
                // {
                //     "featureType": "administrative.land_parcel",
                //     "elementType": "labels",
                //     "stylers": [
                //     {
                //         "visibility": "off"
                //     }
                //     ]
                // },
                // {
                //     "featureType": "road.local",
                //     "elementType": "labels",
                //     "stylers": [
                //     {
                //         "visibility": "off"
                //     }
                //     ]
                // }
                ]
        }

    //   function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    //     infoWindow.setPosition(pos);
    //     infoWindow.setContent(browserHasGeolocation ?
    //                           'Error: The Geolocation service failed.' :
    //                           'Error: Your browser doesn\'t support geolocation.');
    //     infoWindow.open(map);
    //   }

      function fetch_data(query){
          $.ajax({
              url:'getSearchMapDiperbaiki',
              method: 'GET',
              data:{query:query},
              dataType:'json',
              success: function(data){
                  $('tbody').html(data.table_data);
                  $('#total_records').text(data.total_data);
              }
          })
      }
    //   $('#searchBox').hide();
      $('#search').on('keyup',function(){
        $('#searchBox').show();
        var query = $(this).val();
        if(!this.value){
            $('#searchBox').hide();
        }
        fetch_data(query);
      });

</script>

@endsection