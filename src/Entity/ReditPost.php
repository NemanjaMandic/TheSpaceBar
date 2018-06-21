<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ORM\Table(name="redit_posts")
 * @ApiResource()
 */

class ReditPost {
   
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="text")
     */
    private $title;
    
    /**
     * Belongs to one author
     * @ORM\ManyToOne(targetEntity="ReditAuthor", inversedBy="posts") 
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;
    
    public function getId(){
        return $this->id;
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    
    public function getAuthor(){
        return $this->author;
    }
    
    public function setAuthor(ReditAuthor $author){
        
        $this->author = $author;
        
        return $this;
    }
    
}
