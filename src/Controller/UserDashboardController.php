<?php

namespace App\Controller;

use App\Form\UpdateProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class UserDashboardController extends AbstractController
{
    /**
     * @Route("/user/dashboard", name="user_dashboard")
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @param Security $security
     * @return Response
     * @throws \Exception
     */
    public function index(EntityManagerInterface $entityManager, Request $request, Security $security): Response
    {
        // Get the authenticated user
        $user = $security->getUser();

        // Get the form
        $form = $this->createForm(UpdateProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $user->setFirstName($formData->getFirstName());
            $user->setLastName($formData->getLastName());
            $user->setBirthDate($formData->getBirthDate());
            $user->setUpdatedAt(new \DateTime());

            $entityManager->persist($user);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('success', 'Profile updated!');

            return $this->redirectToRoute('user_dashboard');
        }

        return $this->render('user_dashboard/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
