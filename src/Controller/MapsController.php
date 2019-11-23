<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MapsController extends AbstractController
{
    /**
     * @Route("/leafletMap", name="leafletMap")
     */
    public function leafletMap()
    {
        return $this->render('maps/leafletMap.html.twig');
    }
}
