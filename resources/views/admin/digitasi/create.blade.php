@extends('layout_new.maps')

@section('title','Tambah Jalan')
@section('judul','Tambah Jalan')
@section('content')
<style>
    #map {
        height: 700px;
        width: 100%;
    }
</style>
<input type="text" class="form-control" id="search" placeholder="Search..."><br>
<div id="map"></div>
<button type="submit" id="saveDatabase" class="btn btn-success btn-block mt-2"> Create</button>
@endsection

@section('javascript')
<script>
    var infoWindow, geocoder;
    var kecamatan, kota, jalan;
    var polys=[];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function initMap() {

        var sv = new google.maps.StreetViewService();
        var input = document.getElementById('search');
        var searchBox = new google.maps.places.SearchBox(input);
        geocoder = new google.maps.Geocoder();
        var markers=[];
        var map = new google.maps.Map(document.getElementById('map'), {
            disableDefaultUI: true,
            center: {lat:-8.672716, lng:115.226089},
            zoom: 13,
            styles : styles['hide'],
            mapTypeControl : false,
        });
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

        poly = new google.maps.Polyline({
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 5
            });
            poly.setMap(map);

        map.addListener('click', addLatLng);
        
        function addLatLng(event){
            var path = poly.getPath();

            // Because path is an MVCArray, we can simply append a new coordinate
            // and it will automatically appear.
            path.push(event.latLng);
            var posPoly = {
                lat: event.latLng.lat(),
                lng: event.latLng.lng()
            }
            // Add a new marker at the new plotted point on the polyline.
            var marker = new google.maps.Marker({
                position: event.latLng,
                title: '#' + path.getLength(),
                map: map,
                draggable:true
            });
            geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        console.log(results);
                        jalan = results[0].address_components[1].long_name;
                        kecamatan = results[0].address_components[3].long_name;
                        kota = results[0].address_components[4].long_name;
                    }
                }
            });
            polys.push(posPoly);
            console.log(polys);
        }
      }

      

      var styles = {
          hide:[
            {
                "featureType": "administrative",
                "elementType": "geometry",
                "stylers": [
                {
                    "visibility": "off"
                }
                ]
            },
            {
                "featureType": "poi",
                "stylers": [
                {
                    "visibility": "off"
                }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [
                {
                    "visibility": "off"
                }
                ]
            },
            {
                "featureType": "transit",
                "stylers": [
                {
                    "visibility": "off"
                }
                ]
            }
            ]
      }

      $('#saveDatabase').on('click', function(e){
        $.ajax({
            url: '/admin/digitasiJalan/',
            type: 'post',
            data: {"nama":jalan,"kecamatan":kecamatan,"kota":kota,"koordinat":polys},
            success: function(response){
                location.href="/admin/digitasiJalan/";
            }
        });

      });

</script>

@endsection