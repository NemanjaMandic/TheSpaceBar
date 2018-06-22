<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SetupWallpapersCommand extends Command
{
    protected static $defaultName = 'app:setup-wallpapers';

   
    protected function configure()
    {
        $this
            ->setName('app:setup-wallpaper')
            ->setDescription('Grabs all the local wallpapers and creates a Wallpaper entity for each one.')
            
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
       //$confDir = dirname(__DIR__)."/public/images/*.*";
       
      
        
        $output->writeln([
            'Wallpaper Creator',
            '=================',
            '',
        ]);
    }
}
