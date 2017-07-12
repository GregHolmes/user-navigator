<section id="content">
<div class="container-fluid">
    <div class="col-lg-12">
    	<div class="row">
    		<div class="col-lg-12">
    		<form name="eventform" id="addevent" method="POST">
                <div class="card">
                    <div class="card-header bgm-green ch-alt m-b-20">
                        <h2 class="f-20">Add Event <small class="f-15">Create your own event</small></h2>

                        
                    </div>

                    <div class="card-body card-padding">
                    	<div class="col-lg-12 p-20">                       
                            <div class="input-group">
                                <span class="input-group-addon"><i class="tm-icon zmdi zmdi-calendar-check"></i></span>
                                <div class="fg-line">
                                        <input  type="text" name="event_name" class="form-control f-20" placeholder="Event Name" required>
                                </div>
                            </div>
                            
                            <br>
                            
                            <div class="input-group">
                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                <div class="fg-line">
                                    <input type="text" id="place-input" name="event_location" class="form-control input-lg" placeholder="Specify your event location" required>
                                </div>
                            </div>
                            <br>

                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                    <div class="dtp-container fg-line">
                                    <input type="text" name="event_time" class="form-control date-time-picker" placeholder="Date/Time" required>
                                </div>
                            </div>

                            <br>
                            <div class="input-group">
                            	<span class="input-group-addon"><i class="zmdi zmdi-assignment zmdi-hc-fw"></i></span>
                                <div class="fg-line">
                            		<textarea class="form-control auto-size f-15" name="event_desc" placeholder="Describe your event" data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; height: 50px;" required></textarea>
                        		</div>
                            </div>
                            
                            <br>

                        </div>
                        <div class="col-lg-offset-9">                        
                            <button type="reset" class="btn btn-danger waves-effect">Reset</button>
                            <button type="submit" class="btn btn-success waves-effect">Save</button>
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
    </body>
</html>



<script type="text/javascript">

$("#addevent").submit(function(e) {

                var url = "<?php echo base_url(); ?>ajax/addnewevent";

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#addevent").serialize(), 
                       success: function(data)
                       {                                
                                var nFrom = 'bottom';
                                var nAlign = 'left';
                                var nIcons = $(this).attr('data-icon');
                                var nType = data.status;
                                var nAnimIn = $(this).attr('data-animation-in');
                                var nAnimOut = $(this).attr('data-animation-out');                               
                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, data.message);
                       }
                     });

                e.preventDefault();
            });
</script>

 <script async defer src=
        "https://maps.googleapis.com/maps/api/js?key=AIzaSyCdk1XYllFRIzIRXuSZ9c_04kPV_ZfBJOg&signed_in=true&libraries=places&callback=initMap">
        </script> 

<script type="text/javascript">
function initMap() {
    var origin_input = document.getElementById('place-input');
    var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
    origin_autocomplete.addListener('place_changed',function() {
            var place = origin_autocomplete.getPlace();
            if (!place.geometry) {
               var nFrom = 'bottom';
                                var nAlign = 'left';
                                var nIcons = $(this).attr('data-icon');
                                var nType = "danger";
                                var nAnimIn = $(this).attr('data-animation-in');
                                var nAnimOut = $(this).attr('data-animation-out');                               
                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, 'Error fetching location. Please try another');
            }
        });
}

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