<?php

namespace App\Controller\administrator;

use App\Entity\Materials;
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
                return $this->redirectToRoute('api_admin_users');
            }
        }

        $entityManager->persist($users);
        $entityManager->flush();

        $this->addFlash('successAdd', 'User created');
        return $this->redirectToRoute('api_admin_users');
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
            return $this->redirectToRoute('api_admin_users');
        }

        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('successDel', 'User eliminated');
        return $this->redirectToRoute('api_admin_users');
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
            return $this->redirectToRoute('api_admin_users');
        }

        $user->setPassword($password);

        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('successModi', 'User modified');
        return $this->redirectToRoute('api_admin_users');
    }

    #[Route('/api/administrator/add_material', name: 'api_addMaterial')]
    public function add_material(Request $request, EntityManagerInterface $entityManager): Response
    {
        $type = $request->request->get('type');
        $name = $request->request->get('name');
        $thickness = $request->request->get('thickness') ?? null;
        $pallet = $request->request->get('full_pallet') ?? null;
        $price = $request->request->get('price');

        $material = new Materials();
        $material->setType($type);
        $material->setName($name);
        $material->setPrice($price);
        if($thickness != null) {
            $material->setThickness($thickness);
        }
        if($pallet != null) {
            $material->setFullPallet($pallet);
        }

        $entityManager->persist($material);
        $entityManager->flush();

        $this->addFlash('successAdd', 'Material created');
        return $this->redirectToRoute('api_admin_materials');
    }

    #[Route('/api/administrator/del_material', name: 'api_delMaterial')]
    public function del_material(Request $request, EntityManagerInterface $entityManager): Response
    {
        $id = $request->request->get('id');

        $material = $entityManager->getRepository(Materials::class)->findOneBy([
            'id' => $id,
        ]);

        if ($material == null) {
            $this->addFlash('errorDel', "Material doesn't exist");
            return $this->redirectToRoute('api_admin_materials');
        }

        $entityManager->remove($material);
        $entityManager->flush();

        $this->addFlash('successDel', 'Material eliminated');
        return $this->redirectToRoute('api_admin_materials');
    }

    #[Route('/api/administrator/modi_material', name: 'api_modiMaterial')]
    public function modi_material(Request $request, EntityManagerInterface $entityManager): Response
    {
        $id = $request->request->get('id');
        $thickness = $request->request->get('thickness') ?? null;
        $pallet = $request->request->get('pallet') ?? null;
        $price = $request->request->get('price') ?? null;

        $material = $entityManager->getRepository(Materials::class)->findOneBy([
            'id' => $id,
        ]);

        if ($material == null) {
            $this->addFlash('errorModi', "Material doesn't exist");
            return $this->redirectToRoute('api_admin_materials');
        }

        if($thickness != null) {
            $material->setThickness($thickness);
        }
        if($pallet != null) {
            $material->setFullPallet($pallet);
        }
        if($price != null) {
            $material->setPrice($price);
        }

        $entityManager->persist($material);
        $entityManager->flush();

        $this->addFlash('successModi', 'Material modified');
        return $this->redirectToRoute('api_admin_materials');
    }
}