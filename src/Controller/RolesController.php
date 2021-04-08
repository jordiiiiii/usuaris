<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RolesController extends AbstractController
{
    /**
     * @Route("/roles", name="roles")
     */
    public function index(): Response
    {
        if (is_object($this->get('security.token_storage')->getToken()->getUser())) {
            return $this->redirectToRoute('redireccionar');
        }

        else  {
            return $this->redirectToRoute('app_login');
        }
    }
    /**
     * @Route("/redireccionar", name="redireccionar")
     */
    public function redireccionar(): Response
    {
        if(in_array("ROLE_CAP", $this->getUser()->getRoles())){
            return $this->redirectToRoute('cap_role');
        }
        else if(in_array("ROLE_ADMIN", $this->getUser()->getRoles())){
            return $this->redirectToRoute('user_index');
        }
        else{
            return $this->redirectToRoute('user_role');
        }
    }
}
