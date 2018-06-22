<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Wallpaper;

class LoadWallpaperData extends Fixture{
    //put your code here
    public function load(ObjectManager $manager) {
        
        $wallpaper = new Wallpaper();
        $wallpaper->set
    }

}
