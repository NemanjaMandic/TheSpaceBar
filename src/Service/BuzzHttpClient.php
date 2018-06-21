<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service;

use Buzz\Client\Curl;
use Buzz\Message\Request;
use Buzz\Message\Response;


class BuzzHttpClient implements HttpClientInterface{
    
    private $client;
    
    public function __construct() {
        
        //bad practice, don't do that
        $this->client = new Curl();
        $this->client->setOption(CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36');
    }
    public function get($url) {
        
        $request = new Request('GET', $url);
        $response = new Response();
        
        $this->client->send($request, $response);
        
        return json_decode($response->getContent(), true);
    }

    public function post($url, $data) {
        
    }

    

}
