   <title>Intelli Nav</title>     
        <style type="text/css">
            .bs-item {
                background: #fff;
                margin-bottom: 30px;
                height: 100px;
                text-align: center;
                padding: 10px;
                font-size: 14px;
                border-radius: 2px;
            }
             #map {
                height: 500px;
                /*float: left;*/
                width: 100%;
              }
              #right-panel {
                height: 500px;
                overflow: scroll;
              }
              #center_loader_orig,#center_loader_dest
              {
                margin-left: 45%;
              }
              .media-object
              {
                width: 50px;
              }
        </style>
              
            <section id="content">
                <div class="container-fluid">
                    
                    <!-- Top & Bottom -->
                    <div class="m-b-30">
                        <div class="block-header">
                            <h2>Top & Bottom</h2>
                        </div>

                        <div class="col-lg-12">
                            <div class="bs-item z-depth-1" style="height:5%">
                            <br>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="input-group fg-float">
                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                            <div class="fg-line">
                                                <input type="text" id="origin-input" class="form-control input-lg" placeholder="">
                                                <label class="fg-label"><strong>Starting Location</strong></label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-5">
                                        <div class="input-group fg-float">
                                            <span class="input-group-addon last"><i class="zmdi zmdi-my-location"></i></span>
                                            <div class="fg-line">    
                                                <input type="text" id="destination-input" class="form-control input-lg" placeholder="">
                                                <label class="fg-label"><strong>Destination Location</strong></label>
                                            </div>                                                
                                        </div>
                                    </div>  
                                    <div class="col-lg-2">
                                      <div class="row">                                          
                                          <button class="btn bgm-green waves-effect" id="showcustom"><i class="zmdi zmdi-info-outline zmdi-hc-fw" ></i> View custom info</button>
                                      </div>
                                    </div>                                                                           
                                </div>
                            <br>
                            </div>
                        </div> 

                      <div class="col-lg-12">                         
                        <div class="row">

                            <div class="col-lg-8 col-lg-offset-2" id="mapview">
                                <div class="bs-item z-depth-1" style="height:520px">
                                    <div id="map"></div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4" id="routes">
                                <div class="bs-item z-depth-1" style="height:520px">
                                    <div id="right-panel">                                      
                                        <i class="fa fa-map-marker fa-2x"></i><strong> Total Distance: <span id="total"></span>                                      
                                    </div>
                                </div>
                            </div>
                        </div>                                                      
                      </div>
                      <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                              <div class="card">
                                <div class="card-header">
                                    <h2 class="text-center">Origin Location Reviews</h2>
                                    <ul class="actions">
                                        <li class="dropdown action-show">
                                            <a href="#" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                            
                                            <div class="dropdown-menu pull-right">
                                                <p class="p-20">
                                                    You can put anything here
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="card-body card-padding">  
                                  <br>                                                            
                                    <div class="media-demo" id="reviews_orig">   
                                      <div class="preloader pls-pink" id="center_loader_orig">
                                          <svg class="pl-circular" viewBox="25 25 50 50">
                                              <circle class="plc-path" cx="50" cy="50" r="20" />
                                          </svg>
                                      </div>                                                          
                                    </div>                                                                     
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="card">
                                <div class="card-header">
                                    <h2 class="text-center">Destination Location Reviews</h2>
                                    <ul class="actions">
                                        <li class="dropdown action-show">
                                            <a href="#" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                            
                                            <div class="dropdown-menu pull-right">
                                                <p class="p-20">
                                                    You can put anything here
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="card-body card-padding">  
                                  <br>                                                            
                                    <div class="media-demo" id="reviews_dest">   
                                      <div class="preloader pls-pink" id="center_loader_dest">
                                          <svg class="pl-circular" viewBox="25 25 50 50">
                                              <circle class="plc-path" cx="50" cy="50" r="20" />
                                          </svg>
                                      </div>                                                          
                                    </div>                                                                     
                                </div>
                              </div>
                            </div>
                            <div class="clearfix hidden-sm"></div>

                            <div class="col-lg-6">
                              <div class="card blog-post">
                                  <div class="bp-header">
                                      <img src="<?php echo base_url(); ?>assets/img/cal-header.jpg" alt="">
                                          
                                      <a href="#" class="bp-title">
                                          <h2>Places Near Origin Location</h2>
                                      </a>
                                  </div>
                                  
                                  <div class="p-20">
                                      <div class="card">
                                        <div class="listview">                                          
                                            <div class="lv-body">
                                              <div id="nearby_orig"></div>
                                                                                               
                                            </div>                                         
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="card blog-post">
                                  <div class="bp-header">
                                      <img src="<?php echo base_url(); ?>assets/img/cal-header.jpg" alt="">
                                          
                                      <a href="#" class="bp-title">
                                          <h2>Places Near Destination Location</h2>
                                      </a>
                                  </div>
                                  
                                  <div class="p-20">
                                    <div class="card">
                                      <div class="listview">                                          
                                          <div class="lv-body">
                                          <div id="nearby_dest"></div>                                                                                           
                                          </div>                                         
                                      </div>
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
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=KEY&signed_in=true&libraries=places&callback=initMap"></script> 
        <script type="text/javascript">        
            function initMap() {              
              var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 15,
              center: {lat: 9.9000, lng: 76.7170},  // INDIA. 21.0000° N, 78.0000° E
              mapTypeId: google.maps.MapTypeId.ROADMAP
              });
              $("#routes").hide();
              $("#center_loader_dest,#center_loader_orig").hide();

                  $("#showcustom").click(function() {

                      $.get("<?php echo base_url();?>ajax/getpolylines", function(data) {
                          var obj = jQuery.parseJSON(data);
                          addEncodedPaths(obj);
                      });


                      function addEncodedPaths(encodedPaths) {
                          console.log(encodedPaths);
                          for (var i = 0, n = encodedPaths.length; i < n; i++) {
                              addEncodedPath(encodedPaths[i]['encoded_path'], encodedPaths[i]['color'], encodedPaths[i]['weight'], encodedPaths[i]['title'], encodedPaths[i]['description'], encodedPaths[i]['alert'], encodedPaths[i]['dashed']);
                          }
                      }

                      function addEncodedPath(encodedPath, color, weight, name, desc, alert, dashed) {
                          var path = google.maps.geometry.encoding.decodePath(encodedPath);

                          var lineSymbol = {
                              path: 'M 0,-1 0,1',
                              strokeOpacity: 1,
                              scale: 4
                          };



                          //  console.log(path);
                          var polyline = new google.maps.Polyline({
                              path: path,
                              strokeColor: color,
                              strokeOpacity: dashed,
                              icons: [{
                                  icon: lineSymbol,
                                  offset: '0',
                                  repeat: '20px'
                              }],
                              strokeWeight: weight
                          });
                          polyline.setMap(map);
                          google.maps.event.addListener(polyline, 'click', function() {
                              var nFrom = 'bottom';
                              var nAlign = 'left';
                              var nIcons = $(this).attr('data-icon');
                              var nType = alert;
                              var nAnimIn = $(this).attr('data-animation-in');
                              var nAnimOut = $(this).attr('data-animation-out');
                              notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, desc);
                              $("#clear").click();
                          });
                      }


                      var prev_infowindow = false;

                      function map_marker(pos, MapTitle, MapDesc, InfoOpenDefault, DragAble, Removable, iconPath) {

                          //new marker
                          var marker = new google.maps.Marker({
                              position: pos,
                              map: map,
                              draggable: DragAble,
                              animation: google.maps.Animation.DROP,
                              title: MapTitle,
                              icon: iconPath
                          });
                          var contentString = $('<div class="">' +
                              '<div class="marker-inner-win"><span class="info-content">' +
                              '<h5 class="marker-heading">' + MapTitle + '</h5><blockquote>' +
                              MapDesc +
                              '</blockquote></span>' +
                              '</div></div>');
                          var infowindow = new google.maps.InfoWindow();
                          //set the content of infoWindow
                          infowindow.setContent(contentString[0]);
                          google.maps.event.addListener(marker, 'click', function() {
                              infowindow.open(map, marker); // click on marker opens info window 
                          });
                      }

                      $.get("<?php echo base_url();?>ajax/getMarkers", function(data) {
                          var obj = jQuery.parseJSON(data);
                          for (var i = 0; i < obj.length; i++) {
                              var name = obj[i].name;
                              var address = '<p>' + obj[i].info + '</p>';
                              var type = obj[i].type;
                              var icon = "<?php echo base_url(); ?>assets/img/map-icons/" + obj[i].type + ".png";
                              var point = new google.maps.LatLng(parseFloat(obj[i].lat), parseFloat(obj[i].lng));
                              map_marker(point, name, address, false, false, false, icon);
                          }
                      });

                  });
              function gcode(pid,target)
               {
                     var geocoder = new google.maps.Geocoder;                   
                     geocoder.geocode({'placeId': pid}, function(results, status) {
                     var lat = results[0].geometry.location.lat();
                     var lng = results[0].geometry.location.lng();
                     var cord = [lat,lng];
                     
                    
                      $.ajax({
                            type: 'GET',
                            url: '<?php echo base_url(); ?>/ajax/nearby?lat='+lat+'&lng='+lng,  
                            success: function(data){ 
                                var obj=jQuery.parseJSON(data);
                                if(obj.length!=0){                                  
                                    console.log(obj);
                                    $("#nearby_"+target).html('');
                                    $("#center_loader_"+target).hide("slow");
                                    for(var i=0;i<obj.length;i++){
                                      var d = '<a class="lv-item" href="#"> <div class="media"> <div class="pull-left"> <img class="lv-img-sm" src="'+obj[i].icon+'" alt=""> </div> <div class="media-body"> <div class="lv-title">'+obj[i].name+'</div> Coordinates <small class="lv-small">'+obj[i].geometry.location.lat+' and '+obj[i].geometry.location.lng+'</small> </div> </div> </a';
                                      $("#nearby_"+target).append(d);
                                    }
                                }
                                else
                                {
                                    $("#center_loader_"+target).hide("slow");
                                    $("#reviews_"+target).html('<blockquote class="text-danger">No reviews</blockquote>');
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                alert('error: ' + textStatus + ': ' + errorThrown);
                            }
                        });

                       $.ajax({
                            type: 'GET',
                            url: '<?php echo base_url(); ?>/ajax/review?lat='+lat+'&lng='+lng,  
                            success: function(data){ 
                               $("#reviews_"+target).html('');
                                var obj=jQuery.parseJSON(data);
                                if(obj.length!=0){                                  
                                    console.log(obj);
                                    $("#center_loader_"+target).hide("slow");
                                    for(var i=0;i<obj.length;i++){
                                      var date = new Date(obj[i].time);
                                      $("#reviews_"+target).append('<div class="media"><div class="pull-left"><a><img class="media-object img-rounded img-thumbnail" src="<?php echo base_url(); ?>uploads/dp/thumbs/200x200/'+obj[i].avatar+'" alt=""></a></div><div class="media-body"><h4 id="uid" class="media-heading"><strong>'+obj[i].full_name+' - <small>On '+date.toLocaleString("en-us", { month: "long" })+' '+date.getDate()+' '+date.getFullYear()+'</small></strong></h4><div id="review_data">'+obj[i].info+'</div></div></div>');
                                    }
                                }
                                else
                                {
                                    $("#center_loader_"+target).hide("slow");
                                    $("#reviews_"+target).html('<blockquote class="text-danger">No reviews</blockquote>');
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                alert('error: ' + textStatus + ': ' + errorThrown);
                            }
                        });
                                                                     
                     });     
                    
                }

              var directionsService = new google.maps.DirectionsService;
              var directionsDisplay = new google.maps.DirectionsRenderer({
              draggable: true,
              map: map,
              panel: document.getElementById('right-panel')
              });


              var origin_input = document.getElementById('origin-input');
              var destination_input = document.getElementById('destination-input');
              var modes = document.getElementById('mode-selector');
             
              var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
              origin_autocomplete.bindTo('bounds', map);
              var destination_autocomplete =
              new google.maps.places.Autocomplete(destination_input);
              destination_autocomplete.bindTo('bounds', map);

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
              $("#center_loader_orig").show();
              gcode(origin_place_id,'orig');
              });

              destination_autocomplete.addListener('place_changed', function() {
              var place = destination_autocomplete.getPlace();
              if (!place.geometry) {
              window.alert("Autocomplete's returned place contains no geometry");
              return;
              }
              // If the place has a geometry, store its place ID and route if we have
              // the other place ID
              destination_place_id = place.place_id;
              console.log(destination_place_id);
               
              $("#center_loader_dest").show();
              gcode(destination_place_id,'dest');

             $("#mapview").removeClass("col-lg-offset-2", 'slow');
        

              $("#routes").show("slow");
              displayRoute(origin_place_id, destination_place_id, directionsService,
              directionsDisplay);

              });


              directionsDisplay.addListener('directions_changed', function() {
              computeTotalDistance(directionsDisplay.getDirections());              
              });              
              }

              
              function displayRoute(origin, destination, service, display) {
              service.route({
              origin: {'placeId': origin_place_id},
              destination: {'placeId': destination_place_id},
              travelMode: google.maps.TravelMode.DRIVING,
              avoidTolls: true
              }, function(response, status) {
                if (status === google.maps.DirectionsStatus.OK) {
                    display.setDirections(response);
                } else {
                    alert('Could not display directions due to: ' + status);
                }
              });

              }

              function computeTotalDistance(result) {
              var total = 0;
              var myroute = result.routes[0];
              for (var i = 0; i < myroute.legs.length; i++) {
              total += myroute.legs[i].distance.value;
              }
              total = total / 1000;
              document.getElementById('total').innerHTML = total + ' km';
              }
              // COMMENT THIS TO ENABLE FORM SUBMIT
              $('form').submit(function(event) {
                  event.preventDefault();
                  return false;
              })


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
</script
        
    </body>
</html>