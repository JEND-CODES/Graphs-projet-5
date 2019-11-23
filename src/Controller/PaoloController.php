<?php

namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\JsonResponse;


class PaoloController extends AbstractController
{
    /**
     * @Route("/paolo", name="paolo")
     */
    public function paolo()
    {
       
        return new JsonResponse(array('PAOLO'));
    }
    
}