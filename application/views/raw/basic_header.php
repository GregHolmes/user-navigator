<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Navigation</title>

        <!-- Vendor CSS -->

        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?php echo base_url(); ?>assets/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/lightgallery/light-gallery/css/lightGallery.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">




        <!-- CSS -->
        <link href="<?php echo base_url(); ?>assets/css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/app.min.2.css" rel="stylesheet">
         <script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
         
        <script type="text/javascript">
                var username = "<?php echo $info[0]->full_name; ?>";
        </script>
        
    </head>
    <style type="text/css">
    .avatar
    {
        width: 47px;
        height: 47px;
        border-radius: 50%;
        border: 3px solid rgba(0, 0, 0, 0.14);
        box-sizing: content-box;
    }
    </style>
    
    <?php foreach ($info as $row ): ?> 
    <body>
        <header id="header" class="clearfix" data-current-skin="blue">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="logo hidden-xs">
                    <a href="<?= base_url(); ?>">User Navigation System</a>
                </li>

                <li class="pull-right">
                    <ul class="top-menu">
                        <li id="toggle-width">
                            <div class="toggle-switch">
                                <input id="tw-switch" type="checkbox" hidden="hidden">
                                <label for="tw-switch" class="ts-helper"></label>
                            </div>
                        </li>

                        <li id="top-search">
                            <a href="#"><i class="tm-icon zmdi zmdi-search"></i></a>
                        </li>
                        <!--<li class="dropdown">
                            <a data-toggle="dropdown" href="#"><i class="tm-icon zmdi zmdi-calendar-check"></i></a>
                            <ul class="dropdown-menu dm-icon pull-right">

                                <li class="hidden-xs">
                                    <a href="<?= base_url(); ?>user/addevent"><i class="zmdi zmdi-collection-plus"></i> Create Event</a>
                                </li>

                            </ul>
                        </li>   -->



                        <li class="dropdown">
                            <a data-toggle="dropdown" href="#"><i class="tm-icon zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dm-icon pull-right">
                                <li class="skin-switch hidden-xs">
                                    <span class="ss-skin bgm-lightblue" data-skin="lightblue"></span>
                                    <span class="ss-skin bgm-bluegray" data-skin="bluegray"></span>
                                    <span class="ss-skin bgm-cyan" data-skin="cyan"></span>
                                    <span class="ss-skin bgm-teal" data-skin="teal"></span>
                                    <span class="ss-skin bgm-orange" data-skin="orange"></span>
                                    <span class="ss-skin bgm-blue" data-skin="blue"></span>
                                </li>
                                <li class="divider hidden-xs"></li>
                                <li class="hidden-xs">
                                    <a data-action="fullscreen" href="#"><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                                </li>
                                <!--<li>
                                    <a data-action="clear-localstorage" href="#"><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                                </li> -->
                                <li>    
                                    <a href="<?= base_url();?>user/logout"><i class="zmdi zmdi-power zmdi-hc-fw"></i> Logout</a>
                                </li>                                                                                    

                            </ul>
                        </li>                   
                        <li  id="chat-trigger" data-trigger="#chat">
                            <a href="#"><i class="tm-icon zmdi zmdi-comment-alt-text"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>


            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <form name="searchform" id="searchform" method="GET" action="<?php echo base_url();?>user/search">
                <div class="tsw-inner">
                    <i id="top-search-close" class="zmdi zmdi-arrow-left"></i>
                    <input name="query" type="text">
                </div>
                </form>
            </div>
        </header>
        
        <section id="main" data-layout="layout-1">
            <aside id="sidebar" class="sidebar c-overflow">
                <div class="profile-menu">
                    <a href="#">
                        <div class="profile-pic">
                            <img src="<?php echo base_url(); ?>uploads/dp/thumbs/200x200/<?php echo $row->avatar; ?>" alt="">
                        </div>

                        <div class="profile-info">
                            <?php echo $row->full_name; ?>

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>user"><i class="zmdi zmdi-account"></i> View Profile</a>
                        </li>
                                                
                        <li>
                            <a href="<?php echo base_url(); ?>user/logout"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li class="active">
                        <a href="<?php echo base_url(); ?>nav"><i class="zmdi zmdi-home"></i> Route Search</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>nav/editor"><i class="zmdi zmdi-home"></i> Map Editor</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>nav/places"><i class="zmdi zmdi-home"></i> Place Search</a>
                    </li>
                     <li>
                        <a href="<?php echo base_url(); ?>user/checkin"><i class="zmdi zmdi-home"></i> Place CheckIn</a>
                    </li>
                    <li class="sub-menu">
                        <a href="#"><i class="zmdi zmdi-view-compact"></i> <?php echo $row->first_name.'\'s Profile'; ?></a>

                        <ul>
                            <li><a href="<?= base_url();?>user">My Profile</a></li>
                            <li><a href="<?= base_url();?>user/connected">My Connections</a></li>
                            <li><a href="<?= base_url();?>user/suggestions">Suggestions</a></li>
                        </ul>
                    </li>
                 
                </ul>
            </aside>
            
            <aside id="chat" class="sidebar c-overflow">
            
                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                    </div>
                </div>

                <div class="listview">
                <?php if(empty($online_users)){echo "No one is online";}else{ ?>
                    <?php foreach ($online_users as $user): ?>
                        <?php if($user->friend_id==$this->session->userdata('logged_in')['uid']):?>
                    <a class="lv-item" href="<?php echo base_url().'chat/user/'.$user->uid; ?>">
                    <?php else: ?>
                    <a class="lv-item" href="<?php echo base_url().'chat/user/'.$user->friend_id; ?>">
                    <?php endif; ?>
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="<?php echo base_url(); ?>uploads/dp/thumbs/200x200/<?= $user->avatar; ?>" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title"><?= $user->full_name; ?></div>
                                <small class="lv-small">Online</small>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; }?>
                </div>
            </aside>
            <?php endforeach; ?>