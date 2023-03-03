<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\News;

class NewsController extends AbstractController
{
    #[Route('/category/{news_category}', name: 'chat_send_message', requirements: ['chat' => '\d+'], methods: ['POST'])]
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $news = $entityManager->getRepository(News::class)->findAll();

        return $this->render('news/index.html.twig', [
            'news' => $news,
        ]);
    }
}