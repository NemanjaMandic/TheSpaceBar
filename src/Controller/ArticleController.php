<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Psr\Log\LoggerInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\File\File;
use App\Service\FileUploader;

use App\Form\ArticleForm;

use App\Entity\Article;
use App\Utils\MyCustomClass;

class ArticleController extends Controller
{
    /**
     * @Route("/articles", name="default_ruta")
     */
    public function index()
    {
        $articles = $this->getDoctrine()
                         ->getRepository(Article::class)
                         ->findAll();
        
        return $this->render('article/homepage.html.twig', [
            'artikli' => $articles
        ]);
    }
    
    /**
     * @Route("/article/somepage/{name}", name="some_page", requirements={"name" = "[A-Za-z]+"})
     */
    public function somePage($name = "Nemanja"){
        
        
        return $this->render('article/somepage.html.twig', [
            'naslov' => 'Naslov u Body-u',
            'txt' => 'ovde gomila lorem ipsum teksta ovde gomila lorem ipsum teksta ovde gomila lorem ipsum teksta',
            'ime' => $name
        ]);
    }
    /**
     * @Route("/article/new", name="new_article")
     * @Method({"GET", "POST"})
     */
    public function newArticle(Request $request, FileUploader $fileUploader){
        
        $article = new Article();
        
        $form = $this->createForm(ArticleForm::class, $article);           
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
            $article = $form->getData();
            
            $file = $article->getBrochure();
            
            $fileName = $fileUploader->upload($file);
            
          
            $article->setBrochure($fileName);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            
            $this->addFlash('success', 'You created an Article!');
            
            return $this->redirect($this->generateUrl('app_product_list'));
        }
        
        return $this->render("article/new.html.twig", [
            'form' => $form->createView()
        ]);
    }
    
     /**
     * @Route("/article/edit/{id}", name="edit_article")
     * @Method({"GET", "POST"})
     */
    public function updateArticle(Request $request, $id){
        
        $article = new Article();
        
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        
        $form = $this->createForm(ArticleForm::class, $article);           
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            
                        
            $em = $this->getDoctrine()->getManager();
            
            $em->flush();
            
            return $this->redirectToRoute("default_ruta");
        }
        
        return $this->render("article/edit.html.twig", [
            'form' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/article/delete/{id}", name="delete_article")
     * @Method({"DELETE"})
     */
    public function deleteArticle(Request $request, $id){
        
        $article = $this->getDoctrine()
                ->getRepository(Article::class)
                ->find($id);
        
       
         $em = $this->getDoctrine()->getManager();
         
         $em->remove($article);
         $em->flush();
         
         $response = new Response();
         return $response->send();
         
        
        
    }
   /**
     * @Route("/article/{id}", name="article_show")
     */
    public function showArticle($id){
        
       
        
        $article = $this->getDoctrine()
                ->getRepository(Article::class)
                ->find($id);
        
//        
//        if(!$article){
//            throw $this->createNotFoundException('No products with id ' . $id . " found");
//        }
        
                
        return $this->render('article/show.html.twig', [
            'clanak' => $article
        ]);
    }
    
    
//    /**
//     * @Route("/article/save")
//     */
//    public function save(){
//        
//        $entityManager = $this->getDoctrine()->getManager();
//        
//        $article = new Article();
//        
//        $article->setTitle("Naslov Drugog Clanka");
//        $article->setBody("this is the body for the second article");
//        
//        $entityManager->persist($article);
//        
//        $entityManager->flush();
//        
//        return new Response("Saves article with the id of " . $article->getId());
//    }
     
    
    
   
    /**
     * @Route("/parse")
     */
    public function parse(){
       
        
        $custom = new MyCustomClass();
        
        $control = $custom->gens();
        
      
       
       return new Response($control);
        
      
    }
    
    /**
     * @Route("/mojservis", name="mojservis")
     */
    public function mojServis(){
        
        $mojServis = $this->get('moj_servis');
        return $this->render('article/mojservis.html.twig', [
            'mojServis' => $mojServis->getText(),
            'placeholderImage' => $mojServis->getPlaceholder()
        ]);
    }
    /**
     * @Route("/news/{slug}", name="show_article")
     */
    public function show($slug, Environment $env){
        
        $comments = ['I ate rock once. It did not taste like bacon',
                     'Wooho Im going on an all-asteroid diet',
                     'I like bacon too. Buy some from my site'];
        
                
        
        $html = $env->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', '', $slug)),
            'slug' => $slug,
            'komentari' => $comments,
        ]);
        
        return new Response($html);
    }
    
    /**
     * @Route("/news/{slug}/srce", name="article_toggle_heart")
     * @Method("POST")
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger){
        
        $logger->info("Article is been hearted");
        
        return new JsonResponse(['hearts' => rand(5, 100), 'slug' => $slug]);
    }
    
    
    /**
     * @Route("/support", name="support")
     */
//    public function supportAction(SomeService $someService){
//        $someService = $this->container->getParameter('app.come.parameter');
//        
//        $someService->doSomething($someService);
//    }
    
    /**
     * @Route("/test")
     */
    public function testAction(){
        
        return $this->render("article/test.html");
    }
    
    /**
     * @return string
     */
    private function generateUniqueFileName(){
        return md5(uniqid());
    }
}
