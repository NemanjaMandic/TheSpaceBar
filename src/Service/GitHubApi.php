<?php


namespace App\Service;

use GuzzleHttp\Client;

class GitHubApi {
   
    
    public function getHome(){
        
    }
    
    public function getProfile($username){
        
       
        $data = $this->httpClient->get('https://api.github.com/users/' . $username);
        
       
        
        return [
            'avatar_url' => $data['avatar_url'],
            'name' => $data['name'],
            'login' => $data['login'],
            
            'details' => [
                "company" => $data['company'],
                "created_at" => 'Joined on ' . (new \DateTime($data['created_at']))->format('d m Y'),
                "location" => $data['location'],
            ],
            
            "blog" => $data['blog'],
            
            'social_data' => [
                "Public Repos" => $data['public_repos'],
                "Public Gists" => $data['public_gists'],
                "Followers" => $data['followers'],
                "Following" => $data['following'],
            ],
            'bio' => $data['bio'],
            'repo_count' => 123,
            'most_stars' => 322,
            'repos' => [
                [
                    "stargazers_count" => 5,
                    "name" => "angular-symfony-3.example",
                    "description" => "learn angular and symfony",
                    "url" => "https://api.github.com/users/codereviewvideos",
                ],
                [
                    "stargazers_count" => 2,
                    "name" => "ruby on rails",
                    "description" => "learn ruby and symfony",
                    "url" => "https://facebook.com",
                ],
                [
                    "stargazers_count" => 4,
                    "name" => "html/css",
                    "description" => "html and css template",
                    "url" => "https://rt.com",
                ],
                [
                    "stargazers_count" => 7,
                    "name" => "Javascript",
                    "description" => "learn javascript and symfony",
                    "url" => "https://youtube.com",
                ]
                
            ],
            'avatar_url' => $data['avatar_url'],
            'name' => $data['name'],
            'login' => $data['login'],
            
            'details' => [
                "company" => $data['company'],
                "created_at" => 'Joined on ' . (new \DateTime($data['created_at']))->format('d m Y'),
                "location" => $data['location'],
            ],
            
            "blog" => $data['blog'],
            
            'social_data' => [
                "Public Repos" => $data['public_repos'],
                "Public Gists" => $data['public_gists'],
                "Followers" =>    $data['followers'],
                "Following" =>    $data['following'],
            ]
        ];
    }
    
    public function getRepos($username){
       
        
        $data = $this->httpClient->get('https://api.github.com/users/' . $username . '/repos');
        
         
        return [
            'repo_count' => count($data),
            'most_stars' => array_reduce($data, function($mostStars, $currentRepo){
                       
                return $currentRepo['stargazers_count'] > $mostStars ? $currentRepo['stargazers_count'] : $mostStars;
            }, 0),
                    
            'repos' => $data,
        ];
    }
}
