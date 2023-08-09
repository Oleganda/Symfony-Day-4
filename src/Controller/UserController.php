<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user')]
    public function index(TodoRepository $todoRepository): Response
    {
        $user = $this->getUser();
        return $this->render('user/index.html.twig', [
            'todos' => $todoRepository->findAll(),
            'user' => $user
        ]);
    }

    #[Route('/{id}', name: 'app_user_details', methods: ['GET'])]
    public function show(Todo $todo): Response
    {
        return $this->render('user/details.html.twig', [
            'todo' => $todo,
        ]);
    }
}
