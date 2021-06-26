<?php  
require 'innit.php';
?>
<?php
$page_title = 'Log In'?>
<?php
include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_header.php';
?>
<?php
include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_nav.php';
?>
<?php
use App\Database\Location;

$location = new Location();
$location->add_location(12345,'test', 'email@email.com');