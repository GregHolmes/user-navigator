
                            <div class="pmb-block">
                                <div class="p-header">
                                    <ul class="p-menu">
                                        <li class="active"><a href=""><i class="zmdi zmdi-accounts-add hidden-xs"></i> Suggestions</a></li>
                                        <li><a href="<?php echo base_url(); ?>user/connected"><i class="zmdi zmdi-accounts hidden-xs"></i> Connected</a></li>

                                    </ul>
                                    
                                    
                                </div>
                                
                                <div class="contacts c-profile clearfix row">                                
                                <?php if (count ($users) > 0): ?>
                                    <?php foreach ($users as $user): ?>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <div class="c-item">
                                                <a href="#" class="ci-avatar">
                                                    <img src="<?php echo base_url(); ?>uploads/dp/thumbs/200x200/<?php echo $user->avatar; ?>" alt="">
                                                </a>
                                                
                                                <div class="c-info">
                                                    <strong><?php echo $user->full_name; ?></strong>
                                                    <small><?php echo $user->user_email; ?></small>
                                                </div>
                                                
                                                <div class="c-footer">
                                                    <button class="waves-effect add" data-user-id="<?php echo $user->uid; ?>" id="sa-warning"><i class="zmdi zmdi-face-add"></i> Add</button>
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