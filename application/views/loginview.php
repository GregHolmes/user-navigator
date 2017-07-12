<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login or Signup</title>
        
        <!-- Vendor CSS -->
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">

        <!-- CSS -->
        <link href="<?php echo base_url(); ?>assets/css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/app.min.2.css" rel="stylesheet">
    </head>
    <style type="text/css">
         body{
                  width: 100%;
                  height: 100%;
                          background-image: url(<?php echo base_url(); ?>assets/img/back.png);
                          background-color: #444;
                          background-image: url(<?php echo base_url(); ?>assets/img/pinlayer2.png),
                                            url(<?php echo base_url(); ?>assets/img/pinlayer1.png),
                                            url(<?php echo base_url(); ?>assets/img/back.png);    
                      }

                body.login-content:before {
                  height: 100%;
                  width: 100%;
                  position: absolute;
                  top: 0;
                  left: 0;
                  /*background: #00bcd4;*/
                  content: "";
                  z-index: 0;
                }
                .lc-block:not(.lcb-alt) {
                    top: 13vw;
                }
    </style>              
    <!-- Login --> 
    <?php echo $this->session->flashdata('msg'); ?>
    <body class="login-content">
        <form class="lc-block toggled" id="l-login" method="POST">
            <div>
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                </div>
                
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                    <div class="fg-line">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">
                        <i class="input-helper"></i>
                        Keep me signed in
                    </label>
                </div>
                
                <button class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>
                
                <ul class="login-navigation">
                    <li data-block="#l-register" class="bgm-red">Register</li>
                    <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
                </ul>
            </div>
        </form>
        
        <!-- Register -->
        <form class="lc-block" id="l-register" method="POST">
            <div>

                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-accounts-list"></i></span>
                    <div class="col-sm-6">
                        <div class="fg-line">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="fg-line">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>                   
                </div>            

                <div class="input-group m-b-20 ">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line" id="usernameinput">
                        <input type="text" id="username" name="username" class="form-control " placeholder="Username" required>
                         <small id="usernamehelptext" class="help-block pull-left"></small>
                    </div>

                    <span id="usernameAvailableStatus"></span>

                </div>
                
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-mall"></i></span>
                    <div class="fg-line" id="emailinput">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
                        <small id="emailhelptext" class="help-block pull-left"></small>
                    </div>
                    <span id="emailAvailableStatus"></span>
                </div>
                
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                    <div class="fg-line">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="eula" value="" required>
                        <i class="input-helper"></i>
                        Accept the license agreement
                    </label>
                </div>
                
                <button class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>
                
                <ul class="login-navigation">
                    <li data-block="#l-login" class="bgm-green">Login</li>
                    <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
                </ul>
            </div>
        </form>
        
        <!-- Forgot Password -->
        <form class="lc-block" id="l-forget-password">
            <div>
                <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
                
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Email Address" required>
                    </div>
                </div>
                
                <button href="login" type="submit" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>
                
                <ul class="login-navigation">
                    <li data-block="#l-login" class="bgm-green">Login</li>
                    <li data-block="#l-register" class="bgm-red">Register</li>
                </ul>
            </div>
        </form>            

        <!-- Javascript Libraries -->
        <script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/TweenLite.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() { 
                $('#usernamehelptext,#emailhelptext').hide();
                $(document).mousemove(function(e) {
                 TweenLite.to($('body'), 
                    .5, 
                    { css: 
                        {
                            backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
                        }
                    });
                });

            if($('.fg-line')[0]) {
                $('body').on('focus', '.fg-line .form-control', function(){
                    $(this).closest('.fg-line').addClass('fg-toggled');
                })

                $('body').on('blur', '.form-control', function(){
                    var p = $(this).closest('.form-group, .input-group');
                    var i = p.find('.form-control').val();

                    if (p.hasClass('fg-float')) {
                        if (i.length == 0) {
                            $(this).closest('.fg-line').removeClass('fg-toggled');
                        }
                    }
                    else {
                        $(this).closest('.fg-line').removeClass('fg-toggled');
                    }
                });
            }                
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

        <script type="text/javascript">

            $("#username,#email").blur(function(e) {
                    e.preventDefault();
                    var cur = $(this).attr('id');
                    var url = "<?php echo base_url(); ?>register/checkcr"; // the script where you handle the form input.

                    $.ajax({
                       type: "POST",
                       url: url,
                       data: cur+'=' + $(this).val()+'&this'+cur+'=1',
                       success: function(data)
                       {
                            var nFrom = 'top';
                            var nAlign = 'center';
                            var nIcons = $(this).attr('data-icon');
                            var nType = 'danger';
                            var nAnimIn = $(this).attr('data-animation-in');
                            var nAnimOut = $(this).attr('data-animation-out');
                            $('#'+cur+'helptext').fadeIn(1000);
                           
                            var isUsernameAvailable = data.status;

                            if (data.status == 'ok') {
                                $('#'+cur+'AvailableStatus').removeClass("zmdi zmdi-close form-control-feedback text-danger").addClass("zmdi zmdi-check form-control-feedback text-success");                                
                                $('#'+cur+'helptext').html(data.message);
                                $('#'+cur+'input').removeClass("has-feedback has-error").addClass("has-feedback has-success");
                               
                            }          
                            else
                            {
                                $('#'+cur+'AvailableStatus').removeClass("zmdi zmdi-check form-control-feedback text-success").addClass("zmdi zmdi-close form-control-feedback text-danger");
                                $('#'+cur+'helptext').html(data.message);
                                $('#'+cur+'input').removeClass("has-feedback has-success").addClass("has-feedback has-error");;
                            }                                          
                       }
                    });                   
            });

            $("#l-login").submit(function(e) {

                var url = "<?php echo base_url(); ?>login/verify";

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#l-login").serialize(), 
                       success: function(data)
                       {
                                e.preventDefault();
                                var nFrom = 'top';
                                var nAlign = 'center';
                                var nIcons = $(this).attr('data-icon');
                                var nType = 'danger';
                                var nAnimIn = $(this).attr('data-animation-in');
                                var nAnimOut = $(this).attr('data-animation-out');
                                
                                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, data);
                       }
                     });

                e.preventDefault();
            });

            $("#l-register").submit(function(e) {

                var url = "<?php echo base_url(); ?>register"; 
                e.preventDefault();
                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#l-register").serialize(),
                       success: function(data)
                       {
                            e.preventDefault();
                            var nFrom = 'top';
                            var nAlign = 'center';
                            var nIcons = $(this).attr('data-icon');
                            var nType = 'success';
                            var nAnimIn = $(this).attr('data-animation-in');
                            var nAnimOut = $(this).attr('data-animation-out');
                            var json = $.parseJSON(data);

                            if (json.status == 'ok') {
                                console.log('greater than 0');
                                swal("Good job!", "Congratulations. You've successfully registered to user-nav service. You can now login.", "success")
                            }

                            //notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, data);
                       }
                     });

                
            });
        </script>
        
        <script src="<?php echo base_url(); ?>assets/js/functions.js"></script>
       

           
        
    </body>
</html>