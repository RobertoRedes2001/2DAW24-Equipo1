<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
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

    #[Route('/login', name: 'loginUser', methods: ['POST'])]
    public function login(ManagerRegistry $doctrine, Request $request): RedirectResponse
    {
        // Obtener los datos del formulario
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        // Buscar al usuario por su nombre de usuario
        $user = $doctrine->getRepository(Usuario::class)->findOneBy(['nombre' => $username]);

        if (!$user) {
            // Si el usuario no existe, redirigir al formulario de inicio de sesión
            return $this->redirectToRoute('renderLogin');
        }

        // Verificar la contraseña
        if (password_verify($password, $user->getPassword())) {
            // Si la contraseña es válida, redirigir a otra página
            return $this->redirectToRoute('listCards');
        } else {
            // Si la contraseña no es válida, redirigir al formulario de inicio de sesión
            return $this->redirectToRoute('renderLogin');
        }
    }

    #[Route('/', name: 'renderLogin')]
    public function renderLogin(): Response
    {
        return $this->render("login.html", []);
    }
}
