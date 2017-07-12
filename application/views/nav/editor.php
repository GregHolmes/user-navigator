<style type="text/css">
    #map 
    {
        height: 500px;
        width: 100%;
      }
      #center_loader
      {
        margin-left: 45%;
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
                            <div class="card" id="reviewcard">
                                <div class="card-header">
                                    <h2>Add a review</h2>
                                </div>
                                <form id="reviewform" method="POST">
                                <div class="card-body card-padding">                                    
                                    <div class="form-group">
                                        <div class="fg-line">
                                            <textarea class="form-control input-lg" name="review" rows="3" placeholder="Tell others something about this place" required></textarea>   
                                            <input name="lat" type="hidden" id="lat" required>
                                            <input name="lng" type="hidden" id="lng" required>
                                        </div><br/><br/>
                                        <div class="btn-demo pull-right">
                                            <button type="submit" class="btn btn-success waves-effect">Save</button>
                                            <button id="clear" type="reset" class="btn btn-danger waves-effect">Clear</button>
                                        </div>
                                        <br/>
                                    </div>                                    
                                </div>
                                </form>
                            </div>
                        </div>                                            
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Place Information <span class="place_name"></span></h2>
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
                                        
                                        <div role="tabpanel" class="tab-pane animated fadeIn "  id="tab-2">
                                            <div id="start_text"><h2>Start typing </h2></div>
                                        </div>
                                        
                                        <div role="tabpanel" class="tab-pane animated fadeIn " id="tab-3">
                                            <div id="start_info">LOL</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix hidden-sm"></div>
                        <div class="col-lg-12">
                            <div class="dash-widgets">
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
                            <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">          
                                  <form id="savepath" class="form-horizontal" method="POST">
                                    <div class="modal-content">
                                      <div class="modal-header btn-primary">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h2 class="text-center"  id="myModalLabel">Save Path</h2>
                                      </div>
                                      <div class="modal-body">                
                                        <!-- Select Destinataire -->
                                        <h1 class="text-success text-center" id="response"></h1>               
                                        <div class="control-group">
                                          <input name="encoded_path" type="hidden" id="encoded" value="" class="form-control"></p>
                                        </div>
                                        <br />
                                        <div class="control-group">
                                          <label for="type">Type</label>
                                          <select id="type"class="form-control" name="type" required>
                                            <option value="accprone" >Accident Prone Area</option>
                                            <option value="traffic" >Traffic Block Area</option>
                                            <option value="unmetalled" >Unmetalled Path</option>
                                            <option value="hairpin" >Hairpin Curve</option>
                                            <option value="t1" >Case 1</option>
                                            <option value="t2" >Case 2</option>
                                          </select>
                                        </div>
                                        <br />
                                        <!-- input Sujet -->
                                        <div class="control-group">
                                          <label for="title">Title</label>
                                          <input name="title" type="text" class="form-control" required>
                                        </div>
                                        <br />
                                        <!-- TextArea Message -->
                                        <div class="control-group">
                                          <label for="description">Description</label>
                                          <textarea id="desc" name="description" class="form-control" rows="5" required></textarea>
                                        </div>
                                        <br />
                                      </div>
                                      <div class="modal-footer">
                                        <div class="text-center">
                                          <button type="submit" id="save_button" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Save</button>
                                          <button class="btn btn-default" id="reset" type="reset">Reset Button</button>
                                        </div>
                                      </div>
                                    </div>
                                  </form>    
                                </div>
                            </div>
                        
                                                          
                    </div>                   
                </div>
            </section>
        </section>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=KEY&signed_in=true&libraries=geometry,places,drawing&callback=initMap">

        </script> 

<script type="text/javascript">

function initMap() {

    $("#reviewcard").hide();

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 9.9000,
            lng: 76.7170
        },
        zoom: 15,
    });

 

    $.get("<?php echo base_url();?>ajax/getpolylines", function(data) {
        var obj=jQuery.parseJSON(data);                 
            addEncodedPaths(obj);        
    });


    function addEncodedPaths(encodedPaths) {
        console.log(encodedPaths);
        for (var i = 0, n = encodedPaths.length; i < n; i++) {            
            addEncodedPath(encodedPaths[i]['encoded_path'], encodedPaths[i]['color'], encodedPaths[i]['weight'],encodedPaths[i]['title'],encodedPaths[i]['description'],encodedPaths[i]['alert'],encodedPaths[i]['dashed']);
        } 
    }

    function addEncodedPath(encodedPath, color, weight,name,desc,alert,dashed) {
        // console.log(encodedPath);
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
            $( "#clear" ).click();
        });
    }
        

    var prev_infowindow =false; 

    var origin_input = document.getElementById('place-input');              
    var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
        origin_autocomplete.addListener('place_changed', function() {
                    var place = origin_autocomplete.getPlace();
                    if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                    }
                    
                    origin_place_id = place.place_id;   
                    console.log(origin_place_id);
                    console.log(place.formatted_address);                                    
                    gcode(origin_place_id);
                });


    function gcode(pid)
               {
                     var geocoder = new google.maps.Geocoder;                   
                     geocoder.geocode({'placeId': pid}, function(results, status) {
                     var lat = results[0].geometry.location.lat();
                     var lng = results[0].geometry.location.lng();
                     var cord = [lat,lng];
                     showmap(pid,lat,lng);    
                     $("#lat").attr("value",lat);
                     $("#lng").attr("value",lng);                 
                     $("#reviewcard").show("slow");
                     });                      
                }
    function showmap(pid,lat,lng)
              {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                                    center: {lat: lat, lng: lng}, 
                                                    zoom: 15,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                  });
                                var drawingManager = new google.maps.drawing.DrawingManager({
                                                        drawingControl: true,
                                                        drawingControlOptions: {
                                                            position: google.maps.ControlPosition.TOP_LEFT,
                                                            drawingModes: [
                                                                google.maps.drawing.OverlayType.MARKER,
                                                                google.maps.drawing.OverlayType.CIRCLE,
                                                                google.maps.drawing.OverlayType.POLYGON,
                                                                google.maps.drawing.OverlayType.POLYLINE,
                                                                google.maps.drawing.OverlayType.RECTANGLE
                                                            ]
                                                        },
                                                        // markerOptions: {icon: 'images/beachflag.png'},
                                                        circleOptions: {
                                                            fillColor: '#ffff00',
                                                            fillOpacity: 1,
                                                            strokeWeight: 5,
                                                            clickable: false,
                                                            editable: true,
                                                            zIndex: 1
                                                        }
                                                    });
                                                    drawingManager.setMap(map);

                                google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {

                            if (prev_infowindow) {
                            prev_infowindow.close();
                        }

                    if (event.type == google.maps.drawing.OverlayType.MARKER) {

                        var lat = event.overlay.getPosition().lat();
                        var lng = event.overlay.getPosition().lng(); //flag
                        //var bounds = event.overlay.getPath().getArray().toString(); //POLYLINE COORDINATES
                        console.log("Latitude = " + lat + " Longitude = " + lng);

                        var EditForm = '<p><div class="marker-edit">' +
                            '<form action="ajax-save.php" method="POST" name="SaveMarker" id="SaveMarker">' +
                            '<div class="form-group"><div class="fg-line"><input type="text" id="pName" class="form-control input-lg" placeholder="Enter Title" required></div></div>' +
                            '<div class="form-group"><div class="fg-line"><textarea class="form-control" id="pDesc" rows="3" placeholder="Write about this place" required></textarea></div></div>' +
                            '<div class="form-group"><div class="fg-line"><div class="select"><select id="pType" class="form-control"><option value="restaurant">Restaurant</option><option value="home">Home</option><option value="bar">Bar</option><option value="hospital">Hospital</option><option value="speed">Speed Breaker</option><option value="fuel">Petrol Pump</option><option value="custom">Other</option></select></div></div></div>'+
                            '</div></p><button type="submit" name="save-marker" class="save-marker btn btn-success btn-xs">Save</button>'+
                            '</form>';

                        //Drop a new Marker with our Edit Form
                        create_marker(lat, lng, 'New Marker', EditForm, true, true, true, "images/beachflag.png");

                        function create_marker(lt, lg, MapTitle, MapDesc, InfoOpenDefault, DragAble, Removable, iconPath) {

                            //new marker
                            var marker = new google.maps.Marker({
                                position: {
                                    lat: lt,
                                    lng: lg
                                },
                                map: map,
                                draggable: DragAble,
                                animation: google.maps.Animation.DROP,
                                title: "Hello World!",
                                //icon: iconPath
                            });

                            var contentString = $('<div class="marker-info-win">' +
                                '<div class="marker-inner-win"><span class="info-content">' +
                                '<h1 class="marker-heading">' + MapTitle + '</h1>' +
                                MapDesc +
                                '</span><button type="reset" class="remove-marker btn btn-danger btn-xs" title="Clear">Clear</button>' +
                                '</div></div>');
                            var infowindow = new google.maps.InfoWindow();
                            //set the content of infoWindow
                            infowindow.setContent(contentString[0]);
                            var removeBtn = contentString.find('button.remove-marker')[0];
                            var saveBtn = contentString.find('button.save-marker')[0];

                            infowindow.open(map, marker);
                            prev_infowindow = infowindow;
                            if (typeof saveBtn !== 'undefined') //continue only when save button is present
                            {
                                //add click listner to save marker button
                                google.maps.event.addDomListener(saveBtn, "click", function(event) {
                                    var mReplace = contentString.find('span.info-content'); //html to be replaced
                                    var mName = $("#pName").val(); //name input field value
                                    var mDesc = $("#pDesc").val(); //description input field value
                                    var mType = $("#pType").val(); //type of marker

                                    if (mName == '' || mDesc == '') {
                                        alert("Please enter Name and Description!");
                                    } else {
                                        save_marker(lt,lg,marker, mName, mDesc, mType, mReplace); //call save marker function
                                    }
                                });
                            }
                        }

                        function save_marker(lat,lng,Marker, mName, mAddress, mType, replaceWin) {
                            //Save new marker using jQuery Ajax
                            var myData = {
                                name: mName,
                                address: mAddress,
                                lat: lat,
                                lng: lng,
                                type: mType
                            }; //post variables
                            console.log(myData);
                            $.ajax({
                                type: "POST",
                                url: '<?php echo base_url(); ?>ajax/savemarker',
                                data: myData,
                                success: function(data) {                    
                                    var nFrom = 'bottom';
                                    var nAlign = 'left';
                                    var nIcons = $(this).attr('data-icon');
                                    var nType = 'success';
                                    var nAnimIn = $(this).attr('data-animation-in');
                                    var nAnimOut = $(this).attr('data-animation-out');            
                                    notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, "Marker saved successfully!");
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert(thrownError); //throw any errors
                                }
                            });
                        }

                    }
                    if (event.type == google.maps.drawing.OverlayType.CIRCLE) {
                        var radius = event.overlay.getRadius();
                        var center = event.overlay.getCenter();

                        console.log("Radius = " + radius);
                        console.log("Center = " + center);

                    }
                    if (event.type == google.maps.drawing.OverlayType.POLYLINE) {
                        var bounds = event.overlay.getPath().getArray().toString(); //POLYLINE COORDINATES
                        var bnd = event.overlay.getPath();
                        var encodeString = google.maps.geometry.encoding.encodePath(bnd);
                        $('#response').html("");
                        $("#myModal").modal();

                        //var lat = event.overlay.getPosition().lat();
                        //var lng = event.overlay.getPosition().lng(); 
                        var bounds = new google.maps.LatLng();
                        var ne = bounds.lat();

                        //var QLat = ne.lat();
                        //var QLng = ne.lng();
                        console.log(ne);
                        document.getElementById("encoded").value = encodeString;
                        console.log("Coordinates are " + encodeString);

                    }
                    if (event.type == google.maps.drawing.OverlayType.POLYGON) {
                        var bounds = event.overlay.getPath().getArray().toString(); //POLYLINE COORDINATES
                        console.log("Coordinates are " + bounds);
                    }
                    if (event.type == google.maps.drawing.OverlayType.RECTANGLE) {
                        var bounds = event.overlay.getBounds();
                        var start = bounds.getNorthEast();
                        var end = bounds.getSouthWest();
                        // var bounds = event.overlay.getBounds().getArray().toString(); //POLYLINE COORDINATES
                        console.log("Coordinates are " + start + " and  " + end);
                    }
                });

              }

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
            '</blockquote></span><button name="remove-marker" class="remove-marker btn btn-danger btn-xs" title="Remove Marker">Remove Marker</button>' +
            '</div></div>');
        var infowindow = new google.maps.InfoWindow();
        //set the content of infoWindow
        infowindow.setContent(contentString[0]);
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker); // click on marker opens info window 
        });
    }

    $.get("<?php echo base_url();?>ajax/getMarkers", function(data) {
        var obj=jQuery.parseJSON(data);
            for(var i=0;i<obj.length;i++){
            var name = obj[i].name;
            var address = '<p>' + obj[i].info+ '</p>';
            var type = obj[i].type;
            var icon = "<?php echo base_url(); ?>assets/img/map-icons/"+obj[i].type+".png";
            var point = new google.maps.LatLng(parseFloat(obj[i].lat), parseFloat(obj[i].lng));
            map_marker(point, name, address, false, false, false,icon);
        }
    });
}
</script>
<script type="text/javascript">

    $('form#savepath').on('submit', function(e){
      e.preventDefault();
      $('#response').html("Processing");
       var data_ajax = $(this).serialize();
      console.log(data_ajax);
      $.ajax({
            url: '<?php echo base_url(); ?>ajax/savepath', // URL ou envoyer les données
            data: data_ajax, 
            type: "POST", 
            success: function(data)
             {
                 $('#response').hide().html(data).fadeIn("slow");
                 $("#reset").click(); 
             }
          });
      
   });


$("#reviewform").submit(function(e) {

                var url = "<?php echo base_url(); ?>ajax/addreview";

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#reviewform").serialize(), 
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
    
    $("#showcustom").click(function(){

        var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 9.9000,
            lng: 76.7170
        },
        zoom: 15,
    });

       

            $.get("<?php echo base_url();?>ajax/getpolylines", function(data) {
        var obj=jQuery.parseJSON(data);                 
            addEncodedPaths(obj);        
    });


    function addEncodedPaths(encodedPaths) {
        console.log(encodedPaths);
        for (var i = 0, n = encodedPaths.length; i < n; i++) {            
            addEncodedPath(encodedPaths[i]['encoded_path'], encodedPaths[i]['color'], encodedPaths[i]['weight'],encodedPaths[i]['title'],encodedPaths[i]['description'],encodedPaths[i]['alert'],encodedPaths[i]['dashed']);
        } 
    }

    function addEncodedPath(encodedPath, color, weight,name,desc,alert,dashed) {
        var path = google.maps.geometry.encoding.decodePath(encodedPath);

        var lineSymbol = {
                            path: 'M 0,-1 0,1',
                            strokeOpacity: 1,
                            scale: 4
                          };

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
            $( "#clear" ).click();
        });
    }
        

    var prev_infowindow =false; 

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
            '</blockquote></span><button name="remove-marker" class="remove-marker btn btn-danger btn-xs" title="Remove Marker">Remove Marker</button>' +
            '</div></div>');
        var infowindow = new google.maps.InfoWindow();
        //set the content of infoWindow
        infowindow.setContent(contentString[0]);
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker); // click on marker opens info window 
        });
    }

    $.get("<?php echo base_url();?>ajax/getMarkers", function(data) {
        var obj=jQuery.parseJSON(data);
            for(var i=0;i<obj.length;i++){
            var name = obj[i].name;
            var address = '<p>' + obj[i].info+ '</p>';
            var type = obj[i].type;
            var icon = "<?php echo base_url(); ?>assets/img/map-icons/"+obj[i].type+".png";
            var point = new google.maps.LatLng(parseFloat(obj[i].lat), parseFloat(obj[i].lng));
            map_marker(point, name, address, false, false, false,icon);
        }
    });

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

      
</body>
</html>