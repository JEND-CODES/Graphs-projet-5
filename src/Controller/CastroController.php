<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CastroController extends AbstractController
{
    /**
     * @Route("/castro", name="castro")
     */
    public function castro()
    {
        return $this->render('castro/index.html.twig', [
            'controller_name' => 'CastroController',
        ]);
    }
}
