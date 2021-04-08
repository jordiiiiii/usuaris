<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserRoleController extends AbstractController
{
    /**
     * @Route("/userrole", name="user_role")
     */
    public function index(UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('user_role/index.html.twig', [
            'users' => $userRepository->findByRole('ROLE_USER'),
        ]);
    }
}
