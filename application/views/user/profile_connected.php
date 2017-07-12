
                            <div class="pmb-block">
                                <div class="p-header">
                                    <ul class="p-menu">
                                        <li><a href="<?php echo base_url(); ?>user/suggestions"><i class="zmdi zmdi-accounts-add hidden-xs"></i> Suggestions</a></li>
                                        <li class="active"><a href=""><i class="zmdi zmdi-accounts hidden-xs"></i> Connected</a></li>

                                    </ul>
                                    

                                </div>
                                
                                <div class="contacts c-profile clearfix row">                                
                                <?php if (count ($users) > 0): ?>
                                    <?php foreach ($users as $user): ?>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <div class="c-item">
                                                <a href="profile-connections.html" class="ci-avatar">
                                                    <img src="<?php echo base_url(); ?>uploads/dp/thumbs/200x200/<?php echo $user->avatar; ?>" alt="">
                                                </a>
                                                
                                                <div class="c-info">
                                                    <a href="<?= base_url();?>profile/view/<?= $user->username; ?>"><strong><?php echo $user->full_name; ?></strong></a>
                                                    <small><?php echo $user->user_email; ?></small>
                                                       <?php 
                                                        if($user->online_status){
                                                            echo '<small class="c-green f-15"><i class="zmdi zmdi-circle zmdi-hc-fw"></i> Online</small>';
                                                        }
                                                        else{
                                                            echo '<small class="c-red f-15"><i class="zmdi zmdi-circle zmdi-hc-fw"></i> Offline</small>';
                                                        }
                                                        ?>
                                                </div>
                                                <div class="c-footer">
                                                    <button class="btn btn-danger btn-block waves-effect remove" href="#" data-user-id="<?php echo $user->friend_id; ?>" id="sa-warning"><i class="zmdi zmdi-face-add"></i> Remove</button>
                                                </div>
                                                

                                            </div>
                                        </div>                                                    
                                    <?php endforeach ?>       
                                <?php else: ?>
                                    <?php echo "No users"; ?>                             
                                <?php endif ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>