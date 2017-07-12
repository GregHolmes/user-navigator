<style type="text/css">
    #map {
        height: 500px;
        width: 100%;
      }
    #center_loader
    {
        margin-left: 45%;
    }
    .hidden {
        display: none !important;
    }
</style>
<script src="<?php echo base_url(); ?>assets/vendors/bower_components/lightgallery/light-gallery/js/lightGallery.min.js"></script>

            <section id="content">
                <div class="container">

                    <!-- Basic -->
                    <div class="block-header">
                        <h2><legend> Search a place </legend></h2>
                        
                    </div>

                    <div class="row">                        
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bgm-cyan">
                                    <h2>Start typing</h2>

                                </div>
                                <div class="card-header">                                    
                                        <div class="col-lg-12">
                                            <div class="input-group fg-float col-lg-11">
                                                <div class="fg-line ">    
                                                    <input type="text" class="form-control input-lg" id="place-input" placeholder="">
                                                    <label class="fg-label">Location</label>
                                                </div>  
                                                <span class="input-group-addon last"><i class="zmdi "></i></span>                                       
                                            </div>
                                                  <button class="btn bgm-blue btn-float waves-effect"><i class="zmdi zmdi-mail-send"></i></button>                         
                                        </div> 
                                        <ul class="actions">
                                        </ul>
                                </div>

                                <div class="card-body card-padding">                                     
                                     <br/><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card" id="infoplace">
                                <div class="card-header">
                                    <h2>Place Information for <span class="place_name"></span></h2>
                                </div>
                                
                                <div class="card-body">
                                    <ul class="tab-nav tn-justified tn-icon" role="tablist">
                                        <li role="presentation" class="active">
                                            <a class="col-xs-4" href="#tab-1"  data-toggle="tab" >
                                                <i class="zmdi zmdi-pin icon-tab"></i>
                                            </a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a class="col-xs-4" href="#tab-2"  data-toggle="tab" >
                                                <i class="zmdi zmdi-home icon-tab"></i>
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
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix hidden-sm"></div>
                        <div class="col-lg-12">
                            <div class="dash-widgets" id="detailsplace">
                                <div class="row">

                                    <div class="col-md-6 col-sm-6">
                                        <div class="card profile-view">
                                            <div class="pv-header">
                                                <img class="pv-main lv-img" alt="" style="background: rgba(255, 255, 255, 0.52);width: 100px;  height: 100px;margin-left: -50px;">
                                            </div>
                                            
                                            <div class="pv-body">
                                                <h2 class="place_name">Place name</h2>                                                                                 
                                                <ul class="pv-contact">
                                                    
                                                </ul>
                                                
                                                <ul class="pv-follow">
                                                    <li><i class="zmdi zmdi-phone "> </i><span id = "place_phone"> Contact number</span></li>
                                                </ul>
                                                
                                                <a id="place_url" href="" target="_blank" class="pv-follow-btn">Visit Website</a>
                                            </div>
                                        </div>
                                    </div>                                                                
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="dash-widget-item bgm-lime">
                                            <div id="weather-widget"><div class="weather-status">77°F</div><ul class="weather-info"><li>Thodupuzha, KL</li><li class="currently">Haze</li></ul><div class="weather-icon wi-21"></div><div class="dash-widget-footer"><div class="weather-list tomorrow"><span class="weather-list-icon wi-34"></span><span>94/71</span><span>Partly Cloudy</span></div><div class="weather-list after-tomorrow"><span class="weather-list-icon wi-34"></span><span>94/72</span><span>Mostly Sunny</span></div></div></div>
                                        </div>
                                    </div>
            

                                </div>
                            </div>
                        </div>
                        <div class="clearfix hidden-sm"></div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="lv-img" src="<?php echo base_url(); ?>assets/img/profile-pics/5.jpg" alt="">
                                        </div>
                                        
                                        <div class="media-body m-t-5">
                                            <h2>Available images for <span class ="place_name"> this place</span></h2>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body card-padding">                                                                                 
                                    <div class="wall-img-preview lightbox clearfix" id="photo_area">                                        
                                        <div class="wip-item col-lg-6" id="view_button" data-src="<?php echo base_url(); ?>assets/img/gesture.png" style="position:relative;float: none;margin: 0 auto;margin-bottom: -20%;"> <img src="<?php echo base_url(); ?>assets/img/gesture.png" alt=""><button class="btn btn-danger btn-block">Open Photo Viewer</button></div>                                                                              
                                    </div>                                                                         
                                </div>                             
                            </div>

                        <div class="col-lg-12">
                              <div class="card blog-post" id="nearplace">
                                  <div class="bp-header">
                                      <img src="<?php echo base_url(); ?>assets/img/cal-header.jpg" alt="">
                                          
                                      <a href="#" class="bp-title">
                                          <h2>Places Near <span class="place_name">Origin Location</span></h2>
                                      </a>
                                  </div>
                                  
                                  <div class="p-20">
                                      <div class="card">
                                        <div class="listview">                                          
                                            <div class="lv-body">
                                              <div class="preloader pls-pink" id="center_loader">
                                                  <svg class="pl-circular" viewBox="25 25 50 50">
                                                      <circle class="plc-path" cx="50" cy="50" r="20" />
                                                  </svg>
                                              </div>    
                                              <div id="nearby_places" ></div>
                                                                                               
                                            </div>                                         
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            </div>                      
                    </div>                   
                </div>
            </section>
        </section>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Google Maps</h4>
                </div>
                <div class="modal-body">

                <iframe id="mapmodal" width="100%" height="400" frameborder="0" style="border:0" src="" allowfullscreen>
                </iframe>                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
        <script async defer src=
        "https://maps.googleapis.com/maps/api/js?key=AIzaSyCdk1XYllFRIzIRXuSZ9c_04kPV_ZfBJOg&signed_in=true&libraries=places&callback=initMap">
        </script> 

        <script type="text/javascript">
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                                        center: {lat: 9.9000, lng: 76.7170}, 
                                        zoom: 15,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                      });
            $("#view_button").hide();
            $("#center_loader").hide();
            function showmap(pid,lat,lng)
              {
                    var map = new google.maps.Map(document.getElementById('map'), {
                                        center: {lat: lat, lng: lng}, 
                                        zoom: 15,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                      });

                    var infowindow = new google.maps.InfoWindow();
                    var service = new google.maps.places.PlacesService(map);
                    $('.pic_list').remove();

                    service.getDetails({
                      placeId: pid
                    }, function(place, status) {
                      if (status === google.maps.places.PlacesServiceStatus.OK) {
                        var marker = new google.maps.Marker({
                          map: map,
                          position: place.geometry.location
                        });
                        map.setZoom(17);
                        console.log(place);
                        $(".place_name").html(place.name);
                        $(".lv-img").attr("src",place.icon);
                        $("#place_phone").html('');
                        $("#place_phone").html(place.international_phone_number);
                        $("#place_url").attr('href',place.website);
                        console.log(place.vicinity);

                        /*---------- FUNCTION GET WEATHER --------*/
                            weather(place.formatted_address);
                        /*----------------------------------------*/ 
                        
                        var photos = place.photos;
                        var limit = photos.length;
                        console.log(limit);

                        for(var i=0;i<limit;i++)
                            {
                                    var photoitem = photos[i].getUrl({'maxWidth': 500, 'maxHeight': 500});                                  
                                    $("#photo_area").append('<div class="wip-item pic_list" data-src="'+photoitem+'" style="background-image: url('+photoitem+');"><img src="'+photoitem+'" alt="'+place.name+'"></div>');
                            }   
                        $("#view_button").show();                     
                        
                        $("#info").html('<strong>Name : </strong>'+place.name+'<br><strong>Address : </strong>'+place.formatted_address+'<br> <strong> Rating : </strong>'+place.rating+'<br> <strong> Reviews : </strong>'+place.reviews+'<br><strong> Types : </strong>'+place.types);
                        google.maps.event.addListener(marker, 'click', function() {
                          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                            'Place ID: ' + place.place_id + '<br>' +
                            place.formatted_address +'<br><br><strong>'+place.types+ '</strong></div>');
                          infowindow.open(map, this);
                        });
                      }
                    });
              }

            function weather (vicinity) {
                    $(".todisplay").show();
                    if ($('#weather-widget')[0]) {
                        $.simpleWeather({
                            location: vicinity,
                            woeid: '',
                            unit: 'f',
                            success: function(weather) {
                                html = '<div class="weather-status">'+weather.temp+'&deg;'+weather.units.temp+'</div>';
                                html += '<ul class="weather-info"><li>'+weather.city+', '+weather.region+'</li>';
                                html += '<li class="currently">'+weather.currently+'</li></ul>';
                                html += '<div class="weather-icon wi-'+weather.code+'"></div>';
                                html += '<div class="dash-widget-footer"><div class="weather-list tomorrow">';
                                html += '<span class="weather-list-icon wi-'+weather.forecast[2].code+'"></span><span>'+weather.forecast[1].high+'/'+weather.forecast[1].low+'</span><span>'+weather.forecast[1].text+'</span>';
                                html += '</div>';
                                html += '<div class="weather-list after-tomorrow">';
                                html += '<span class="weather-list-icon wi-'+weather.forecast[2].code+'"></span><span>'+weather.forecast[2].high+'/'+weather.forecast[2].low+'</span><span>'+weather.forecast[2].text+'</span>';
                                html += '</div></div>';
                                $("#weather-widget").html(html);
                            },
                            error: function(error) {
                                $("#weather-widget").html('<p>'+error+'</p>');
                            }
                        });
                    }
                }

            function gcode(pid)
               {
                     var geocoder = new google.maps.Geocoder;                   
                     geocoder.geocode({'placeId': pid}, function(results, status) {
                     var lat = results[0].geometry.location.lat();
                     var lng = results[0].geometry.location.lng();
                     var cord = [lat,lng];

                     showmap(pid,lat,lng);
                     $("#center_loader").show();
                     //weather(pid);
                     console.log(lat+","+lng);
                     $.ajax({
                            type: 'GET',
                            url: '<?php echo base_url(); ?>/ajax/nearby?lat='+lat+'&lng='+lng,  
                            success: function(data){ 
                                var obj=jQuery.parseJSON(data);
                                if(obj.length!=0){                                  
                                    console.log(obj);
                                    $(".todisplay").show();
                                    $("#nearby_places").html('');
                                    $("#center_loader").hide("slow");
                                    for(var i=0;i<obj.length;i++){
                                      var d = '<a class="lv-item" id="openmodal" data-placeid="'+obj[i].place_id+'"> <div class="media"> <div class="pull-left"> <img class="lv-img-sm" src="'+obj[i].icon+'" alt=""> </div> <div class="media-body"> <div class="lv-title">'+obj[i].name+'</div> Coordinates <small class="lv-small">'+obj[i].geometry.location.lat+' and '+obj[i].geometry.location.lng+'</small> </div> </div> </a';
                                      $("#nearby_places").append(d);
                                    }
                                }
                                else
                                {
                                    $("#center_loader").hide("slow");                                    
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                alert('error: ' + textStatus + ': ' + errorThrown);
                            }
                        });                                       
                                                        
                     });                      
                }
                                

                var origin_input = document.getElementById('place-input');              
                var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
                origin_autocomplete.addListener('place_changed', function() {
                    var place = origin_autocomplete.getPlace();
                    if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                    }

                    // If the place has a geometry, store its place ID and route if we have
                    // the other place ID
                    origin_place_id = place.place_id;   
                    console.log(origin_place_id);
                    console.log(place.formatted_address);
                   // showmap(origin_place_id);
                      //$('#nearby_places').hide(); 
                     $('#status').show();
                     
                     weather(place.name);
                    gcode(origin_place_id);
                    $("#detailsplace").removeClass('hidden');
                    $("#infoplace").removeClass('hidden');
                    $("#nearplace").removeClass('hidden');   
                });

                                              
                      }

                                    
                      
              // COMMENT THIS TO ENABLE FORM SUBMIT
              $('form').submit(function(event) {

                      event.preventDefault();
                      return false;
                  })

                $(document).ready(function(){
                    //$("body").css("font-size", "200px");
                    $("#detailsplace").addClass('hidden');
                    $("#infoplace").addClass('hidden');
                    $("#nearplace").addClass('hidden');
                });

                </script>

<script type="text/javascript">

    var q = "https://www.google.com/maps/embed/v1/place?key=AIzaSyCdk1XYllFRIzIRXuSZ9c_04kPV_ZfBJOg&q=place_id:";
    
    $('body').on('click', '#openmodal', function (){   
        var place_id = $(this).attr('data-placeid');
        console.log(place_id);
        $("#mapmodal").attr("src",q+place_id);
        $("#myModal").modal();
        console.log(this);
    });
    
</script>
</body>
</html>