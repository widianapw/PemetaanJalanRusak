@extends('layout_new.maps')

@section('title','Map Jalan Rusak Pengaduan')
@section('judul','Map Jalan Rusak Pengaduan')

@section('content')
<style>
    #map {
        margin-top: -20px;
        height: 500px;
        width: auto;
    }
</style>
<input type="text" class="form-control" id="search" placeholder="Search..."><br><br>
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
            center: {lat: -8.672716,lng: 115.226089},
            zoom: 13,
            styles: styles['hide']
        });
        // if (navigator.geolocation) {
        //     navigator.geolocation.getCurrentPosition(function(position) {
        //     var pos = {
        //         lat: position.coords.latitude,
        //         lng: position.coords.longitude,
        //     };

        //     infoWindow.setPosition(pos);
        //     infoWindow.setContent("<i class='fa fa-user'></i> Posisi anda saat ini");
        //     infoWindow.open(map);
        //     map.setCenter(pos);

        //     }, function() {
        //     handleLocationError(true, infoWindow, map.getCenter());
        //     });
        // } else {
        //     // Browser doesn't support Geolocation
        //     handleLocationError(false, infoWindow, map.getCenter());
        // }
        
        var input = document.getElementById('search');
        var searchBox = new google.maps.places.SearchBox(input);
        geocoder = new google.maps.Geocoder();
        var markers=[];
        
        map.addListener('bounds_changed',function(){
            searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed',function(){
            var places = searchBox.getPlaces();

            if(places.length === 0)
                return;
            
            markers.forEach(function(m){
                m.setMap(null);
            });
            markers = [];

            var bounds = new google.maps.LatLngBounds();

            places.forEach(function(p){
                if(!p.geometry)
                    return;
                
                markers.push(new google.maps.Marker({
                    map :map,
                    title : p.name,
                    position: p.geometry.location
                }));

                if(p.geometry.viewport)
                    bounds.union(p.geometry.viewport);
                else
                    bounds.extend(p.geometry.location);
            });
            map.fitBounds(bounds);
        });


        infoWindow = new google.maps.InfoWindow;

        $.ajax({
            url: 'getJalanPengaduan',
            type: 'get',
            dataType: 'json',
            success: function(response){
                $.each(response, function(i, obj){
                    var poly = new google.maps.Polyline({
                        geodesic: true,
                        strokeColor: '#FF0000',
                        strokeOpacity: 1.0,
                        strokeWeight: 2
                    });
                    poly.setMap(map)
                    var path = [];
                    if(response[i].detail_digitasi.length>1){
                        var arr_coor = response[i].detail_digitasi;
                        $.each(arr_coor, function(j, obj){
                            path.push(new google.maps.LatLng(arr_coor[j].latitude, arr_coor[j].longitude));
                        });
                        poly.setPath(path);   
                    }
                    var detailMarker;
                    poly.addListener('click', function(e){
                        $.ajax({
                            url: 'getDetailJalanPengaduan/'+response[i].nama,
                            type: 'get',
                            dataType: 'json',
                            success: function(response1){
                                infoWindow.setPosition(e.latLng);
                                console.log(response[i].nama)
                                console.log(response1)
                                infoWindow.setContent("<div style='margin-bottom:-20px'><b>"+response[i].nama+"</b><br>jumlah Pengaduan: "+response1.jumlah+"</div>"
                                    +"<hr><div style='margin-top:-20px'><button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal' id='streetView'>Street View</button>"
                                    +"<button class='btn btn-success btn-sm' id='detailJalan'>Detail</button></div>");
                                infoWindow.open(map);
                                map.setZoom(18);
                                map.setCenter(e.latLng);
                                
                                $(document).on('click','#detailJalan',function(){
                                    window.location="detailJalan/"+response[i].nama;
                                });
                                detailMarker = response1.data;
                                $.each(detailMarker, function(k,obj2){
                                    console.log(detailMarker[k]);
                                    var marker = new google.maps.Marker({
                                        map: map,
                                        position: {lat: detailMarker[k].detail_coordinate[0].latitude, lng: detailMarker[k].detail_coordinate[0].longitude}
                                    });
                                    marker.addListener('click',function(a){
                                        infoWindow.setPosition(a.latLng)
                                        infoWindow.setContent("<div style='text-align:center; margin-bottom:-20px;'><img height='200px' alt='...' width = 'auto' src={{asset('images/small')}}/"+detailMarker[k].picture+"><br><br><b>Deskripsi : </b>"+detailMarker[k].description+"</div>"
                                        +"<hr><button style='margin-top:-20px' class='btn-success btn-block btn-sm' id='streetView1' data-toggle='modal' data-target='#myModal'>360 View</button>");
                                        infoWindow.setMap(map);
                                        $(document).on('click','#streetView1',function(){
                                            panoramaView(a.latLng);
                                        });
                                    });
                                });
                                $(document).on('click','#streetView',function(){
                                    panoramaView(e.latLng);
                                });
                                
                            }
                        });
                        
                    });

                    map.addListener('zoom_changed',function(){
                        if(map.getZoom() > 19){
                            poly.setOptions({strokeWeight:10, strokeOpacity:4.0});
                        }
                        else if(map.getZoom() > 16){
                            poly.setOptions({strokeWeight:5, strokeOpacity:2.0});
                        }
                        else{
                            poly.setOptions({strokeWeight:2, strokeOpacity:1.0});
                        }
                    });

                });
            }
        });

        
      }

      var styles = {
           hide : [
            {
                "featureType": "poi",
                "elementType": "labels",
                "stylers": [
                {
                    "visibility": "off"
                }
                ]
            },
           ]
       }

       function panoramaView(myLatLng){
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('pano'), {
                position: myLatLng,
                pov: {
                    heading: 240,
                    pitch: 0
                },
                visible: true
            });
       }
      
</script>

@endsection