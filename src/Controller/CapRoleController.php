<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CapRoleController extends AbstractController
{
    /**
     * @Route("/cap/role", name="cap_role")
     */
    public function index(): Response
    {
        return $this->render('cap_role/index.html.twig', [
            'controller_name' => 'CapRoleController',
        ]);
    }
}
