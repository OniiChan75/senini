<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/api/login', name: 'api_login')]
    public function login(Request $request): Response
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        if ($username === 'test' && $password === 'test') {
            // Se le credenziali sono corrette, reindirizza alla pagina di creazione
            return $this->redirectToRoute('app_creation');
        }

        // Se le credenziali sono errate, mostra un messaggio di errore
        $this->addFlash('error', 'Credenziali errate');

        return $this->redirectToRoute('app_homepage');
    }
}