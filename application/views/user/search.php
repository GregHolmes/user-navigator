          
            <section id="content">

                <div class="container">
                    
                    
                    <!-- Add button -->
                    <button class="btn btn-float btn-danger m-btn"><i class="zmdi zmdi-plus"></i></button>
                
                    
                    <div class="card">
                        <div class="lv-header-alt clearfix m-b-5">
                            <h2 class="lvh-label hidden-xs f-20"><?php echo '<span class="c-red">'.$count.'</span> results were found for the search for <span class="c-red">'.$query.'</span>'; ?> </h2>
                            
                            
                                                        
                        </div>

                        
                        <div class="card-body card-padding">
                            
                            <div class="contacts clearfix row">                        
                                <?php 
                                    if(!empty($error)){echo $error;}
                                    else if(is_array($users))
                                    {
                                        foreach ($users as $row ): ?>
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div class="c-item">
                                        <a href="#" class="ci-avatar">
                                            <img src="<?php echo base_url(); ?>uploads/dp/thumbs/200x200/<?php echo $row['data']->avatar; ?>" alt="">
                                        </a>
                
                                        <div class="c-info">
                                            <strong><a href="<?= base_url(); ?>profile/view/<?= $row['data']->username; ?>"><?php echo $row['data']->first_name.' '.$row['data']->last_name; ?></a></strong>
                                            <small><?php echo $row['data']->user_email; ?></small>
                                            <?php if($row['data']->online_status)
                                            {
                                                echo '<small class="c-green f-15"><i class="zmdi zmdi-circle zmdi-hc-fw"></i> Online</small>';
                                            }
                                            else
                                            {
                                                echo '<small class="c-red f-15"><i class="zmdi zmdi-circle zmdi-hc-fw"></i> Offline</small>';
                                            }
                                            ?>
                                        </div>
                
                                        <?php if (!$row['is_in_circles'] AND $row['data']->uid != $this->session->userdata('logged_in')['uid']): ?>
                                            <div class="c-footer">
                                                <button href="#" data-user-id="<?php echo $row['data']->uid; ?>" class="waves-effect add"><i class="zmdi zmdi-check"></i> Add</button>
                                            </div>                                            
                                        <?php endif ?>
                                    </div>
                                </div> 
                                <?php endforeach; } ?>                                                                                                               
                            </div>
                

                        </div>
                    </div>
                </div>  

                <script type="text/javascript">
                    $(document).ready(function() {


            
        $('#save_thumb').click(function() {
            var x1 = $('#x1').val();
            var y1 = $('#y1').val();
            var x2 = $('#x2').val();
            var y2 = $('#y2').val();
            var w = $('#w').val();
            var h = $('#h').val();
            if (x1 == "" || y1 == "" || x2 == "" || y2 == "" || w == "" || h == "") {
                alert("Please make a selection first");
                return false;
            } else {
                return true;
            }
        });
        $('button.waves-effect.add').click(function() {            
            var thisDialog = this;
            var id = $(this).attr('data-user-id');
            swal({
                title: "Add this person to your circles?",
                text: "This user will be able to see your online status and profile",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, add!",
                closeOnConfirm: false
            }, function() {
                swal("Added!", "You have now added this person to your circle.", "success");
                $(thisDialog).html($(thisDialog).html().replace("Add", "Added"));
                $(thisDialog).prop('disabled', true);
                $.ajax({
                       type: "POST",
                       url: '<?php echo base_url(); ?>ajax/circle_add',
                       data: {'friend_id' : id }, 
                       success: function(data)
                       {                                
                            
                       }
                });                
            });
        });

        $('button.waves-effect.remove').click(function() {            
            var thisDialog = this;
            var id = $(this).attr('data-user-id');
            swal({
                title: "Remove this person to your circles?",
                text: "This user will not be able to see your online status and profile",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, remove!",
                closeOnConfirm: false
            }, function() {
                swal("Removed!", "Successfully removed this person to your circle.", "success");
                $(thisDialog).html($(thisDialog).html().replace("Remove", "Removed"));
                $(thisDialog).prop('disabled', true);
                $.ajax({
                       type: "POST",
                       url: '<?php echo base_url(); ?>ajax/circle_remove',
                       data: {'friend_id' : id }, 
                       success: function(data)
                       {                                
                            
                       }
                });                
            });
        });



    });

                </script>

            </section>
        </section>                        
    </body>
</html>