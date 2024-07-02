<?php
require 'config/constants.php';
//destroy all the session 
session_destroy();
header('location:'.ROOT_URL);
die();
?>