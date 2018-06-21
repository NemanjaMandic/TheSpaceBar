<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $req, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        
        $form->handleRequest($req);
        
        $this->addFlash('info', 'some info');
        
        if($form->isSubmitted() && $form->isValid()){
            
            $contactFormData = $form->getData();
            
            dump($contactFormData);
            
             $message = (new \Swift_Message('Dobio si Email'))
                ->setFrom($contactFormData["email"])
                ->setTo('sadlover@mailinator.com')
                ->setBody(
                    $this->renderView(
                      'emails/registration.html.twig',
                            array('name' => $contactFormData['name'])
                    ),
                    'text/html'
                )
        /*
         * If you also want to include a plaintext version of the message
        ->addPart(
            $this->renderView(
                'emails/registration.txt.twig',
                array('name' => $name)
            ),
            'text/plain'
        )
        */
    ;
          dump($mailer);
          
          $mailer->send($message);

          $this->addFlash('success', 'Message was sent');
          
          return $this->redirectToRoute('contact');
        }
      
        
        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
            'our_form' => $form->createView()
        ]);
    }
}
