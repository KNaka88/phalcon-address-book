<?php

use Phalcon\Mvc\Controller;

class BbcController extends ControllerBase
{
   public function indexAction()
   {
       $curl = curl_init();
       curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://newsapi.org/v1/articles?source=bbc-news&sortBy=top&apiKey=045d6c5613b1440bb7263e5e5c247df5',
            CURLOPT_USERAGENT => 'Koji'
          ));
        $articles = curl_exec($curl);
        curl_close($curl);
        $results = json_decode($articles);
        $sample = "Hello World";
   }

}
