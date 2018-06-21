<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of HomepageController
 *
 * @author nemanja
 */
class HomepageController extends Controller{
    
    /**
     * @Route("/", name="home_route")
     */
    public function homePage(){
        
         

        $abstract = [
            "abstract-background-pink.jpg",
            "abstract-black-and-white-wave.jpg",
            "abstract-black-multi-color-wave.jpg",
            "abstract-blue-green.jpg",
            "abstract-blue-line-background.jpg",
            "abstract-red-background-pattern.jpg",
            "abstract-shards.jpeg",
            "abstract-swirls.jpeg",
        ];
        $summer = [
            "landscape-summer-beach.jpg",
            "landscape-summer-field.jpg",
            "landscape-summer-flowers.jpg",
            "landscape-summer-hill.jpg",
            "landscape-summer-mountain.png",
            "landscape-summer-sea.jpg",
            "landscape-summer-sky.jpg",
        ];
        $winter = [
            "landscape-winter-canada-lake.jpg",
            "landscape-winter-high-tatras.jpg",
            "landscape-winter-snow-lake.jpg",
            "landscape-winter-snow-mountain.jpeg",
            "landscape-winter-snow-trees.jpg",
            "landscape-winter-snowboard-jump.jpg",
            "landscape-winter-snowy-fisheye.png",
            
        ];
        
        $images = array_merge($abstract, $summer, $winter);
        
        
        
        shuffle($images);
        
        $randomizedImages = array_slice($images, 0, 8);
        
        return $this->render('index.html.twig', [
            'random' => $randomizedImages,
            'abstract' => array_slice($abstract, 0, 2),
            'summer' => $summer,
            'winter' => $winter,
        ]);
    }
    
    /**
     * @Route("/wprest")
     */
    public function gimmeRest(){
        return $this->render("partials/wprest.php");
    }
}
