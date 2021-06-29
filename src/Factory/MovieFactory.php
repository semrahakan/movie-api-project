<?php


namespace App\Factory;

use App\Model\Movie;

class MovieFactory
{
    public static function createMovie(
        string $title,
        int $year,
        string $genre,
        string $director,
        string $writer,
        string $language,
        string $poster,
        string $awards,
        string $rating
    ): Movie
    {
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

        return $movie;
    }

}