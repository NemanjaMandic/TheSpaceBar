<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service;

use Psr\Log\LoggerInterface;

class PlaceholderService {
    
    private $logger = null;
    
    public function setLogger(LoggerInterface $logger){
        $this->logger = $logger;
    }
    
    public function getPlaceholder($width = 300, $height = 200){
        
        if(null !== $this->logger){
            
            $this->logger->warning('something happened');
        }
        
        return sprintf("https://placekitten.com/g/%d/%d", 
              $width, $height  );
    }
}
