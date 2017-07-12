<?php
                        
$thumb_width = "150";                       
$thumb_height = "150";                      

?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css">


<link type="text/css" href="<?php echo base_url();?>assets/uploader/css/imgareaselect-default.css" rel="stylesheet" />
<style type="text/css">
    .pmo-contact a {
        color: #5e5e5e !important;
    }

    .pmo-contact a:hover {
        color: #2196f3 !important;
    }
    
</style>
<script type="text/javascript" src="<?php echo base_url();?>assets/uploader/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/uploader/js/jquery.imgareaselect.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.js">
</script>
<?php echo $this->session->flashdata('msg'); ?>
<section id="content">    
    <div class="container">
                    
                    <div class="block-header">
                        <?php foreach ($info as $row ): ?> 
                      
                    </div>           
                    
                    <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow">
                            <div class="pmo-pic">
                                <div class="p-relative">
                                    <a href="#">
                                        <img class="img-responsive" src="<?php echo base_url(); ?>uploads/dp/thumbs/200x200/<?php echo $row->avatar; ?>" alt=""> 
                                    </a>                                                      
                                                                        
                                    
                                </div>
                                
                                
                                <div class="pmo-stat">
                                    <h2 class="m-0 c-white"><?php echo count($connected); ?></h2>
                                    Total Connections
                                </div>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contact</h2>
                                
                                <ul>
                                    <li><i class="zmdi zmdi-phone"></i> <?php echo $row->phone; ?></li>
                                    <li><i class="zmdi zmdi-email"></i> <?php echo $row->user_email; ?></li>
                                    <li><a href="https://fb.me/<?php echo $row->facebook; ?>" target="_blank"><i class="zmdi zmdi-facebook-box"></i><?php echo $row->full_name; ?></a></li>
                                </ul>
                            </div>
                            
                        </div>
                        
                        <div class="pm-body clearfix">
                            <ul class="tab-nav tn-justified">
                                <li class="waves-effect"><a href="<?php echo base_url();?>profile/view/<?= $row->username; ?>">About</a></li>
                                <li class="waves-effect"><a href="<?php echo base_url();?>profile/view/<?= $row->username; ?>/timeline">Timeline</a></li>
                                
                            </ul>

<?php endforeach; ?>

<script type="text/javascript" >
    $(document).ready(function() {
        $("#submitbtn").hide();
        $("#imagefile").change(function() {
            $('#submitbtn').show("slow");
        });
        $('#submitbtn').click(function() {
            $("#viewimage").html('');
            $("#viewimage").html('<img src="<?php echo base_url();?>assets/img/loading.gif"/>');
            $(".uploadform").ajaxForm({
                url: '<?php echo base_url(); ?>img/upload',
                success: showResponse
            }).submit();
        });
    });

    function showResponse(responseText, statusText, xhr, $form) {

        if (responseText.indexOf('.') > 0) {
            $("#uploadform").hide();
            $('#thumbviewimage').html('<img src="<?php echo base_url(); ?>uploads/dp/' + responseText + '"   style="position: relative;" alt="Thumbnail Preview" />');
            $('#viewimage').html('<img class="img-responsive preview" alt="" src="<?php echo base_url(); ?>uploads/dp/' + responseText + '"   id="thumbnail" />');
            $('#filename').val(responseText);
            $('#thumbnail').imgAreaSelect({
                aspectRatio: '1:1',
                handles: true,
                onSelectChange: preview
            });
        } else {
            $('#thumbviewimage').html(responseText);
            $('#viewimage').html(responseText);
        }
    }


    function preview(img, selection) {
        var scaleX = <?php echo $thumb_width;?> / selection.width;
        var scaleY = <?php echo $thumb_height;?> / selection.height;

        $('#thumbviewimage > img').css({
            width: Math.round(scaleX * img.width) + 'px',
            height: Math.round(scaleY * img.height) + 'px',
            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
        });

        var x1 = Math.round((img.naturalWidth / img.width) * selection.x1);
        var y1 = Math.round((img.naturalHeight / img.height) * selection.y1);
        var x2 = Math.round(x1 + selection.width);
        var y2 = Math.round(y1 + selection.height);

        $('#x1').val(x1);
        $('#y1').val(y1);
        $('#x2').val(x2);
        $('#y2').val(y2);

        $('#w').val(Math.round((img.naturalWidth / img.width) * selection.width));
        $('#h').val(Math.round((img.naturalHeight / img.height) * selection.height));

    }

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

                            
                            