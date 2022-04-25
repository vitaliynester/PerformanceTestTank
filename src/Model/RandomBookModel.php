<?php

namespace App\Model;

use App\Entity\Book;

class RandomBookModel
{
    private Book $book;

    private int $totalBooks;

    public function getBook(): Book
    {
        return $this->book;
    }

    public function setBook(Book $book): void
    {
        $this->book = $book;
    }

    public function getTotalBooks(): int
    {
        return $this->totalBooks;
    }

    public function setTotalBooks(int $totalBooks): void
    {
        $this->totalBooks = $totalBooks;
    }
}