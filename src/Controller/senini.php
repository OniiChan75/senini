<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class senini extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage() : Response
    {
        return $this->render('senini/homepage.html.twig', [
            'title' => 'senini fabric',
        ]);
    }

    #[Route('/creation', name: 'app_creation')]
    public function creation() : Response
    {
        return $this->render('senini/creation.html.twig', [
            'title' => 'creation senini',
            'opzioni' => ['opzione1', 'opzione2', 'opzione3'],
            'contenuti' => ['opzione1', 'opzione2', 'opzione3'],
        ]);
    }

}