<?php

namespace App\Controller;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/api/login', name: 'api_login')]
    public function login(Request $request, EntityManagerInterface $entityManager): Response
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        $Users = $entityManager->getRepository(Users::class);
        $user = $Users->findOneBy([
            'UserId' => $username,
            'Password' => $password,
        ]);

        if($user != null){
            if ($user->getRole() == 'admin') {
                // Se le credenziali sono corrette, reindirizza alla pagina di amministrazione
                return $this->redirectToRoute('api_admin_users');
            }

            return $this->redirectToRoute('app_creation');
        }

        // Se le credenziali sono errate, mostra un messaggio di errore
        $this->addFlash('error', 'Credenziali errate');

        return $this->redirectToRoute('app_homepage');
    }
}