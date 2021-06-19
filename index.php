<?php
require 'innit.php';
?>
<?php
$page_title = 'Weather'?>
<?php
include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_header.php';
?>
<?php
include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_nav.php';
?>
<?php 
use App\RestRequest\MetaWeather;
$n = 0;
$weather = new MetaWeather();

if($_GET['search'] !== NULL){
    $response = $weather->search($_GET['search']);
    $n = 0;
    if($_GET['n'] ?? NULL !== NULL){
        $n = $_GET['n'];
    }
    //die(var_dump($response));
    if($response){
        $city = $response[0]['woeid'];
        $weather_information = $weather->location($city);
        //$weather_information = NULL;
        //var_dump($weather_information['consolidated_weather'][$n]);
        makeWeather($n, (array)$weather_information, $response[0]["title"]);

        if($n <= 3){
        echo '<div style="position: absolute; left: 955px; top: 350px;">
        <a class="btn btn-primary" href="'. $_ENV['BASE_URL'] . "?search=" .$_GET["search"] ."&n=" . ($n+1).'"> next </a>
        </div>';
        }
        if($n >= 1){
        echo '<div style="position: absolute; left: 400px; top: 350px;">
        <a class="btn btn-primary" href="'. $_ENV['BASE_URL'] . "?search=" .$_GET["search"] ."&n=" . ($n-1).'"> previous </a>
        </div>';
        }
    }
}else{
    $response = $weather->search('atlanta');
    $n = 0;
    if($_GET['n'] ?? NULL !== NULL){
        $n = $_GET['n'];
    }
    //die(var_dump($response));
    if($response){
        $city = $response[0]['woeid'];
        $weather_information = $weather->location($city);
        //$weather_information = NULL;
        //var_dump($weather_information['consolidated_weather'][$n]);
        makeWeather($n, (array)$weather_information, $response[0]["title"]);

        if($n <= 3){
        echo '<div style="position: absolute; left: 955px; top: 350px;">
        <a class="btn btn-primary" href="'. $_ENV['BASE_URL'] . "?search=" .$_GET["search"] ."&n=" . ($n+1).'"> next </a>
        </div>';
        }
        if($n >= 1){
        echo '<div style="position: absolute; left: 400px; top: 350px;">
        <a class="btn btn-primary" href="'. $_ENV['BASE_URL'] . "?search=" .$_GET["search"] ."&n=" . ($n-1).'"> previous </a>
        </div>';
        }
    }
}

function makeWeather($n, $weather_information,$city){
    //var_dump($weather_information);
    
    if($weather_information){

    $temperature = (int)$weather_information["consolidated_weather"][$n]["the_temp"];
    $wind = (int)$weather_information["consolidated_weather"][$n]['wind_speed'] . ' mph';

    echo '<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4 col-sm-12 col-xs-12">
            <div class="card p-4">
                <div class="d-flex">
                    <h6 class="flex-grow-1">'. $city.'</h6>
                    <h6>' . $weather_information["consolidated_weather"][$n]["applicable_date"] .'</h6>
                </div>
                <div class="d-flex flex-column temp mt-5 mb-3">
                    <h1 class="mb-0 font-weight-bold" id="heading">' . $temperature . "°F" .'</h1> <span class="small grey">' . $weather_information["consolidated_weather"][$n]['weather_state_name'] . '</span>
                </div>
                <div class="d-flex">
                    <div class="temp-details flex-grow-1">
                        <p class="my-1"> <img src="https://i.imgur.com/B9kqOzp.png" height="17px"> <span>' . $wind  .'</span> </p>
                        <p class="my-1"> <i class="fa fa-tint mr-2" aria-hidden="true"></i> <span>'. $weather_information["consolidated_weather"][$n]['humidity'] . '%' .'</span> </p>
                        <p class="my-1"> <h6> Air Pressure </h6> <span>'. $weather_information["consolidated_weather"][$n]["air_pressure"] . ' mBar' .'</span> </p>
                    </div>
                    <div> <img src="https://www.metaweather.com/static/img/weather/png/' . $weather_information['consolidated_weather'][$n]['weather_state_abbr'] .'.png" width="100px"> </div>
                </div>
            </div>
        </div>
    </div>
</div>';
    }
}
