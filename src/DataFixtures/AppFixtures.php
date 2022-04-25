<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 100; $i++) {
            $book = new Book();
            $book->setTitle("Название книги $i");
            $book->setAuthor("Автор книги $i");
            $book->setDescription("Описание книги $i");
            $book->setImage("Изображение книги $i");

            $manager->persist($book);
        }

        $manager->flush();
    }
}
