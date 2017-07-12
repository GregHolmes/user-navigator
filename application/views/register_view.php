<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>User Navigation Chat - Register</title>
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
                        if ($this->session->userdata('logged_in') != 1){
                            printf('<li><a href="%sregister/" data-toggle="modal">Register</a></li>', base_url());
                            printf('<li><a href="%slogin/" data-toggle="modal">Login</a></li>', base_url());
                        } else{
                            $avatarLink = '<img src="http://graph.facebook.com/' . $this->session->userdata('username') . '/picture" class="header-avatar" />';
                            printf('<li class="dropdown">');
                            printf('<a href="#" class="dropdown-toggle" data-toggle="dropdown">');
                            printf('<span>%s %s</span>', $avatarLink, $this->session->userdata('username'));
                            printf('</a>');
                            printf('<ul class="dropdown-menu">');
                            printf('<li><a href="%suser"><i class="icon-user"></i> Profile</a></li>', base_url());
                            printf('<li class="divider"></li>');
                            printf('<li><a href="%slogout"><i class="icon-off"></i> Logout</a></li>', base_url());
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
                        Register an account with Websockets Chat</h3>
                    <div class="social-box">
                        <div class="row mg-btm">
                            <div class="col-md-12">
                                <a href="/facebook" class="btn btn-block btn-facebook">
                                    <i class="fa fa-facebook"></i> Register with Facebook
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                    <div class="main">	
                        <div id="registerMessageContainer" class="col-md-12" >
                        </div>
                        <div id="registerUsernameInputGroup" class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" id="username" autofocus>
                        </div>
                        <div id="registerEmailInputGroup" class="form-group">
                            <label class="control-label" for="email">Email Address</label>
                            <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                        </div>
                        <div id="registerPasswordInputGroup" class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        </div>
                        <span class="clearfix"></span>	
                    </div>
                    <div class="login-footer">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <div class="left-section">
                                    <a href="<?php echo base_url(); ?>passwordreset">Forgot your password?</a>
                                    <a href="<?php echo base_url(); ?>login">Login Here</a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-6 pull-right">
                                <button type="submit" id="registerButton" class="btn btn-large btn-danger pull-right">Register</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/custom/validate.js"></script>
    <script>
        $( document ).ready(function() {
            $('#registerButton').on('click', function(event){
                event.preventDefault();
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var button = $('#registerButton');
                var messageContainer = $('#registerMessageContainer');
                var inputGroup;
                var errorMessage;
                
                if(!checkStringLength(username, 5, 15)){
                    inputGroup = $('#registerUsernameInputGroup');
                    errorMessage = 'Your username must be between 5 and 15 characters';
                    showError(button, inputGroup, messageContainer, errorMessage);
                    return false;
                }
                else if(!checkSpecialChars(username)){
                    inputGroup = $('#registerUsernameInputGroup');
                    errorMessage = 'Special characters not allowed in your username';
                    showError(button, inputGroup, messageContainer, errorMessage);
                    return false;
               }
               else if(!checkEmail(email)){
                    inputGroup = $('#registerEmailInputGroup');
                    errorMessage = 'Invalid email address';
                    showError(button, inputGroup, messageContainer, errorMessage);
                    return false;
               }
               else if(!checkStringLength(password, 5, 100)){
                    inputGroup = $('#registerPasswordInputGroup');
                    errorMessage = 'Your password must be between 5 and 100 characters';
                    showError(button, inputGroup, messageContainer, errorMessage);
                    return false;
               }
                
                $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>user/submitNewUser/',
                        dataType: "json", 
                        data: 'username=' + username + '&email=' + email + '&password=' + password, 
                        success: function(data, textStatus, jqXHR){
                            if(data.status == "success"){
                                window.location.replace("/");
                            }
                            else if(data.status == 'error'){
                                inputGroup = $('#registerPasswordInputGroup');
                                errorMessage = data.errormessage;
                                showError(button, inputGroup, messageContainer, errorMessage);
                            }
                        }
                 });
            });
        });

        function showError(button, inputGroup, container, message){
            button.removeClass('active');
            inputGroup.addClass('has-error');
            container.fadeOut('fast', function(){
                $(this).empty().append('<div class="alert alert-danger">' + message + '</div>').fadeIn('fast');
            });
        }
    </script>
</html>