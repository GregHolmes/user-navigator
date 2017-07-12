<?php

echo form_open_multipart('user/do_upload_profile');?>
Upload a new image: 
<input type="file" name="userfile" size="20" />
<?php echo form_submit('upload', 'Upload');
echo form_close();