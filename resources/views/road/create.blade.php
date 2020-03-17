@extends('layouts.layout')

@section('title','Pengaduan')
@section('judul','Ajukan Pengaduan')
@section('content')
<style>
    #mapPicker{
        height: 600px;
        width: 100%;
    }
</style>
<form enctype="multipart/form-data" action="/jalan" method="POST" class="form-group">
    @csrf
    <div class="form-body">

        <div class="form-label">
            <label for="nim">foto</label>
        </div>
        <input type="file" name="filename[]" class="form-control" required multiple="multiple">

        <br>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
            Select on Map
        </button>
        <br>
        <br>
        <div class="form-label">
            <label for="nim">Latitude</label>
        </div>
        <input id="latInput" type="text" class="form-control readonly" name="latitude"  required />

        <br>
        <div class="form-label">
            <label for="nim">Longitude</label>
        </div>
        <input id="lngInput" type="text" class="form-control readonly" name="longitude" required />

        <br>
        <div class="form-label">
            <label for="nim">Address</label>
        </div>
        <textarea id="addressInput" type="text" class="form-control readonly" name="address"  required></textarea>

        <br>
        <div class="form-label">
            <label for="nim">Deskripsi</label>
        </div>
        <textarea type="text" class="form-control" name="description" required></textarea>

        <br>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Set Lokasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="mapPicker"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="submitLatLng" class="btn btn-success" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script> 
    var map, infoWindow, geocoder;
    var latMap, lngMap;
    var markers=[];
    function initMap() {
        map = new google.maps.Map(document.getElementById('mapPicker'), {
            center: {lat:-8.672716, lang:115.226089},
            zoom: 13
        });
        geocoder = new google.maps.Geocoder();

        infoWindow = new google.maps.InfoWindow;
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
            }
        }
        // Try HTML5 geolocation.
        // if (navigator.geolocation) {
        //     navigator.geolocation.getCurrentPosition(function(position) {
        //     var pos = {
        //         lat: position.coords.latitude,
        //         lng: position.coords.longitude,
        //     };

        //     infoWindow.setPosition(pos);
        //     infoWindow.setContent("<i class='fa fa-user'></i> Posisi anda saat ini");
        //     infoWindow.open(map);
        //     map.setZoom(15);
        //     map.setCenter(pos);

        //     }, function() {
        //     handleLocationError(true, infoWindow, map.getCenter());
        //     });
        // } else {
        //     // Browser doesn't support Geolocation
        //     handleLocationError(false, infoWindow, map.getCenter());
        // }
        map.addListener('click',function(e){
            setMapOnAll(null);
            markers=[];
            latMap = e.latLng.lat();
            lngMap = e.latLng.lng();
            $('#latInput').val(latMap);
            $('#lngInput').val(lngMap);
            var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {lat: latMap, lng: lngMap}
            });
            markers.push(marker);         

            geocoder.geocode({
                    'latLng': e.latLng
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        console.log(results[0]);
                        $('#addressInput').val(results[0].formatted_address);
                    }
                }
            });

            marker.addListener('dragend', function(event){
                latMap = event.latLng.lat();
                lngMap = event.latLng.lng();
                $('#latInput').val(latMap);
                $('#lngInput').val(lngMap);
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        console.log(results[0]);
                        $('#addressInput').val(results[0].formatted_address);
                    }
                }
            });
            });
        })
    }

    $('#submitLatLng').on('click', function(){
        $('#latInput').val(latMap);
        $('#lngInput').val(lngMap);
        
    });

    // function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    // infoWindow.setPosition(pos);
    // infoWindow.setContent(browserHasGeolocation ?
    //                         'Error: The Geolocation service failed.' :
    //                         'Error: Your browser doesn\'t support geolocation.');
    // infoWindow.open(map);
    // }
    $(".readonly").keydown(function(e){
        e.preventDefault();
    });
</script>

@endsection