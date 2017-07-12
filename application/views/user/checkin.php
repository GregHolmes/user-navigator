<style type="text/css">
        #map {
        height: 500px;
        width: 100%;
      }
</style>



<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="" id="checkinform">  
                <div class="card wall-posting">
                    <div class="card-body card-padding">
                        <textarea name="story" class="wp-text f-20" data-auto-size="" value="" placeholder="Write Something..." required></textarea>                                                
                    </div>
                    
                    <ul class="list-unstyled clearfix wpb-actions ">
                        <li class="wpba-attrs col-lg-10">                         
                            <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                        <div class="fg-line">
                                                 <input name="checkinplace" class="form-control f-15" data-auto-size=""  id="place-input" value="" placeholder="Start typing your check-In place" required>
                                <input type="hidden" id="lat" value="" name="coord[]">
                                <input type="hidden" id="lng" value="" name="coord[]">
                                <input type="hidden" id="checkinplace_id" value="" name="checkinplace_id">

                                        </div>
                                    </div>
                           
                        </li>                                                
                    </ul>
                    <ul class="list-unstyled clearfix wpb-actions">                                        
                        <div class="btn-demo pull-right">                               
                                <button id="clear" type="reset" class="btn btn-danger waves-effect">Clear</button>
                                <button type="submit" class="btn btn-success waves-effect">Update</button>
                        </div>
                    </ul>
                </div>
                </form>
            </div>
            <div class="clearfix hidden-sm"></div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Place Information <span class="place_name"></span></h2>
                    </div>
                    
                    <div class="card-body">
                        <ul class="tab-nav tn-justified tn-icon" role="tablist">
                            <li role="presentation" class="active">
                                <a class="col-xs-4" href="#tab-1"  data-toggle="tab" >
                                    <i class="zmdi  zmdi-my-location icon-tab"></i>
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a class="col-xs-4" href="#tab-2"  data-toggle="tab" >
                                    <i class="zmdi  zmdi-pin-drop icon-tab"></i>
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a class="col-xs-4" href="#tab-3"  data-toggle="tab" >
                                    <i class="zmdi zmdi-star icon-tab"></i>
                                </a>
                            </li>
                        </ul>
                        
                        <div class="tab-content p-20">
                            <div role="tabpanel" class="tab-pane animated fadeIn active" id="tab-1">
                                <div id="map"></div>
                            </div>
                            
                            <div role="tabpanel" class="tab-pane animated fadeIn "  id="tab-2">
                            <h2>Other places near to you</h2>
                                <div class="listview" id="start_text"></div>
                            </div>
                            
                            <div role="tabpanel" class="tab-pane animated fadeIn " id="tab-3">
                                <div id="start_info">LOL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <script async defer src=
        "https://maps.googleapis.com/maps/api/js?key=KEY&signed_in=true&libraries=places&callback=initMap">
        </script> 

<script type="text/javascript">
    function initMap() {
    var map = new google.maps.Map(document
        .getElementById('map'), {
            zoom: 15,
            center: {
                lat: 9.9000,
                lng: 76.7170
            }, 
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    var geocoder = new google.maps.Geocoder();
    var contentString =
        '<h2>We detected this as your Location</h2><small>Drag and Drop to change location</small>';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                $("#lat").attr("value",position.coords.latitude);
                $("#lng").attr("value",position.coords.longitude);
                console.log(position);
                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    draggable: true,
                    title: 'Your Location'
                });
                geocoder.geocode({
                    'location': pos
                }, function(results, status) {
                    if (status === google.maps.GeocoderStatus
                        .OK) {
                        console.log(results);
                        for(var i=0;i<results.length;i++){
                                    $("#start_text").append('<a class="lv-item" href="widgets.html"> <div class="media"> <div class="pull-left"> <img class="lv-img-sm" src="<?php echo base_url(); ?>assets/img/checkin.png" alt=""> </div> <div class="media-body"> <div class="lv-title c-gray"><strong>'+results[i].formatted_address+'</strong></div><small class="lv-small c-lightgreen">'+results[i].types+'</small> </div> </div> </a>');
                                    //console.log(results[i].formatted_address);
                                    }
                        if (results[1]) {
                            infowindow.setContent(
                                '<h2>We detected this as your Location<small style="color:red"><br>Drag and Drop to change location</small></h2><br>' +
                                results[1].formatted_address
                            );
                            $("#checkin").html(
                                '<h2> Your current Location </h2><blockquote>' +
                                results[1].formatted_address +
                                '</blockquote>');
                            $("#place-input").attr("value",results[1].formatted_address);
                            $("#checkinplace_id").attr("value",results[1].place_id);
                        }
                    }
                });
                marker.addListener('click',
                    function() {
                        // 3 seconds after the center of the map has changed, pan back to the
                        // marker.
                        var pos = {
                            lat: this.position.lat(),
                            lng: this.position.lng()
                        };
                        geocoder.geocode({
                            'location': pos
                        }, function(results, status) {
                            if (status === google.maps.GeocoderStatus
                                .OK) {                                
                                if (results[1]) {                                  
                                    infowindow.setContent(
                                        '<h2>We detected this as your Location<small style="color:red"><br>Drag and Drop to change location</small></h2><br><blockquote style="color:green">' +
                                        results[1].formatted_address +
                                        '</blockquote><br><a class="btn btn-success" href="#">Save position</a>'
                                    );
                                    $("#checkin").html(
                                        '<h2 style="color:red"> Selected Location </h2><blockquote>' +
                                        results[1].formatted_address +
                                        '</blockquote>');
                                    console.log(results[1].formatted_address);
                                    // premarker.close();
                                    //newMarker(pos);
                                    infowindow.open(map,
                                        marker);
                                }
                            }
                        });
                    });
                //infoWindow.setPosition(pos);
                //infoWindow.setContent('Location found.');
                map.setCenter(pos);
            },
            function() {
                handleLocationError(true,
                    infoWindow, map.getCenter());
            });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow,
            map.getCenter());
    }

    function showmap(pid, lat, lng) {
        var map = new google.maps.Map(
            document.getElementById('map'), {
                center: {
                    lat: lat,
                    lng: lng
                },
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(
            map);
        service.getDetails({
            placeId: pid
        }, function(place, status) {
            if (status === google.maps.places.PlacesServiceStatus
                .OK) {
                var marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location
                });
            $('.place_name').html(place.name);
                map.setZoom(17);                                
                google.maps.event.addListener(
                    marker, 'click',
                    function() {
                       infowindow.setContent(
                                        '<h2>Set this as your Location<small style="color:red"><br>Drag and Drop to change location</small></h2><br><blockquote style="color:green">' +
                                        place.name +
                                        '</blockquote><br><a class="btn btn-success" href="#">Save position</a>'
                                    );
                                    $("#checkin").html(
                                        '<h2 style="color:red"> Selected Location </h2><blockquote>' +
                                        place.formatted_address +
                                        '</blockquote>');
                        infowindow.open(map, this);
                    });
            }
        });
    }

    function gcode(pid) {
        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({
            'placeId': pid
        }, function(results, status) {
            var lat = results[0].geometry.location
                .lat();
            var lng = results[0].geometry.location
                .lng();
            var cord = [lat, lng];
            $("#lat").attr("value",lat);
            $("#lng").attr("value",lng);
            $("#checkinplace_id").attr("value",results[0].place_id);

            console.log(results[0].place_id);
            showmap(pid, lat, lng);;
        });
    }
    var origin_input = document.getElementById(
        'place-input');
    var origin_autocomplete = new google.maps
        .places.Autocomplete(origin_input);
    origin_autocomplete.addListener(
        'place_changed',
        function() {
            var place = origin_autocomplete.getPlace();
            if (!place.geometry) {
                window.alert(
                    "Autocomplete's returned place contains no geometry"
                );
                return;
            }
            origin_place_id = place.place_id;
            gcode(origin_place_id);
        });
}

$( "#clear" ).click(function() {
  $("input").attr("value","");
});

$("#checkinform").submit(function(e) {

                var url = "<?php echo base_url(); ?>ajax/checkin";

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#checkinform").serialize(), 
                       success: function(data)
                       {                                
                                var nFrom = 'bottom';
                                var nAlign = 'left';
                                var nIcons = $(this).attr('data-icon');
                                var nType = data.status;
                                var nAnimIn = $(this).attr('data-animation-in');
                                var nAnimOut = $(this).attr('data-animation-out');
                                console.log(data);
                                
                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, data.message);
                                $( "#clear" ).click();
                       }
                     });

                e.preventDefault();
            });
</script>

 <script type="text/javascript">
           function notify(from, align, icon, type, animIn, animOut, msg){
                $.growl({
                    icon: icon,
                    title: '',
                    message: msg,
                    url: ''
                },{
                        element: 'body',
                        type: type,
                        allow_dismiss: true,
                        placement: {
                                from: from,
                                align: align
                        },
                        offset: {
                            x: 20,
                            y: 210
                        },
                        spacing: 10,
                        z_index: 1031,
                        delay: 2500,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: false,
                        animate: {
                                enter: animIn,
                                exit: animOut
                        },
                        icon_type: 'class',
                        template: '<div data-growl="container" class="alert" role="alert">' +
                                        '<button type="button" class="close" data-growl="dismiss">' +
                                            '<span aria-hidden="true">&times;</span>' +
                                            '<span class="sr-only">Close</span>' +
                                        '</button>' +
                                        '<span data-growl="icon"></span>' +
                                        '<span data-growl="title"></span>' +
                                        '<span data-growl="message"></span>' +
                                        '<a href="notification-dialog.html#" data-growl="url"></a>' +
                                    '</div>'
                });
            };            
</script>