<?php

namespace App\Controller\administrator;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class adminController extends AbstractController
{
    #[Route('/api/login/administrator', name: 'api_admin')]
    public function admin_page(): Response
    {
        return $this->render('administrator/administrator_page.html.twig');
    }
}