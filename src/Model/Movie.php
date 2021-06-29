<?php


namespace App\Model;


class Movie
{
    private string $title;
    private int $year;
    private string $genre;
    private string $director;
    private string $writer;
    private string $language;
    private string $poster;
    private string $awards;
    private string $rating;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function setDirector(string $director): void
    {
        $this->director = $director;
    }

    public function getWriter(): string
    {
        return $this->writer;
    }

    public function setWriter(string $writer): void
    {
        $this->writer = $writer;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getPoster(): string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): void
    {
        $this->poster = $poster;
    }

    public function getAwards(): string
    {
        return $this->awards;
    }

    public function setAwards(string $awards): void
    {
        $this->awards = $awards;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function setRating(string $rating): void
    {
        $this->rating = $rating;
    }



}