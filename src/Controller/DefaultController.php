<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction(ArticleRepository $articleRepository): Response
    {
        return $this->render('front/default/home.html.twig', [
            'articles' => $articleRepository->findAll(),
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
