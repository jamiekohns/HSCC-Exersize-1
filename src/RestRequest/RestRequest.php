<?php

namespace App\RestRequest;

class RestRequest {
    protected $baseUrl;

    public function __construct(string $baseUrl){
        $this->baseUrl = $_ENV['API_BASE_URL'] . '/' . $baseUrl;
    }

    protected function send(string $endpoint){
        $url = sprintf(
            '%s%s',
            $this->baseUrl,
            $endpoint
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "content-type: application/json",
        ]);

        $response = curl_exec($ch);
        // var_dump($response);
        $response = json_decode($response, true);

        return $response;
    }
}