@extends('layout_new.maps')

@section('title','Map Jalan Rusak Diperbaiki')
@section('judul','Map Jalan Rusak Diperbaiki')

@section('content')
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
<input type="text" class="form-control" id="search" placeholder="Search..."><br>
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
            center: {lat:-8.796253, lang:115.176385},
            zoom: 14,
            styles: styles['hide']
        });
        var pos = {  
            lat: -8.672716,
            lng: 115.226089,
        };
        map.setZoom(13);
        map.setCenter(pos);
        
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
                        strokeColor: '#00FF00',
                        strokeOpacity: 2.0,
                        strokeWeight: 5
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

                    poly.addListener('click', function(e){
                        $.ajax({
                            url: 'getDetailJalanDiperbaiki/'+response[i].nama,
                            type: 'get',
                            dataType: 'json',
                            success: function(response1){
                                infoWindow.setPosition(e.latLng);
                                console.log(response1.jumlah)
                                infoWindow.setContent("<b>"+response[i].nama+"</b><br>jumlah Diperbaiki: "+response1.jumlah
                                    +"<hr><button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal' id='streetView'>Street View</button>"
                                    +"<button class='btn btn-success btn-sm' id='detailJalan'>Detail</button>");
                                infoWindow.open(map);
                                map.setZoom(15);
                                map.setCenter(e.latLng);
                                $(document).on('click','#detailJalan',function(){
                                    window.location="detailJalan/"+response[i].nama;
                                });
                                var detailMarker = response1.data;
                                $.each(detailMarker, function(k,obj2){
                                    var marker = new google.maps.Marker({
                                        map: map,
                                        position: {lat: detailMarker[k].detail_coordinate[0].latitude, lng: detailMarker[k].detail_coordinate[0].longitude}
                                    });
                                    marker.addListener('click',function(a){
                                        infoWindow.setPosition(a.latLng)
                                        infoWindow.setContent("<div style='text-align:center'><img height='100px' alt='...' width = 'auto' src={{asset('images/small')}}/"+detailMarker[i].picture+"></div>"
                                        +"<hr><button class='btn-success btn-block' id='streetView1' data-toggle='modal' data-target='#myModal'>360 View</button>");
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
       


      function fetch_data(query){
          $.ajax({
              url:'getSearchMapPengaduan',
              method: 'GET',
              data:{query:query},
              dataType:'json',
              success: function(data){
                  $('tbody').html(data.table_data);
                  $('#total_records').text(data.total_data);
              }
          })
      }
      
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