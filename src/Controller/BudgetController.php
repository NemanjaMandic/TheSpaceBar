<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * @Route("/budget")
 */
class BudgetController extends AbstractController{
   
    /**
     * @Route("/", name="get_budgets")
     */
    public function getBudgets(){
        
       $request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
       
        return new JsonResponse([
            "incomeStreams" => [
                [
                    "key" => 1,
                    "name" => "Paycheck",
                    "frequency" => 2,
                    "amount" => 2000,
                ],
                [
                    "key" => 2,
                    "name" => "Investment Income",
                    "frequency" => 1,
                    "amount" => 200,
                ]
                
            ],
            "expenses" => [
                [
                    "key" => 1,
                    "name" => "Mortgage",
                    "amount" => -1300,
                ],
                [
                    "key" => 2,
                    "name" => "HOA",
                    "amount" => -400,
                ],
                [
                    "key" => 3,
                    "name" => "Phone",
                    "amount" => -1300,
                ],
                [
                    "key" => 4,
                    "name" => "Internet",
                    "amount" => -60,
                ]
            ],
        ]);
    }
}
