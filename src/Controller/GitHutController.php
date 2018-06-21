<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Client;
use GuzzleHttp\json_decode;
use App\Service\GitHubApi;
/**
 * Description of GitHutController
 *
 * @author nemanja
 */
class GitHutController extends Controller{
   
    private $gitApi;
    
    
   
    
    /**
     * @Route("/githut", name="githut_route", defaults={"username": "NemanjaMandic"})
     */
    public function githut($username){
        
         
    
        
        return $this->render("githut/index.html.twig", [
           
 
            'username' => $username,
            
           
        ]
        );
    }
    
    /**
     * @Route("/githut/profile/{username}", name="profile_path")
     */
    public function profile(GitHubApi $gitApi, $username){
        
        $profileData = $gitApi->getProfile($username);
        
        return $this->render("githut/profile.html.twig", $profileData);
    }
    
    /**
     * @Route("/githut/repos/{username}", name="repos_path")
     */
    public function repos(GitHubApi $gitApi, $username){
        
        $reposData = $gitApi->getRepos($username);
        
        return $this->render("githut/repos.html.twig", $reposData);
    }
    
    
}
