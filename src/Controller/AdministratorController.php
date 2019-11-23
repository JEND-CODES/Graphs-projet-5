<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Administrator;
use App\Form\AdministratorType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class AdministratorController extends AbstractController
{
    /**
     * @Route("/administrate", name="security_administrate")
     */
    public function administrate(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $administrator = new Administrator();
        
        $formAdmin = $this->createForm(AdministratorType::class, $administrator);
        
        $formAdmin->handleRequest($request);
        
        if($formAdmin->isSubmitted() && $formAdmin->isValid())
        {
            $hash = $encoder->encodePassword($administrator, $administrator->getPassword());
            
            $administrator->setPassword($hash);
            
            $manager->persist($administrator);
            $manager->flush();
            
            return $this->redirectToRoute('connect_admin');
        }
    
        return $this->render('administrator/admin.html.twig', [
            'formAdmin' => $formAdmin->createView()
        ]);
    }
    
    
    /**
     * @Route("/connected", name="connect_admin")
     */
    public function connected()
    {
        return $this->render('administrator/connected.html.twig');
    }
    
    /**
     * @Route("/nosession", name="nosession")
     */
    public function nosession() {}
    
    
}
