<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    #[Route("/category", name: "app_category")]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('category.html.twig', [
            'categories' => $categories,
        ]);
    }

    
    #[Route("/category/new", name: "app_category_new")]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('chat_view', [
                'category' => $category->getId(),
            ]);
        }

        return $this->render('new_category.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    
    #[Route("/category/{id}", name: "app_category_show")]
    public function show(Category $category): Response
    {
        return $this->render('show.html.twig', [
            'category' => $category,
        ]);
    }


    
    #[Route("/category/delete", name: "app_category_delete")]
    public function delete(Request $request, Category $category): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_index');
    }
}
