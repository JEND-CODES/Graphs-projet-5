<?php

namespace App\Controller;

    use App\Entity\Chapter;
    use App\Entity\Comment;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Doctrine\Common\Persistence\ObjectManager;
    use App\Repository\ChapterRepository;
    use App\Repository\CommentRepository;

    // On utilise le formulaire de Symfony pour la gestion des erreurs -> voir les modifications effectuées dans ce fichier :
    use App\Form\ChapterType;

    // Include paginator interface
    use Knp\Component\Pager\PaginatorInterface;


class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog")
     */
    public function blog(ChapterRepository $repoChapter)
    {
        // Requête pour l'affichage des articles en dessous du Slider en page d'accueil (limite de 6, en sautant les 3 derniers articles publiés)
        $chapters = $repoChapter->findBy(array(), array('id' => 'DESC'), 6, 3);
        
        // Requête pour l'affichage sur le slider en page d'accueil
        $chapterSlides = $repoChapter->findBy(array(), array('id' => 'DESC'), 3);
        
        return $this->render('blog/posts.html.twig', [
            
            'chapters' => $chapters,
            'chapterSlides' => $chapterSlides
        ]);
    }
 
     /**
     * @Route("/blog/new", name="blog_create")
     * @Route("/blog/{id}/edit", name="blog_edit")
     */
    public function formChapter(Chapter $chapter = null, Request $request, ObjectManager $manager)
    {
        if(!$chapter)
        {
            $chapter = new Chapter();
        }
       
        $formChapter = $this->createForm(ChapterType::class, $chapter);
        
        $formChapter->handleRequest($request);
        
        if($formChapter->isSubmitted() && $formChapter->isValid())
        {
            if(!$chapter->getId())
            {
                $chapter->setCreatedAt(new \DateTime());
            }
            
            $manager->persist($chapter);
            $manager->flush();
            
            return $this->redirectToRoute('chapter_show',[
                'id' => $chapter->getId()
            ]);
        }
        
        return $this->render('blog/createChapter.html.twig',[
            'formChapter' => $formChapter->createView(),
            'editMode' => $chapter->getId() !== null
        ]);
        
        
    }

   /**
     * @Route("/blog/{id}", name="chapter_show")
     */
    public function show(Chapter $chapter, Request $request)
    {
        
      $comment = new Comment();
        
      $formComment = $this->createFormBuilder($comment)
            
            ->add('author')
            ->add('content')  
            ->add('save', SubmitType::class, array(
                'label' => 'Publier'        
        ))
            ->getForm();
        
      $formComment->handleRequest($request);
        
      if($formComment->isSubmitted() && $formComment->isValid()) 
      {
        if(!$comment->getId())
            {
                $comment->setCreatedAt(new \DateTime());
            
                $comment->setChapter($chapter);
            }
          
          $comment = $formComment->getData();
          
        $entityManager = $this->getDoctrine()->getManager();
          
        $entityManager->persist($comment);
          
        $entityManager->flush();
     
        return $this->redirect($request->getUri());
      }

      return $this->render('blog/oneChapter.html.twig', array(
          'chapter' => $chapter,
          'formComment' => $formComment->createView()
      ));
        
    }
    
    // Affichage des commentaires en Back Office avec Pagination
    /**
     * @Route("/backcom", name="backcom")
     */
    public function backcom(Request $request, PaginatorInterface $paginator)
    {
            $queryComment = $this->getDoctrine()->getManager();

            $pagingComment = $queryComment->getRepository(Comment::class);

            $commentQB = $pagingComment->createQueryBuilder('c')
                ->getQuery();

            $commentlists = $paginator->paginate(
                $commentQB,
                $request->query->getInt('page', 1),
                6,
                [
                'defaultSortFieldName' => 'c.id',
                'defaultSortDirection' => 'desc',
                ]
            );
        
        return $this->render('paging/commentOffice.html.twig', [
                'commentlists' => $commentlists
        ]);
    }
    
    /**
     * @Route("/backcom/delete/{id}", name="delete_comment")
     * @Method({"DELETE"})
     */
    public function deleteComment(CommentRepository $repoComment, Request $request, $id, PaginatorInterface $paginator) 
    {
       
        $entityManager = $this->getDoctrine()->getManager();
        
        $comment = $entityManager->getRepository(Comment::class)->find($id);
      
        $entityManager->remove($comment);
        
        $entityManager->flush();
        
        $response = new Response();
        
        $response->send();

        $comments = $repoComment->findAll();
        
                // Rappel de la fonction backcom
                $queryComment = $this->getDoctrine()->getManager();

                $pagingComment = $queryComment->getRepository(Comment::class);

                $commentQB = $pagingComment->createQueryBuilder('c')
                ->getQuery();

                $commentlists = $paginator->paginate(
                $commentQB,
                $request->query->getInt('page', 1),
                3,
                [
                'defaultSortFieldName' => 'c.id',
                'defaultSortDirection' => 'desc',
                ]
            );
        
       return $this->render('paging/commentOffice.html.twig', array('comments' => $comments, 'commentlists' => $commentlists));

    }
    
    /**
     * @Route("/office/delete/{id}", name="delete_chapter")
     * @Method({"DELETE"})
     */
    public function delete(ChapterRepository $repoChapter, Request $request, $id, PaginatorInterface $paginator) 
    {
       
      $entityManager = $this->getDoctrine()->getManager();
        
      $chapter = $entityManager->getRepository(Chapter::class)->find($id);
      
      $entityManager->remove($chapter);
        
      $entityManager->flush();
        
      $response = new Response();
        
      $response->send();

                $chapters = $repoChapter->findAll();

                $queryList = $this->getDoctrine()->getManager();

                $backChapter = $queryList->getRepository(Chapter::class);

                $chapterQB = $backChapter->createQueryBuilder('o')
                    ->getQuery();

                $backlists = $paginator->paginate(
                    $chapterQB,
                    $request->query->getInt('page', 1),
                    3,
                    [
                    'defaultSortFieldName' => 'o.id',
                    'defaultSortDirection' => 'desc',
                    ]
                );
                // Fin d'intégration de la fonction "chapterBackOffice" avec Paginator
        
       return $this->render('paging/backOffice.html.twig', array('chapters' => $chapters, 'backlists' => $backlists));

    }
    
    /**
     * @Route("/office", name="office")
     */
    public function chapterBackOffice(Request $request, PaginatorInterface $paginator) 
    {

      $queryList = $this->getDoctrine()->getManager();
        
        $backChapter = $queryList->getRepository(Chapter::class);
       
        $chapterQB = $backChapter->createQueryBuilder('o')
            ->getQuery();

        $backlists = $paginator->paginate(
            $chapterQB,
            $request->query->getInt('page', 1),
            3,
            [
            'defaultSortFieldName' => 'o.id',
            'defaultSortDirection' => 'desc',
            ]
        );

      return $this->render('paging/backOffice.html.twig', array('backlists' => $backlists));
    }

    // Etapes PAGINATION : 
    // 1. Faire un coup de "composer require knplabs/knp-paginator-bundle" dans le projet
    // 2. Indiquer le namespace "use Knp\Component\Pager\PaginatorInterface;" dans le Controller qui va récupérer une liste limitée d'articles
    // 3. Vérifier que le Bundle KNP PAGINATOR est bien chargé dans le fichier config/Bundles, et créer un fichier kng_paginator.yml placé dans le dossier "packages" avec la structure proposé sur le GitHub de KNP PAGINATOR 
    // 4. Créer la fonction suivante de "pagination"
    // 5. Faire une boucle "for" dans le fichier TWIG concerné pour l'affichage des articles
    // 6. Ajouter ensuite dans le fichier TWIG "{{ knp_pagination_render(appointments) }}" en dessous de la boucle "for" -> cela génère alors une pagination avec des numéros !!
        
    /**
     * @Route("/paging", name="paging")
     */
    public function chapterPagination(Request $request, PaginatorInterface $paginator) 
    {

        // Retrieve the entity manager of Doctrine
      $chapterList = $this->getDoctrine()->getManager();
        
        $pageChapter = $chapterList->getRepository(Chapter::class);
       
        // Find all the data on the Appointments table, filter your query as you need
        // voir https://symfony.com/doc/current/doctrine.html#querying-with-the-query-builder
        $chapterQuery = $pageChapter->createQueryBuilder('n')
            ->getQuery();

        // Paginate the results of the query
        $limitations = $paginator->paginate(
            // Doctrine Query, not results
            $chapterQuery,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            3,
            [
            'defaultSortFieldName' => 'n.id',
            'defaultSortDirection' => 'desc',
            ]
        );

        
      return $this->render('paging/postList.html.twig', array('limitations' => $limitations));
    }
   

    
}
