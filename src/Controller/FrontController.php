<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return new Response('OMG! My first page already! Wooo!');
    }

    /**
     * @Route("/register", name="register")
     */
    public function showRegistrationPage(): Response
    {
        return $this->render('auth/register.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function showLoginPage(): Response
    {
        return $this->render('auth/login.html.twig');
    }
}
