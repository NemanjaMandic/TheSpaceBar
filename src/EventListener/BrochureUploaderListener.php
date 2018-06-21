<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use App\Entity\Article;
use App\Service\FileUploader;


/**
 * Description of BrochureUploaderListener
 *
 * @author nemanja
 */
class BrochureUploaderListener {
   
    private $uploader;
    
    public function __construct(FileUploader $uploader) {
        $this->uploader = $uploader;
    }
    
    public function prePersist(LifecycleEventArgs $args){
        
        $entity = $args->getEntity();
        $this->uploadFile($entity);
        
    }
    
    public function preUpdate(PreUpdateEventArgs $args){
        
        $entity = $args->getEntity();
        $this->uploadFile($entity);
        
    }
    
    private function uploadFile($entity){
        
        if(!$entity instanceof Article){
            return;
        }
        
        $file = $entity->getBrochure();
        
        if($file instanceof UploadedFile){
            $fileName = $this->uploader->upload($file);
            $entity->setBrochure($fileName);
        }
    }
    
    public function postLoad(LifecycleEventArgs $args){
        
        $entity = $args->getEntity();
        
        if(!$entity instanceof Article){
            return;
        }
        
         if ($fileName = $entity->getBrochure()) {
            $entity->setBrochure(new File($this->uploader->getTargetDirectory().'/'.$fileName));
        }
    }
}
