<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\json_decode;

/**
 * Description of GuzzleHttpClient
 *
 * @author nemanja
 */
class GuzzleHttpClient implements HttpClientInterface{
    
    private $client;
    
    public function __construct(\GuzzleHttp\Client $client) {
        
        $this->client = $client;
    }
    public function get($url) {
        
       
        $response = $this->client->get($url);
        
        return json_decode($response->getBody(), true);
    }

    public function post($url, $data) {
        
    }

}
