<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class ReviewsController extends AbstractController
{
    #[Route('/{_locale}/reviews', name: 'reviews')]
    public function index(TranslatorInterface $translator): Response
    {   

        return $this->render('reviews.html.twig', []);
    }

    #[Route('/reviews/{_locale}', name: 'reviewz')]
    public function review(TranslatorInterface $translator): Response
    {   

        return $this->render('reviews.html.twig', []);
    }
}