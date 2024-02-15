<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Usuario;

class UserController extends AbstractController
{
    #[Route('/insertUser', name: 'insertUser', methods:['GET'])]
    public function createUser(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $entityManager = $doctrine->getManager();

        $password = '';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   
        $user = new Usuario();
        $user->setNombre('');
        $user->setPassword($hashedPassword);

        $entityManager->persist($user);
        $entityManager->flush();

        $data =  [
            'usuario_cod' => $user->getId(),
            'nombre' => $user->getNombre(),
            'password' => $user->getPassword(),
        ];
           
        return $this->json($data);
    }

    #[Route('/login', name: 'loginUser', methods:['GET'])]
    public function login(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        $name = 'root';
        $user = $doctrine->getRepository(Usuario::class)->findOneBy(['nombre' => $name]);

        $hashedPassword = $user->getPassword();

        $password = '';

        if (password_verify($password, $hashedPassword)) {
            $validator = true;
            return $this->json($validator);
        } else {
            $validator = false;
            return $this->json($validator);
        }
        

    }


}