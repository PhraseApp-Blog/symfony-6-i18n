<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Review;
use App\Form\ReviewType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\Model\NotificationBanner;

class HomeController extends AbstractController
{
    #[Route('/{_locale}/', name: 'home')]
    public function index(TranslatorInterface $translator, EntityManagerInterface $entityManager): Response
    {   
        $reviews = $entityManager->getRepository(Review::class)->findAll();
        $visitorsCount = 156;

        $review = new Review();

        $form = $this->createForm(ReviewType::class, $review);
        
        $messages = [
            'title' => $translator->trans('home.title'),
            'subtitle' => $translator->trans('home.subtitle'),
            'heading' => $translator->trans('home.heading'),
            'visitors' => $translator->trans('app.visitors', ['visitors' => $visitorsCount, 'Username' => 'Theo']),
            'game.price' => $translator->trans('game.price', ['price' => 60])
        ];

        $banner = new NotificationBanner(
            'notification.success.title',
            'notification.success.heading',
            'notification.success.content',
            [],
            'notifications'
        );
        

        return $this->render('home.html.twig', [
            'messages' => $messages,
            'banner' => $banner,
            'reviews' => $reviews,
            'form' => $form
        ]);
    }

    #[Route('/')]
    public function indexNoLocale(): Response
    {
        return $this->redirectToRoute('home', ['_locale' => 'en']);
    }
}