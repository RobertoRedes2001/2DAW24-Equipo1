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
        $users = $doctrine
            ->getRepository(Usuario::class)
            ->findAll();

        
        echo $users->getPassword();

        $data = [];

        foreach($users as $user) {
            $data[] = [
                'usuario_cod' => $user->getId(),
                'nombre' => $card->getNombre(),
                'habilidad_recurso' => $card->getHabilidadRecurso(),
                'habilidad_batalla' => $card->getHabilidadBatalla(),
                'coste' => $card->getCoste(),
                'estado_carta' => $card->getEstadoCarta(),
                'vida' => $card->getVida(),
                'rareza' => $card->getRareza(),
                'observaciones' => $card->getObservaciones(),
                'foto' => $card->getFoto(),
                'defensa' => $card->getDefensa(),
                'ataque' => $card->getAtaque(),
                'tipo_carta' => $card->getTipoCarta(),
                'texto' => $card->getTexto(),
                'puntos_victoria' => $card->getPuntosVictoria(),
            ];
        }
    }


}