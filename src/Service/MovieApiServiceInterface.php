<?php
namespace App\Service;

interface MovieApiServiceInterface
{
    public function searchByTitleAndYear(string $title, int $year): \App\Model\Movie;
}