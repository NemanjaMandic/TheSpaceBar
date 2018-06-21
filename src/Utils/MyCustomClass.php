<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyCustomClass
 *
 * @author nemanja
 */
namespace App\Utils;

class MyCustomClass {
   
    public $prop = "hello world";
    private $priv = "ovo je privatno";
    
    private $arr = [20, 200, 500, 600];
    
   
    public function slugify(string $text):string{
        
       // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
    }
    
    
    public function values(){
        
        yield from gens();

        yield 300;
        yield 500;
    }
    
    function gens(){
        yield "Ovo je iz gens";
    }
}
