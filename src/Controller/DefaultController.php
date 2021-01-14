<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface; 

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction(ArticleRepository $articleRepository, Request $request, PaginatorInterface $paginator): Response
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $donnees =  $articleRepository->findAll();
        
        $articles = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            5 // Nombre de résultats par page
        );

        return $this->render('front/default/home.html.twig', [
            'articles' => $articles,
        ]);
    }



    /**
     * @Route("/cgu", name="cgu")
     */
    public function cguAction(): Response
    {
        return $this->render('front/default/cgu.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }




    /**
     * @Route("/mentions-legales", name="mentions_legales")
     */
    public function mentionsLegalesAction(): Response
    {
        return $this->render('front/default/mentions-legales.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/admin", name="section_admin")
     */
    public function adminAction(): Response
    {
        return $this->render('admin/default/home.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }





}
