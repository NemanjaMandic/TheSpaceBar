<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\ReditPost;
use App\Service\RedditScraper;

class ReditController extends Controller
{
    
//    private $reditScraper;
//    
//    public function __construct(RedditScraper $reditScraper) {
//        $this->reditScraper = $reditScraper;
//    }
    /**
     * @Route("/redit", name="redit")
     */
    public function index()
    {
        
        $someConditional = true;
        
        $query = $this->getDoctrine()
                ->getRepository(ReditPost::class)
                ->createQueryBuilder('p');
        
       
        if($someConditional){
            $query->where('p.id > :id')
                  ->setParameter('id', 50);
        }
        
        $posts = $query->getQuery()->getResult();
        
        dump($posts);
        
        return $this->render('redit/index.html.twig', [
            'posts' => $posts,
        ]);
    }
    
    /**
     * @Route("/createredit/{text}", name="createredit")
     */
    public function create($text){
        
        $em = $this->getDoctrine()->getManager();
        
        $post = new ReditPost();
        $post->setTitle('Hey ' . $text);
        
        $em->persist($post);
        $em->flush();
        
        return $this->redirectToRoute('redit');
    }
    
    /**
     * @Route("/redit/update/{id}/{text}", name="update_redit")
     */
    public function updateRedit($id, $text){
        
        $em = $this->getDoctrine()->getManager();
        
        $post = $em->getRepository(ReditPost::class)
                ->find($id);
        
        if(!$post){
            throw $this->createNotFoundException("there is not ReditPost with id " . $id . " found");
        }
        
        $post->setTitle($text);
        $em->flush();
        
        return $this->redirectToRoute('redit');
    }
    
    /**
     * @Route("/redit/delete/{id}", name="delete_redit")
     */
    public function delete($id){
        
        $em = $this->getDoctrine()->getManager();
        
        $post = $em->getRepository(ReditPost::class)
                ->find($id);
        
        if(!$post){
            return $this->redirectToRoute('redit');
        }
        
        $em->remove($post);
        $em->flush();
        
        return $this->redirectToRoute('redit');
    }
    
    /**
     * @Route("/redit/scrape", name="scraper")
     */
    public function scraper(){
        
        $reddit = $this->get('reddit_scraper');
        $result = $reddit->scrape();
        
         return $this->render('redit/index.html.twig', [
            'posts' => []
        ]);
    }
}
