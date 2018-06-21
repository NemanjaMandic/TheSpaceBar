<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ReditAuthorRepository")
 @ORM\Table(name="redit_author", indexes={
 *   @ORM\Index(name="index_author_name", columns={"name"})
 * })
 */
class ReditAuthor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, nullable=true, length=255)
     */
    private $name;

    /**
     * One Author has many posts
     * @ORM\OneToMany(targetEntity="ReditPost", mappedBy="author") 
     */
    private $posts;
    
    public function __construct(){
        $this->posts = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    
    public function getPosts(){
        return $this->posts;
    }
    
    public function addPost(ReditPost $reditPost){
        
        if(!$this->posts->contains($reditPost)){
            
            $reditPost->setAuthor($this);
            $this->posts->add($reditPost);
            
        }
        
        return $this;
    }
    
    public function setPosts($posts){
        $this->posts[] = $posts;
        
        return $this;
    }
}
