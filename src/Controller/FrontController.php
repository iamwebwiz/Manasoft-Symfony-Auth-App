<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return new Response('OMG! My first page already! Wooo!');
    }

    /**
     * @Route("/register", name="register")
     */
    public function showRegistrationPage()
    {
        return new Response('Registration page! Whoooo! 💪🏾💪🏾💪🏾');
    }

    /**
     * @Route("/login", name="login")
     */
    public function showLoginPage()
    {
        return new Response('My fantastic login page! 💪🏾💩💪🏾');
    }
}
