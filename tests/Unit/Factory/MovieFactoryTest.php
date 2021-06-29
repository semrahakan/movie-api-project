<?php


namespace App\Tests\Unit\Factory;


use App\Factory\MovieFactory;
use App\Model\Movie;
use PHPUnit\Framework\TestCase;

class MovieFactoryTest extends TestCase
{
    public function testThatCreateMovie(): void
    {
        $title = 'test movie factory';
        $year = 2021;
        $genre = 'test genre';
        $director = 'test director';
        $writer = 'test writer';
        $language = 'en';
        $poster = 'poster';
        $awards = '';
        $rating = '5.5';

        $movie = new Movie();
        $movie->setTitle($title);
        $movie->setYear($year);
        $movie->setGenre($genre);
        $movie->setDirector($director);
        $movie->setWriter($writer);
        $movie->setLanguage($language);
        $movie->setPoster($poster);
        $movie->setAwards($awards);
        $movie->setRating($rating);

        $this->assertEquals($movie, MovieFactory::createMovie(
            $title,
            $year,
            $genre,
            $director,
            $writer,
            $language,
            $poster,
            $awards,
            $rating
        ));
    }

}