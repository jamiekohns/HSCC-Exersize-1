<?php
 
namespace App\RestRequest;
 
class MetaWeather extends RestRequest{
 
   public function __construct(){
        parent::__construct('location');
   }
 
   public function search($search){
       $endpoint = '/search/?query=' . $search;
       $response = parent::send($endpoint);
       return $response;
 
   }
 
   public function location($woeid){
       $response = parent::send('/' . $woeid . '/');
       return $response;
 
   }
}

