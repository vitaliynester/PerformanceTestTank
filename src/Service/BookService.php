<?php

namespace App\Service;

use App\Entity\Book;
use App\Model\RandomBookModel;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;

class BookService
{
    public function __construct(private EntityManagerInterface $entityManager, private BookRepository $bookRepository)
    {
    }

    public function getRandomBook(): RandomBookModel
    {
        $books = $this->bookRepository->findAll();

        $bookModel = new RandomBookModel();
        $countBooks = count($books);
        $bookModel->setBook($books[rand(0, $countBooks - 1)]);
        $bookModel->setTotalBooks($countBooks);

        return $bookModel;
    }

    public function generateNewBook(): RandomBookModel
    {
        $book = new Book();
        $book->setImage("Изображение книги " . rand(0, 1000000));
        $book->setDescription("Описание книги " . rand(0, 1000000));
        $book->setAuthor("Автор книги " . rand(0, 1000000));
        $book->setTitle("Название книги " . rand(0, 1000000));

        $this->entityManager->persist($book);
        $this->entityManager->flush();

        $bookModel = self::getRandomBook();
        $bookModel->setBook($book);

        return $bookModel;
    }
}