<?php
require 'autoload.php';
require 'src/Helpers.php';
require 'src/Api.php';
$api = new \Cloudinary\Api();

    \Cloudinary::config(array( 
  "cloud_name" => "veve", 
  "api_key" => "186847111974665", 
  "api_secret" => "B11tZpgxJ1N0u-EH9_F1qoKmdrc" 
));
?>