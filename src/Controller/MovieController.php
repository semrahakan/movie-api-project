<?php


namespace App\Controller;

use App\Service\MovieApiServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    private MovieApiServiceInterface $movieService;

    public function __construct(MovieApiServiceInterface $movieApiService)
    {
        $this->movieService = $movieApiService;
    }

    /**
     * @Route("/", name="movie_search")
     *
     */
    public function searchMovies(Request $request)
    {
        $defaultData = [];
        $form = $this->createFormBuilder($defaultData)
            ->add('Title', TextType::class)
            ->add('Year', TextType::class)
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        $result = null;
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $result = $this->movieService->searchByTitleAndYear($data['Title'], $data['Year']);
        }
        return new Response($this->render('movie/form.html.twig', ['movieForm' => $form->createView(), 'movie' => $result]));
    }

}