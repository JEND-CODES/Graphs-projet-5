<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GraphController extends AbstractController
{
    /**
     * @Route("/highchartSQL", name="highchartSQL")
     */
    public function highchartSQL()
    {
    
        return $this->render('graph/highchartSQL.html.twig');
    }
    
    // 2 novembre -> transfert FTP de la démo symfovue13 en PROD sur symfony1.planetcode.fr : la requête SQL ci-dessous a fonctionné pour l'affichage d'un graph spécifique MAIS lorsque je fais d'autres requêtes quasi identiques placées dans des fichiers PHP du dossier "charts" et que j'essaie de récupérer les données au format JSON pour générer d'autres Graphiques, cela n'a pas marché en PROD (WHY ??) mais pourtant ça marche en DEV.. La différence ici c'est que la requête est placée dans le Controller -> qui contrôle l'affichage de la page contenant la requête.. Lorsque j'affiche la route "/highchartSQL2" en PROD j'obtiens bien l'Array JSON demandé
    // Note du 5 novembre : les données n'ont pas été générées probablement parce qu'il n'y a pas de routes qui contrôlent leur affichage (comme par exemple les fichiers:"graph/JsonArrayTest.php" ou "graph/dataSQL.php" appelés par les Highcharts via leur adresse URL)
    
    /**
     * @Route("/highchartSQL2", name="highchartSQL2")
     */
    public function highchartSQL2()
    {
        $bdd = new \PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '');
        
        // Cf. https://stackoverflow.com/questions/13297465/one-sql-query-for-all-count-of-posts-each-day
        
        $stmt = $bdd->prepare('
        SELECT *, 
        DATE_FORMAT(created_at, \'%d-%M-%Y\') AS commentDate,
        DAY(created_at) AS day, COUNT(*) AS counter
        FROM comment
        WHERE Day(created_at) > 0
        GROUP BY DAY(created_at) 
        ORDER BY created_at
        ');

        $stmt->execute();

        $json = [];

        while($row=$stmt->fetch(\PDO::FETCH_ASSOC)){
            extract($row);
            //echo $id;
            //echo $title;
            $json[]= [(string)$commentDate, (int)$counter];
        }
        echo json_encode($json);
        
        return $this->render('graph/sql_datas.php');
    }
    
    
    // Request qui renvoie la nombre de commentaires par articles -> pour édition de la zone STATS en Back Office 
    /**
     * @Route("/highchartSQL3", name="highchartSQL3")
     */
    public function highchartSQL3()
    {
        $bdd2 = new \PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '');

        $stmt2 = $bdd2->prepare('
        SELECT *, 
        (SELECT COUNT(chapter_id) FROM comment WHERE chapter_id = chapter.id) as total FROM chapter 
        ORDER by created_at
        ');

        $stmt2->execute();

        $json2 = [];

        while($row2=$stmt2->fetch(\PDO::FETCH_ASSOC)){
            extract($row2);
            //echo $id;
            //echo $title;
            $json2[]= [(string)$title,(int)$total];
        }
        echo json_encode($json2);
        
        return $this->render('graph/sql_datas2.php');
    }
    
    
    
    
    
    
}
