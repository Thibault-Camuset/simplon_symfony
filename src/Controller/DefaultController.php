<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
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
    public function homeAction(ArticleRepository $articleRepository, CategoryRepository $categoryRepository, Request $request, PaginatorInterface $paginator): Response
    {
        
        $donnees =  $articleRepository->findBy(['published' => true], ['created_at' => 'DESC']);
        
        $articles = $paginator->paginate(
            $donnees, 
            $request->query->getInt('page', 1), 
            5 
        );

        $categories = $categoryRepository->findAll();

        return $this->render('front/default/home.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }


    /**
     * @Route("/category/{id}", name="category_list", methods={"GET"})
     */
    public function categoryAction(Category $category, CategoryRepository $categoryRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $donnees =  $category->getArticles();


        $articles = $paginator->paginate(
            $donnees, 
            $request->query->getInt('page', 1),
            5 
        );

        $categories = $categoryRepository->findAll();

        return $this->render('front/default/category.html.twig', [
            'articles' => $articles,
            'categories' => $categories,
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


    /**
     * @Route("/article/{id}", name="article_read")
     */
    public function articleReadAction(ArticleRepository $articleRepository, $id): Response
    {
        $article = $articleRepository->findOneById($id);

        return $this->render('front/default/article.html.twig', [
            'article'  => $article,
        ]);
    }


}
