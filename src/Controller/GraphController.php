<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GraphController extends AbstractController
{
    
    /**
     * @Route("/highchartSQL2", name="highchartSQL2")
     */
    public function highchartSQL2()
    {
        $bdd = new \PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', '');

        $stmt = $bdd->prepare('
        SELECT *, 
        DATE_FORMAT(created_at, \'%d-%M-%Y\') AS commentDate,
        DAY(created_at) AS day, COUNT(*) AS counter
        FROM comment
        WHERE Day(created_at) > 0
        AND created_at >= current_date - interval 30 DAY
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
