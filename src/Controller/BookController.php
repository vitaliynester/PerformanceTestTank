<?php

namespace App\Controller;

use App\Service\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    public function __construct(private BookService $bookService)
    {
    }

    #[Route('/book', name: 'get_book')]
    public function index(): Response
    {
        return $this->json($this->bookService->getRandomBook());
    }

    #[Route('/new', name: 'create_book')]
    public function createBook(): Response
    {
        return $this->json($this->bookService->generateNewBook());
    }
}
