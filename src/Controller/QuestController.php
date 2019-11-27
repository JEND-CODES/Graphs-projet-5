<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class QuestController extends AbstractController
{

    /**
     * @Route("/quest", name="quest")
     */
    public function searchBar()
    {
        $bdd = new \PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '');

        $posts = $bdd->query('SELECT id, title, SUBSTRING(content, 1, 10) AS content FROM chapter WHERE title LIKE "article" ORDER BY id DESC');
        
        $nothing = '';
        
        if(isset($_GET['q']) AND !empty($_GET['q'])) 
        {
            $q = htmlspecialchars($_GET['q']);

            $posts = $bdd->query('SELECT id, title, SUBSTRING(content, 1, 200) AS content FROM chapter WHERE title LIKE "%'.$q.'%" ORDER BY id DESC');

            if($posts->rowCount() == 0) {
            $nothing = 'Aucun résultat';
            }
        }

        return $this->render('quest/searching.html.twig', [
            'posts' => $posts,
            'nothing' => $nothing
        ]);
    }
    
  
}
