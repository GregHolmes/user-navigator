<?php

$a = 'http://localhost/user-nav/';
$b = 'http://localhost/user-nav/intellinav';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Implemented Features</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style type="text/css">
    .list-group-item:hover
    {
      background: #337ab7 !important;
      color: #fff !important;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Implemented Features</h2>
  <div class="list-group">
    <a href="<?=$b;?>/nav" class="list-group-item">Navigation</a>
    <a href="<?=$b;?>/nav/places" class="list-group-item">Place Search</a>
    <a href="<?=$b;?>/login/" class="list-group-item">Login, Register and Forgot Password</a>
    <a href="<?=$b;?>/user/checkin/" class="list-group-item">User Check-In</a>
    <a href="<?=$b;?>/user/connected/" class="list-group-item">Add to Circle</a>          
    <a href="<?=$b;?>/user/search?query=akash" class="list-group-item">Search</a> 
    <a href="<?=$b;?>/user/suggestions" class="list-group-item">User Suggestions</a>
    <a href="<?=$b;?>/user" class="list-group-item">Image Upload w/ Validation</a>
    <a href="<?=$b;?>/img/" class="list-group-item">API</a>
    <a href="<?=$b;?>/webchat/" class="list-group-item">Web Chat</a>
    <a href="<?=$b;?>/websocket-chat/" class="list-group-item">Real Time Chat</a>
    <a href="<?=$b;?>/user/logout/" class="list-group-item">Logout</a>
  </div>
</div>

</body>
</html>
