<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>User Navigation Chat - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <script type="text/javascript">
            if (window.location.hash && window.location.hash == '#_=_') {
                if (window.history && history.pushState) {
                    window.history.pushState("", document.title, window.location.pathname);
                } else {
                    // Prevent scrolling by storing the page's current scroll offset
                    var scroll = {
                        top: document.body.scrollTop,
                        left: document.body.scrollLeft
                    };
                    window.location.hash = '';
                    // Restore the scroll offset, should be flicker free
                    document.body.scrollTop = scroll.top;
                    document.body.scrollLeft = scroll.left;
                }
            }
        </script>
    </head>
    <body>    
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">User Navigation Chat</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if ($this->session->userdata('logged_in') != 1) {
                        printf('<li><a href="%sregister/" data-toggle="modal">Register</a></li>', base_url());
                        printf('<li><a href="%slogin/" data-toggle="modal">Login</a></li>', base_url());
                    } else {
                        $avatarLink = '<img src="' . base_url().$this->session->userdata('avatar') . '" class="header-avatar" />';
                        printf('<li class="dropdown">');
                        printf('<a href="#" class="dropdown-toggle" data-toggle="dropdown">');
                        printf('<span>%s %s</span>', $avatarLink, $this->session->userdata('username'));
                        printf('</a>');
                        printf('<ul class="dropdown-menu">');
                        printf('<li><a href="/user"><i class="icon-user"></i> Profile</a></li>');
                        printf('<li class="divider"></li>');
                        printf('<li><a href="/logout"><i class="icon-off"></i> Logout</a></li>');
                        printf('</ul>');
                        printf('</li>');
                    }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <div class="container">
            <div class="row">
                <form class="form-signin mg-btm col-md-6 col-md-offset-3">
                    <h3 class="heading-desc">
                        Login to Websockets Chat</h3>
                    <div class="social-box">
                        <div class="row mg-btm">
                            <div class="col-md-12">
                                <a href="/facebook" class="btn btn-block btn-facebook">
                                    <i class="fa fa-facebook"></i> Sign in with Facebook
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                    <div class="main">	
                        <input type="text" id="username" class="form-control" placeholder="Email or Username" autofocus>
                        <input type="password" id="password" class="form-control" placeholder="Password">
                        <span class="clearfix"></span>	
                    </div>
                    <div class="login-footer">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="left-section">
                                    <a href="/passwordreset">Forgot your password?</a>
                                    <a href="/register">Sign up now</a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6 pull-right">
                                <button type="submit" id="login" class="btn btn-large btn-danger pull-right">Login</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>
    <script>
        $( document ).ready(function() {
            $('#login').click(function(event){
            console.log('clicked');
                event.preventDefault();
                var username = $('#username').val();
                var password = $('#password').val();
                
                $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>login/submit/',
                        dataType: "json", 
                        data: 'username=' + username + '&password=' + password, 
                        success: function(data, textStatus, jqXHR){
                            console.log(data);
                            if(data.status == "success"){
                                window.location.replace("/");
                            }
                        }
                 });
            });
        });

    </script>
</html>