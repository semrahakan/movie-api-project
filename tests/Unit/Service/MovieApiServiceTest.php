<?php


namespace App\Tests\Unit\Service;


use App\Factory\MovieFactory;
use App\Service\MovieApiService;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class MovieApiServiceTest extends TestCase
{
    public function testThatSearchByTitleAndYear(): void
    {
        $title = "test movie factory";
        $year = 2021;
        $genre = 'test genre';
        $director = 'test director';
        $writer = 'test writer';
        $language = 'en';
        $poster = 'poster';
        $awards = '';
        $rating = '5.5';

        $responseJson = sprintf(
            '{"Title": "%s", "Year": "%d", "Genre": "%s", "Director": "%s", "Writer": "%s", "Language": "%s", "Poster": "%s", "Awards": "%s", "imdbRating": "%s"}',
            $title, $year, $genre, $director, $writer, $language, $poster, $awards, $rating);
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock
            ->expects(self::once())
            ->method('getContent')
            ->willReturn($responseJson);

        $httpClientMock = $this->createMock(HttpClientInterface::class);
        $httpClientMock
            ->expects(self::once())
            ->method('request')
            ->with('GET', '', [
                'query' => [
                    't' => $title,
                    'y' => $year,
                    'apikey'=> 'test',
                ]
            ])
            ->willReturn($responseMock);

        $loggerMock = $this->createMock(LoggerInterface::class);
        $movieApiService = new MovieApiService($httpClientMock, $loggerMock, 'test');

        $expected = MovieFactory::createMovie(
            $title,
            $year,
            $genre,
            $director,
            $writer,
            $language,
            $poster,
            $awards,
            $rating
        );
        $this->assertEquals($expected, $movieApiService->searchByTitleAndYear($title, $year));
    }

}