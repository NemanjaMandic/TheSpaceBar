<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service;

use App\Service\PlaceholderService;

class MojServis {
   
    private $mojParam;
    private $placeholderService;
    
    public function __construct($mojParam, PlaceholderService $placeholderService) {
        $this->mojParam = $mojParam;
        $this->placeholderService = $placeholderService;
    }
    
    public function getText(): string{
        return $this->mojParam;
    }
    
    public function getPlaceholder(){
        return $this->placeholderService->getPlaceholder();
    }
}
