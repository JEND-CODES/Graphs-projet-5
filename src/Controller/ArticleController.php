<?php
  namespace App\Controller;

  use App\Entity\Article;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\Form\Extension\Core\Type\TextType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;

// Pour changement retirer Methods
use Doctrine\Common\Persistence\ObjectManager;

use App\Repository\ArticleRepository;

// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;



class ArticleController extends AbstractController 
{

    /**
     * @Route("/homepage", name="homepage")
     */
    public function index(ArticleRepository $repo)
    {
        // Méthode pour retourner un nombre limité d'articles par ordre DESC (dernier post publié, premier visible !)
        // Cf. https://stackoverflow.com/questions/21499296/doctrine-fetchall-with-limits
        
        // Pour régler LIMIT et OFFSET -> findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
        
        $articles = $repo->findBy(array(), array('id' => 'DESC'), 3, 2);
        
        //$articles = $repo->findAll();
                    
        
        return $this->render('articles/index.html.twig', array('articles' => $articles, 'mytitle' => 'Bienvenue sur ce site Symphony 4 !'));
    }
    
    /**
     * @Route("/backend", name="backend_list")
     */
    public function backend(ArticleRepository $repo) 
    {
        
      $articles = $repo->findAll();
        
      return $this->render('articles/backend.html.twig', array('articles' => $articles));
    }
    
    /**
     * @Route("/article/new", name="new_article")
     
     */
    public function new(Request $request) 
    {
        
      $article = new Article();
        
      $form = $this->createFormBuilder($article)
            
          ->add('title', TextType::class,  array(
                'required' => true,
                'attr' => array('class' => 'form-control')
        ))
        
          // Mettre le "required" à "false" pour enregistrer le champs TinyMCE sinon ça marche pas.. Voir : https://stackoverflow.com/questions/10303431/cant-submit-a-form-with-symfony2-and-tinymce
          ->add('body', TextareaType::class, array(
                'required' => false,
                'attr' => array('class' => 'tinymce')
        ))
          ->add('graphtitle', TextType::class,  array(
                'required' => true,
                'attr' => array('class' => 'form-control')
        ))
            
          ->add('save', SubmitType::class, array(
                'label' => 'Publier',
                'attr' => array('class' => 'save-button')
        ))
            ->getForm();
        
      $form->handleRequest($request);
        
      if($form->isSubmitted() && $form->isValid()) 
      {
        $article = $form->getData();
          
        $entityManager = $this->getDoctrine()->getManager();
          
        $entityManager->persist($article);
          
        $entityManager->flush();
          
        return $this->redirectToRoute('new_article');
      }
        
      return $this->render('articles/new.html.twig', array(
            'form' => $form->createView()
      ));
        
    }
    /**
     * @Route("/article/edit/{id}", name="edit_article")
     
     */
    public function edit(Request $request, $id) 
    {
        
      $article = new Article();
        
      $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        
      $form = $this->createFormBuilder($article)
            
          ->add('title', TextType::class, array(
                'required' => true,
                'attr' => array('class' => 'form-control')
        ))
            
          ->add('body', TextareaType::class, array(
                'required' => true,
                'attr' => array('class' => 'tinymce')
        ))
          ->add('graphtitle', TextType::class,  array(
                'required' => true,
                'attr' => array('class' => 'form-control')
        ))
           
          ->add('save', SubmitType::class, array(
                'label' => 'Modifier',
                'attr' => array('class' => 'edit-button')
        ))
            ->getForm();
        
      $form->handleRequest($request);
        
      if($form->isSubmitted() && $form->isValid()) 
      {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();
        return $this->redirectToRoute('backend_list');
      }
        
      return $this->render('articles/edit.html.twig', array(
        'form' => $form->createView()
      ));
        
    }
    
    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function show(Article $article) 
    {
        
      //$article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        
      return $this->render('articles/show.html.twig', array('article' => $article));
    }

    
    /**
     * @Route("/article/delete/{id}", name="delete_article")
     * @Method({"DELETE"})
     */
    
    // 16 octobre : Ajout du paramètre ArticleRepository $repo (pour éviter message d'erreur "$repo doesn't exist") :
    
    public function delete(ArticleRepository $repo, Request $request, $id) 
    {
        // Méthodes Update ou Delete -> cf.https://symfony.com/doc/current/doctrine.html

        $entityManager = $this->getDoctrine()->getManager();
        
        $article = $entityManager->getRepository(Article::class)->find($id);
        
        // 16 octobre : Changement de ces 2 lignes suivantes par les deux précédentes :
        
      //$article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        
      //$entityManager = $this->getDoctrine()->getManager();
        
      $entityManager->remove($article);
        
      $entityManager->flush();
        
        return $this->redirectToRoute('backend_list');
        
      $response = new Response();
        
      $response->send();

        // 16 octobre : Ajout de la définition $articles (pour éviter message d'erreur "$articles doesn't exist") :
        
        $articles = $repo->findAll();

       //return $this->render('articles/backend.html.twig', array('articles' => $articles));

    }
    
    /**
     * @Route("/test", name="test")
     */
    public function test() 
    {
    
      return $this->render('articles/test.html.twig');
    }
    
    // 23 octobre : Pagination inspirée de la démo suivante : https://ourcodeworld.com/articles/read/802/how-to-install-the-knppaginatorbundle-to-paginate-doctrine-queries-in-symfony-4
    
    // Voir aussi Tuto Grafikart : https://www.youtube.com/watch?v=9gFhvApgM20
    
    // Test de PAGINATION n°1 : 
    // 1. Faire un coup de "composer require knplabs/knp-paginator-bundle" dans le projet
    // 2. Indiquer le namespace "use Knp\Component\Pager\PaginatorInterface;" dans le Controller qui va récupérer une liste limitée d'articles
    // 3. Vérifier que le Bundle KNP PAGINATOR est bien chargé dans le fichier config/Bundles, et créer un fichier kng_paginator.yml placé dans le dossier "packages" avec la structure proposé sur le GitHub de KNP PAGINATOR 
    // 4. Créer la fonction suivante "pagination"
    // 5. Faire une boucle "for" dans le fichier TWIG concerné pour l'affichage des articles
    // 6. Ajouter ensuite dans le fichier TWIG "{{ knp_pagination_render(appointments) }}" en dessous de la boucle "for" -> cela génère alors une pagination avec des numéros !!
    
    /**
     * @Route("/pagination", name="pagination")
     */
    public function pagination(Request $request, PaginatorInterface $paginator) 
    {
      
      // Retrieve the entity manager of Doctrine
      $em = $this->getDoctrine()->getManager();
        
        $paging = $em->getRepository(Article::class);
       
        // Find all the data on the Appointments table, filter your query as you need
        // voir https://symfony.com/doc/current/doctrine.html#querying-with-the-query-builder
        $testQuery = $paging->createQueryBuilder('p')
            ->getQuery();
       
        
        // Paginate the results of the query
        $appointments = $paginator->paginate(
            // Doctrine Query, not results
            $testQuery,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            5
        );

        
      return $this->render('articles/pagination.html.twig', array('appointments' => $appointments));
    }

    /**
     * @Route("/post", name="post")
     */
    public function post() 
    {
    
      return $this->render('articles/post.html.twig');
    }
    
    /**
     * @Route("/tuto", name="tuto")
     */
    public function tuto() 
    {
    
      return $this->render('articles/tuto.html.twig');
    }
    
    /**
     * @Route("/chart", name="chart")
     */
    public function chart() 
    {
    
      return $this->render('charts/chart1.html.twig');
    }
    
    /**
     * @Route("/chart2", name="chart2")
     */
    public function chart2() 
    {
    
      return $this->render('charts/chart2.html.twig');
    }
    
    /**
     * @Route("/chart3", name="chart3")
     */
    public function chart3() 
    {
    
      return $this->render('charts/chart3.html.twig');
    }

    /**
     * @Route("/chart4", name="chart4")
     */
    public function chart4() 
    {
    
      return $this->render('charts/chart4.html');
    }
    
    /**
     * @Route("/chart5", name="chart5")
     */
    public function chart5() 
    {
    
      return $this->render('charts/chart5.php');
    }
    
    /**
     * @Route("/chartjs2", name="chartjs2")
     */
    public function chartJs2() 
    {
    
      return $this->render('charts/chartjs2.html.twig');
    }
    
    /**
     * @Route("/columnTests", name="columnTests")
     */
    public function columnTests() 
    {
    
      return $this->render('charts/columnTests.html.twig');
    }
    
    /**
     * @Route("/chart6", name="chart6")
     */
    public function chart6() 
    {
    
      return $this->render('charts/chart6.html');
    }
    
    /**
     * @Route("/chart7", name="chart7")
     */
    public function chart7() 
    {
    
      return $this->render('charts/chart7.html');
    }
    
    /**
     * @Route("/demos", name="demos")
     */
    public function demos() 
    {
    
      return $this->render('charts/demos.html.twig');
    }
    
    
    
    
    
    
    
    
    // Voir démo https://github.com/bradtraversy/symphart
    // Voir Tutos Traversy Media : https://www.youtube.com/watch?v=WVeE4SXIOwA
    
    
    
    
  }
