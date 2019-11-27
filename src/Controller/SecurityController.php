<?php

namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use App\Entity\User;
    use App\Form\RegistrationType;
    use Symfony\Component\HttpFoundation\Request;
    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        
        $formSecurity = $this->createForm(RegistrationType::class, $user);
        
        $formSecurity->handleRequest($request);
        
        if($formSecurity->isSubmitted() && $formSecurity->isValid())
        {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            
            $user->setPassword($hash);
            
            $manager->persist($user);
            $manager->flush();
            
            return $this->redirectToRoute('security_connexion');
        }
    
        return $this->render('security/registration.html.twig', [
            'formSecurity' => $formSecurity->createView()
        ]);
    }
    
    
    /**
     * @Route("/connexion", name="security_connexion")
     */
    public function connexion()
    {
        return $this->render('security/connexion.html.twig');
    }
    
    /**
     * @Route("/disconnect", name="security_disconnect")
     */
    public function disconnect() {}
    
}
