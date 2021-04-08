<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CapRoleController extends AbstractController
{
    /**
     * @Route("/caprole", name="cap_role")
     */
    public function index(UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_CAP', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('cap_role/index.html.twig', [
            'caps' => $userRepository->findByRole('ROLE_CAP'),
            'users' => $userRepository->findByRole('ROLE_USER'),
        ]);
    }
}
