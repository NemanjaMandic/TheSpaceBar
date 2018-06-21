<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Form;

/**
 * Description of ArticleForm
 *
 * @author nemanja
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Article;

class ArticleForm extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        
        $builder 
                ->add('title', TextType::class, ['attr' => ['class' => 'form-control']])
                ->add('body', TextareaType::class, [
                    'required' => false,
                    'attr' => ['class' => 'form-control']
                ])
                ->add('brochure', FileType::class, ['label' => 'Brochure (PDF file)'])
                ->add('save', SubmitType::class, [
                    'label' => 'Create Article',
                    'attr' => ['class' => 'btn btn-primary mt-3']
                    ]);
    }
    
    public function configureOptions(OptionsResolver $resolver){
        
        $resolver->setDefaults(array(
            'data_class' => Article::class,
        ));
    }
}
