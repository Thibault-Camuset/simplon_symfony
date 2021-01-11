<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction(): Response
    {
        return $this->render('default/home.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }



    /**
     * @Route("/cgu", name="cgu")
     */
    public function cguAction(): Response
    {
        return $this->render('default/cgu.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }




    /**
     * @Route("/mentions-legales", name="mentions_legales")
     */
    public function mentionsLegalesAction(): Response
    {
        return $this->render('default/mentions-legales.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

     /**
     * @Route("/admin", name="section_admin")
     */
    public function adminAction(): Response
    {
        return $this->render('admin/admin_home.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }





}
