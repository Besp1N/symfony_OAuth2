<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'auth_oauth_login', methods: ['GET', 'POST'])]
    public function index(): Response
    {
        if($this->getUser()) {
            return $this->redirectToRoute('/');
        }

        return $this->render('security/index.html.twig', []);
    }
}
