<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class senini extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        return $this->render('senini/homepage.html.twig', [

        ]);
    }

    #[Route('/creation', name: 'app_creation')]
    public function creation(): Response
    {
        return $this->render('senini/creation.html.twig', [

        ]);
    }

    #[Route('/api/login/administrator-users', name: 'api_admin_users')]
    public function admin_page_users(): Response
    {
        return $this->render("administrator/administrator_page_users.html.twig");
    }

    #[Route('/api/login/administrator-materials', name: 'api_admin_materials')]
    public function admin_page_materials(): Response
    {
        return $this->render("administrator/administrator_page_materials.html.twig");
    }
}