<div class="timeline">
                                          
    <?php if(!empty($feeds)): ?>
    <?php foreach ($feeds as $feed): ?>
        <div class="t-view" id="checkin<?= $feed->checkin_id; ?>" data-tv-type="video">
            <div class="tv-header media">
                <a href="profile-timeline.html" class="tvh-user pull-left">
                    <img class="img-responsive" src="<?php echo base_url(); ?>uploads/dp/thumbs/200x200/<?= $feed->avatar; ?>" alt="">
                </a>
                <div class="media-body p-t-5">
                    <strong class="d-block"><?= $feed->full_name; ?></strong>
                    <small class="c-gray"><?php echo date("d-M-Y , h:i A", strtotime($feed->checkin_time)); ?></small>
                </div>
                
                <ul class="actions m-t-20 hidden-xs">
                    <li class="dropdown">
                        <a href="profile-timeline.html" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
            
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="#" data-id="<?= $feed->checkin_id; ?>" id="checkin-delete">Delete</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="tv-body">
                
                <div class="embed-responsive embed-responsive-16by9 m-b-20">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCdk1XYllFRIzIRXuSZ9c_04kPV_ZfBJOg&q=place_id:<?= $feed->checkin_place_id; ?>"></iframe>
                </div>
                
                <blockquote><?php echo $feed->checkin_story; ?></blockquote>
                                                
                <div class="clearfix"></div>
            

                
            </div>


        </div>
    <?php endforeach; ?>
    <?php else: echo "No feeds to display"; ?>
    <?php endif; ?>
                                   

    <div class="clearfix"></div>
</div>

<script type="text/javascript">

$('body').on('click', '#checkin-delete', function(e) {   
            var checkin_id = $(this).attr("data-id"); 
            var url = "<?php echo base_url(); ?>ajax/deletecheckin";
            $.ajax({
               type: "POST",
               url: url,
               data: {checkin_id : checkin_id }, 
               success: function(data)
               {                                
                        var nFrom = 'bottom';
                        var nAlign = 'left';
                        var nIcons = $(this).attr('data-icon');
                        var nType = data.status;
                        var nAnimIn = $(this).attr('data-animation-in');
                        var nAnimOut = $(this).attr('data-animation-out');
                        console.log(data);
                        //var checkin_id = $("#checkin-delete").attr("data-id");
                        console.log(checkin_id);
                        $("#checkin"+checkin_id).hide("slow");
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