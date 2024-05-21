<?php

namespace App\Controller\administrator;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class adminController extends AbstractController
{

    #[Route('/api/administrator/add_user', name: 'api_addUser')]
    public function add_user(Request $request, EntityManagerInterface $entityManager): Response
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $role = $request->request->get('role');

        $users = new Users();
        $users->setUserId($username);
        $users->setPassword($password);
        $users->setRole($role);

        $activedUsers = $entityManager->getRepository(Users::class)->findAll();
        foreach ($activedUsers as $user) {
            if ($user->getUserID() == $username) {
                $this->addFlash('errorAdd', 'UserId just excist');
                return $this->redirectToRoute('api_admin');
            }
        }

        $entityManager->persist($users);
        $entityManager->flush();

        $this->addFlash('successAdd', 'User created');
        return $this->redirectToRoute('api_admin');
    }

    #[Route('/api/administrator/del_user', name: 'api_delUser')]
    public function del_user(Request $request, EntityManagerInterface $entityManager): Response
    {
        $username = $request->request->get('username');

        $user = $entityManager->getRepository(Users::class)->findOneBy([
            'UserId' => $username,
        ]);

        if ($user == null) {
            $this->addFlash('errorDel', "UserId doesn't exist");
            return $this->redirectToRoute('api_admin');
        }

        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('successDel', 'User eliminated');
        return $this->redirectToRoute('api_admin');
    }

    #[Route('/api/administrator/modi_user', name: 'api_modiUser')]
    public function modi_user(Request $request, EntityManagerInterface $entityManager): Response
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        $user = $entityManager->getRepository(Users::class)->findOneBy([
            'UserId' => $username,
        ]);

        if ($user == null) {
            $this->addFlash('errorModi', "UserId doesn't exist");
            return $this->redirectToRoute('api_admin');
        }

        $user->setPassword($password);

        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('successModi', 'User modified');
        return $this->redirectToRoute('api_admin');
    }
}