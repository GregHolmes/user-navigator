<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>User Navigation Chat - Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Portfolio project showing skills with Node.js, PHP, Javascript, jQuery, AJAX and API's">
        <meta name="author" content="Patrick Burns">
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
                    if($this->session->userdata('logged_in') != 1){
                        printf('<li><a href="%sregister/" data-toggle="modal">Register</a></li>', base_url());
                        printf('<li><a href="%slogin/" data-toggle="modal">Login</a></li>', base_url());
                    }
                    else{
                        //$avatarLink = '<img src="http://graph.facebook.com/' . $this->session->userdata('username') . '/picture" class="header-avatar" />';
                        $avatarLink = '<img src="' . $this->session->userdata('avatar') . '" id="header-avatar" class="header-avatar" />';
                        printf('<li class="dropdown">');
                        printf('<a href="#" class="dropdown-toggle" data-toggle="dropdown">');
                        printf('<span>%s <span id="nav-username">%s<span></span>', $avatarLink, $this->session->userdata('username'));
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
                <div class="form-signin mg-btm col-md-6 col-md-offset-3">
                    <ul class="nav nav-tabs faq-cat-tabs">
                        <li class="active"><a href="#userDetails" data-toggle="tab" id="userDetailsTab">User Details</a></li>
                        <li><a href="#userAvatar" data-toggle="tab">Avatar</a></li>
                        <li><a href="#userPassword" data-toggle="tab" id="userPasswordTab">Reset Password</a></li>
                    </ul>
                    <div class="main tab-content">
                        <div class="tab-pane in fade active" id="userDetails">
                            <div id="userMessageContainer" class="col-md-12" ><div class="alert alert-info">Update your account details</div></div>
                            <div id="updateUsernameInputGroup" class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" id="username" data-toggle="tooltip" title="Username" value="<?php echo $this->session->userdata('username'); ?>">
                            </div>
                            <div id="updateEmailInputGroup" class="form-group">
                                <label class="control-label" for="email">Email Address</label>
                                <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $this->session->userdata('email_address'); ?>">
                            </div>    
                            <span class="clearfix"></span>
                            <div class="pull-right">
                                <button class="btn btn-large btn-danger has-spinner" id="updateUserButton"><span class="spinner"><i class="fa fa-refresh fa-spin"></i></span>Update Details</button>
                            </div>	
                        </div>
                        <div class="tab-pane in fade" id="userAvatar">	
                            <div id="avatarMessageContainer" class="col-md-12" ><div class="alert alert-info">Change your avatar image</div></div>
                                <div id="uploadAvatarControlContainer" class="col-md-7">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                          <?php echo '<img id="avatarPreview" src="' . $this->session->userdata('avatar') . '" />'; ?>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                          <form enctype="multipart/form-data" id="avatarForm">
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select New Image</span>
                                                  <input type="file" name="selectAvatarButton" id="selectAvatarButton" />
                                            </span>
                                          </form>
                                        </div>
                                    </div>

                                    <button class="btn btn-large btn-danger has-spinner" id="uploadNewAvatarButton"><span class="spinner"><i class="fa fa-refresh fa-spin"></i></span>Upload</button>
                                </div>
                            <div id="socialAvatarControlContainer" class="col-md-5">
                                <a id="useFaceebokAvatarButton" class="btn btn-block btn-facebook">
                                    <i class="fa fa-facebook"></i> Use Facebook Avatar
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane in fade" id="userPassword">
                            <div id="passwordMessageContainer" class="col-md-12" >
                                <div class="alert alert-info">Reset your password</div>
                                
                            </div>
                            <div id="resetPasswordInputGroup1" class="form-group">
                                <label class="control-label" for="password1">Reset Password</label>
                                <input type="password" class="form-control"  name="password1" id="password1" autofocus>
                            </div>
                            <div id="resetPasswordInputGroup2" class="form-group">
                                <label class="control-label" for="password2">Confirm Password</label>
                                <input type="password" class="form-control" name="password2" id="password2" >
                            </div>
                            <span class="clearfix"></span>
                            <div class="pull-right">
                                <button class="btn btn-large btn-danger has-spinner" id="resetPasswordButton"><span class="spinner"><i class="fa fa-refresh fa-spin"></i></span>Reset Password</button>
                            </div>
                        </div>

                       
                        <span class="clearfix"></span>	
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/custom/validate.js"></script>
    <script>
$( document ).ready(function() {
    
    $('#userPasswordTab').on('click', function(){
        $('#password1').focus();
    });
    
    $('#userDetails').keypress(function(e) {
        if(e.which == 13) {
            updateUserDetails();
        }
    });
    
    $('#userPassword').keypress(function(e) {
        if(e.which == 13) {
            submitPasswordReset();
        }
    });
    
   $('#selectAvatarButton').on('change', function(){
         previewNewAvatar(this);
   });
   
   $('#updateUserButton').on('click',function(event){
       event.preventDefault();
       updateUserDetails();
   });
   
   $('#resetPasswordButton').on('click',function (event){
       event.preventDefault();
       submitPasswordReset();
   }); 
  
   $('#useFaceebokAvatarButton').on('click', function(event){
       event.preventDefault();
       var control = $('#selectAvatarButton');
       control.replaceWith( control = control.clone( true ) );
       $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>user/setFacebookAvatar/',
        dataType: "json", 
        success: function(data, textStatus, jqXHR){
            console.log(data);
            if(data.status === "success"){
                $('#avatarPreview').attr('src', data.avatarlink);
                $('#header-avatar').attr('src', data.avatarlink);
                $('#avatarMessageContainer').fadeOut('fast',function(){
                    $(this).empty().append('<div class="alert alert-success">Successfully changed avatar!</div>').fadeIn('fast');
                });
            }
            if(data.status === 'error'){
                 $('#avatarMessageContainer').fadeOut('fast', function(){
                     $(this).empty().append('<div class="alert alert-danger">'+ data.errormessage +'</div>').fadeIn('fast');
                 })
            }
        }
    });
   });
   
   $('#uploadNewAvatarButton').on('click', function(event){
       event.preventDefault();
       $('#uploadNewAvatarButton').toggleClass('active');
       $('#avatarMessageContainer').empty();
       var url = '<?php echo base_url(); ?>user/uploadAvatar';
       var file = $('#selectAvatarButton').prop('files');
                var fd = new FormData;
                    fd.append('userfile', file[0]);

                var xhr = new XMLHttpRequest();
                    xhr.file = file; // not necessary if you create scopes like this
                    xhr.onload = function (){
                        var data = JSON.parse(xhr.responseText);
                        if(data.status === 'error'){
                            $('#avatarMessageContainer').fadeOut('fast',function(){
                                $(this).empty().append('<div class="alert alert-danger">' + data.errormessage + '</div>').fadeIn('fast');
                            });
                        }
                        else if(data.status === 'success'){
                            control = $('#selectAvatar');
                            $('#avatarMessageContainer').fadeOut('fast', function(){
                               $(this).empty().append('<div class="alert alert-success">Successfully uploaded new avatar!</div>').fadeIn('fast');
                            });
                            $('#uploadNewAvatar').fadeOut('fast');
                            $('#header-avatar').attr('src', data.avatarlink);
                            control.replaceWith( control = control.clone( true ) );
                        }
                        
                        $('#uploadNewAvatarButton').removeClass('active');
                        
                    };
                    xhr.open('post', url, true);
                    xhr.send(fd); 
   });
});

function updateUserDetails(){
    //declare our variables
       var username = $('#username').val();
       var email = $('#email').val();
       var firstName = $('#firstname').val();
       var lastName = $('#lastname').val();
       var button = $('#updateUserButton');
       var messageContainer = $('#userMessageContainer');
       var inputGroup;
       var errorMessage;
       
       //reset our user details form back to normal state
       $('#updateUserButton').addClass('active');
       resetUpdateUserForm();
       
       //time to do some validation
       if(!checkStringLength(username, 5, 15)){
            inputGroup = $('#updateUsernameInputGroup');
            errorMessage = 'Your username must be between 5 and 15 characters';
            showError(button, inputGroup, messageContainer, errorMessage);
           return false;
       }
       else if(!checkSpecialChars(username)){
            inputGroup = $('#updateUsernameInputGroup');
            errorMessage = 'Special characters not allowed in your username';
            showError(button, inputGroup, messageContainer, errorMessage);
           return false;
       }
       else if(!checkEmail(email)){
            inputGroup = $('#updateEmailInputGroup');
            errorMessage = 'Invalid email address';
            showError(button, inputGroup, messageContainer, errorMessage);
           return false;
       }
       else{
           
            $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url(); ?>user/updateDetails/',
                 dataType: "json", 
                 data: 'username=' + username + '&email=' + email + '&firstname=' + firstName + '&lastname=' + lastName, 
                 success: function(data, textStatus, jqXHR){
                     console.log(data);
                     if(data.status === "success"){
                         $('#nav-username').fadeOut('fast', function(){
                             $(this).html(data.userdata['username']).fadeIn('fast');
                         });
                         $('#userMessageContainer').fadeOut('fast', function(){
                            $(this).empty().append('<div class="alert alert-success">Successfully updated your account details</div>').fadeIn('fast');
                         });
                     }
                     if(data.status === 'error'){
                         $('#userMessageContainer').fadeOut('fast', function(){
                             $(this).empty().append('<div class="alert alert-danger">' + data.errormessage + '</div>').fadeIn('fast');
                         });
                     }
                 }
             });
       }
       
       $('#updateUserButton').removeClass('active');
       return true;
}

function submitPasswordReset(){
    var password1 = $('#password1').val();
       var password2 = $('#password2').val();
       var button = $('#resetPasswordButton');
       var messageContainer = $('#passwordMessageContainer');
       var inputGroup;
       var errorMessage;
       
       $('#resetPasswordButton').addClass('active');
       resetResetPasswordForm();
       if(!checkEmpty(password1)){
           inputGroup = $('#resetPasswordInputGroup1');
           errorMessage = 'You must enter a password';
           showError(button, inputGroup, messageContainer, errorMessage);
           return false;
       }
       else if(!checkStringLength(password1, 5, 100)){
           inputGroup = $('#resetPasswordInputGroup1');
           errorMessage = 'Your password must be between 5 and 100 characters';
           showError(button, inputGroup, messageContainer, errorMessage);
           return false;
       }
       else if(!checkStringLength(password2, 5, 100)){
           inputGroup = $('#resetPasswordInputGroup2');
           errorMessage = 'Your password must be between 5 and 100 characters';
           showError(button, inputGroup, messageContainer, errorMessage);
           return false;
       }
       else if(!checkPasswordsMatch(password1, password2)){
           $('#resetPasswordButton').removeClass('active');
           $('#resetPasswordInputGroup1').addClass('has-error');
           $('#resetPasswordInputGroup2').addClass('has-error');
           $('#passwordMessageContainer').fadeOut('fast', function(){
               $(this).empty().append('<div class="alert alert-danger">Your passwords do not match</div>').fadeIn('fast');
           });
           return false;
       }
       else{
           
       $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>user/resetPassword/',
            dataType: "json", 
            data: "password=" + password1,
            success: function(data, textStatus, jqXHR){
                console.log(data);
                if(data.status === "success"){
                    $('#password1').val('');
                    $('#password2').val('');
                    $('#passwordMessageContainer').fadeOut('fast', function(){
                        $(this).empty().append('<div class="alert alert-success">Successfully reset password!</div>').fadeIn('fast');
                    })
                }
                if(data.status === 'error'){
                    $('#passwordMessageContainer').fadeOut('fast', function(){
                        $(this).empty().append('<div class="alert alert-danger">' + data.errormessage + '</div>').fadeIn('fast');
                    });
                }
            }
        });
       }
       
        $('#resetPasswordButton').removeClass('active');
        return true;
}

function showError(button, inputGroup, container, message){
    button.removeClass('active');
    inputGroup.addClass('has-error');
    container.fadeOut('fast', function(){
        $(this).empty().append('<div class="alert alert-danger">' + message + '</div>').fadeIn('fast');
    });
}

function resetUpdateUserForm(){
       $('#updateUsernameInputGroup').removeClass('has-error');
       $('#updateEmailInputGroup').removeClass('has-error');
       $('#updateFirstNameGroup').removeClass('has-error');
       $('#updateLastNameGroup').removeClass('has-error');
}

function resetResetPasswordForm(){
       $('#resetPasswordInputGroup1').removeClass('has-error');
       $('#resetPasswordInputGroup2').removeClass('has-error');
}

function previewNewAvatar(input){
   if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatarPreview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
    
    $('#uploadNewAvatarButton').show();
}

    </script>
</html>