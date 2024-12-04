<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie')]
    public function index(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Movie::class);
        $movies = $repository->findAll();

        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    #[Route('/movie/{id}', name: 'app_movie_show')]
    public function show(Movie $movie) {
        return $this->render('movie/show.html.twig',[
            'movie' => $movie,
        ]);
        
    }
}