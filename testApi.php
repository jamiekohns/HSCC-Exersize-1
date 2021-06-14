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
use App\RestRequest\MetaWeather;


$weather = new MetaWeather();

$response = $weather->location('2357024');
die(var_dump($response));