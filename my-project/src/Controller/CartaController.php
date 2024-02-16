<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Carta;
use App\Entity\CartaEdicion;

class CartaController extends AbstractController
{
    #[Route('/all', name: 'allCards', methods:['get'])]
    public function allCards(ManagerRegistry $doctrine): JsonResponse 
    {
        $cards = $doctrine
            ->getRepository(Carta::class)
            ->findAll();
    
        $data = [];

        foreach($cards as $card) {
            $data[] = [
                'carta_cod' => $card->getId(),
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
        return $this->json($data);
    } 
    
    #[Route('/card/{id}', name: 'singleCard', methods:['get'] )]
    public function show(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $card = $doctrine->getRepository(Carta::class)->find($id);
   
        if (!$card) {
   
            return $this->json('No project found for id ' . $id, 404);
        }
   
        $data =  [
            'carta_cod' => $card->getId(),
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
           
        return $this->json($data);
    }

    #[Route('/deleteCard/{id}', name: 'deleteCard', methods:['delete'] )]
    public function delete(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $secondEntityManager = $doctrine->getManager();
        $card = $entityManager->getRepository(Carta::class)->find($id);
        $cardEdition = $secondEntityManager->getRepository(CartaEdicion::class)->findOneBy(['carta_id' => $id]);
   
        if (!$card) {
            return $this->json('No project found for id' . $id, 404);
        }
   
        // Eliminar primero el registro de CartaEdicion
        if ($cardEdition) {
            $secondEntityManager->remove($cardEdition);
            $secondEntityManager->flush();
        }
        
        // Luego eliminar la carta
        $entityManager->remove($card);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }
}