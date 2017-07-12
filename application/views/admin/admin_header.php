<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Navigation Admin</title>

        <!-- Vendor CSS -->
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">     
           <link href="<?php echo base_url(); ?>assets/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
   

        <!-- CSS -->
        <link href="<?php echo base_url(); ?>assets/css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/app.min.2.css" rel="stylesheet">

        <script type="text/javascript">
                var username = "admin!";
        </script>
        
    </head>
    <body>
        <header id="header-2" class="clearfix" data-current-skin="lightblue"> <!-- Make sure to change both class and data-current-skin when switching sking manually -->
            <ul class="header-inner clearfix">
                <li id="menu-trigger" data-trigger=".ha-menu" class="visible-xs">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="<?= base_url(); ?>admin">Admin Dashboard</a>
                </li>
                
                <li class="pull-right">
                    <ul class="top-menu">                        
                        <li class="dropdown">
                            <a data-toggle="dropdown" href="top-mainmenu.html"><i class="tm-icon zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dm-icon pull-right">
                                <li class="hidden-xs">
                                    <a data-action="fullscreen" href="#"><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                                </li>
                                <li>
                                    <a data-action="clear-localstorage" href="#"><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                                </li>
                                <li>
                                    <a href="<?= base_url(); ?>user"><i class="zmdi zmdi-face"></i> My Account</a>
                                </li>
                                <li>
                                    <a href="<?= base_url(); ?>user/logout"><i class="zmdi zmdi-settings"></i>Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> 
            </ul>

            <div class="search">
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
            </div>
            
            <nav class="ha-menu">
                <ul>
                    <li class="waves-effect"><a href="<?= base_url(); ?>admin">Home</a></li>                    
                    <li class="waves-effect"><a href="<?= base_url(); ?>admin/viewusers">View Users</a></li>
                    <li class="waves-effect"><a href="<?= base_url(); ?>admin/viewreviews">View Reviews</a></li>
                    <li class="waves-effect"><a href="<?= base_url(); ?>admin/viewmarkers">View Markers</a></li>
                    <li class="waves-effect"><a href="<?= base_url(); ?>admin/viewpaths">View Paths</a></li>                                  
                </ul>
            </nav>
            
            <div class="skin-switch dropdown hidden-xs">
                <button data-toggle="dropdown" class="btn ss-icon"><i class="zmdi zmdi-palette"></i></button>
                <div class="dropdown-menu">
                    <span class="ss-skin ss-1 bgm-lightblue" data-skin="lightblue"></span>
                    <span class="ss-skin ss-2 bgm-bluegray" data-skin="bluegray"></span>
                    <span class="ss-skin ss-3 bgm-cyan" data-skin="cyan"></span>
                    <span class="ss-skin ss-4 bgm-teal" data-skin="teal"></span>
                    <span class="ss-skin ss-5 bgm-green" data-skin="green"></span>
                    <span class="ss-skin ss-6 bgm-orange" data-skin="orange"></span>
                    <span class="ss-skin ss-7 bgm-blue" data-skin="blue"></span>
                    <span class="ss-skin ss-8 bgm-purple" data-skin="purple"></span>
                </div>
            </div>
        </header>
        
            
           
    