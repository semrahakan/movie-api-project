<?php


namespace App\Service;

use App\Factory\MovieFactory;
use App\Model\Movie;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieApiService implements MovieApiServiceInterface
{
    private HttpClientInterface $httpClient;
    private LoggerInterface $logger;
    private string $apiKey;

    public function __construct(HttpClientInterface $httpClient, LoggerInterface $logger, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->apiKey = $apiKey;
    }

    public function searchByTitleAndYear(string $title, int $year): Movie
    {
        try {
            $response = $this->httpClient->request(
                'GET',
                '',
                [
                    'query' => [
                        't' => $title,
                        'y' => $year,
                        'apikey'=> $this->apiKey,
                    ]
                ]);

            $movies = json_decode($response->getContent(), true);
            $yearValue = StringManipulationService::removeDashAndMakeIntValue($movies['Year']);

            return MovieFactory::createMovie(
                $movies['Title'],
                $yearValue,
                $movies['Genre'],
                $movies['Director'],
                $movies['Writer'],
                $movies['Language'],
                $movies['Poster'],
                $movies['Awards'],
                $movies['imdbRating']
            );

        } catch (TransportExceptionInterface $exception) {

            $this->logger->log(
                LogLevel::ERROR,
                $exception->getMessage()
            );
        }

    }
}