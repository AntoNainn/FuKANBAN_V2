<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
    #[Route('/kanban', name: 'app_kanban')]
    public function kanban(): Response
    {
        return $this->render('kanban.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}