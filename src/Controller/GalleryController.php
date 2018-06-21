<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GalleryController extends Controller
{
    /**
     * @Route("/gallery", name="gallery")
     */
    public function index(Request $request)
    {
        $images = [
                'alien-profile.png',
                'asteroid.jpeg',
                'astronaut-profile.png',
                'lightspeed.png',
                'mercury.jpeg',
                'meteor-shower.jpg',
                'space-ice.png',
                'space-nav.jpg'
                ];
                
        $paginator  = $this->get('knp_paginator');
        dump($paginator);
        $pagination = $paginator->paginate(
            $images,
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );
        return $this->render('gallery/index.html.twig', [
            'controller_name' => 'GalleryController',
            'images' => $pagination,
            
            
        ]);
    }
    
    /**
     * @Route("/gallery/view", name="show_image")
     */
    public function show(){
        
        $image = 'meteor-shower.jpg';
        
        return $this->render('gallery/show.html.twig', [
            'image' => $image,
        ]);
    }
}
