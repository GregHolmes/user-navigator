<?php foreach ($info as $row ): ?> 

                            
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="#">Edit</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>First Name</dt>
                                            <dd><?php echo $row->first_name; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Last Name</dt>
                                            <dd><?php echo $row->last_name; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Gender</dt>
                                            <dd><?php echo $row->user_gender; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Birthday</dt>
                                            <dd><?php echo date('d M Y', strtotime($row->user_birthday)); ?></dd>
                                        </dl>                                        
                                    </div>
                                    <form name="info-form" id="primary_edit">
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">First Name</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input name="first_name" type="text" class="form-control" placeholder="<?php echo $row->first_name; ?>" value="<?= $row->first_name; ?>">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Last Name</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input name="last_name" type="text" class="form-control" placeholder="<?php echo $row->last_name; ?>" value="<?= $row->last_name; ?>">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Gender</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select class="form-control" name="user_gender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Birthday</dt>
                                            <dd>
                                                <div class="dtp-container dropdown fg-line">
                                                    <input name="user_birthday" type='text' class="form-control date-picker"  
                                                    data-date-format="DD/MM/YYYY" data-toggle="dropdown" 
                                                    value="<?php echo $row->user_birthday; ?>">
                                                </div>
                                            </dd>
                                        </dl>                                    
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm">Save</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>                                                                                                              
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-phone m-r-5"></i> Contact Information</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="#">Edit</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Mobile Phone</dt>
                                            <dd><?= $row->phone; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email Address</dt>
                                            <dd><?= $row->user_email; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Twitter</dt>
                                            <dd>@<?= $row->twitter; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Skype</dt>
                                            <dd><?= $row->skype; ?></dd>
                                        </dl>
                                    </div>
                                    <form name="info-form" id="contact_edit">
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Mobile Phone</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="phone" class="form-control" placeholder="eg. <?= $row->phone; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email Address</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" name="user_email" class="form-control" placeholder="eg. <?= $row->user_email; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Twitter</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="twitter" class="form-control" placeholder="eg. <?= $row->twitter; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Skype</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="skype" class="form-control" placeholder="eg. <?= $row->skype; ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm">Save</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
<?php endforeach; ?>

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$('body').on('submit', '#primary_edit', function(e) {   
            var url = "<?php echo base_url(); ?>ajax/basicinfoupdate";

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#primary_edit").serialize(), 
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
                                $(this).closest('.pmb-block').removeClass('toggled');

                       }
                     });

                e.preventDefault();
            });


</script>
<script type="text/javascript">
$('body').on('submit', '#contact_edit', function(e) {   
            var url = "<?php echo base_url(); ?>ajax/contactinfoupdate";

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#contact_edit").serialize(), 
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
                                $(this).closest('.pmb-block').removeClass('toggled');

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