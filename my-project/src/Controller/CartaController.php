<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Carta;
use App\Entity\CartaEdicion;

class CartaController extends AbstractController
{

    //Variable y constructor del EntityManagerInterface
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

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

        if ($cardEdition) {
            $secondEntityManager->remove($cardEdition);
            $secondEntityManager->flush();
        }

        $entityManager->remove($card);
        $entityManager->flush();
   
        return $this->json('Deleted a project successfully with id ' . $id);
    }

    #[Route('/addCard', name: 'addCard', methods:['get'] )]
    public function add(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $nombre = 'Carta Default';
        $habilidad_recurso = 'Habilidad Recurso';
        $habilidad_batalla = 'Habilidad Batalla';
        $coste = 'Coste';
        $estado_carta = 'Estado Carta';
        $vida = 1;
        $rareza = 'Rareza';
        $observaciones = 'Observaciones';
        $foto = 'Foto';
        $defensa = 1;
        $ataque = 1;
        $tipo_carta = 'Tipo Carta';
        $texto = 'Texto';
        $puntos_victoria = 1;

        $card = new Carta();

        $card->setNombre($nombre);
        $card->setHabilidadRecurso($habilidad_recurso);
        $card->setHabilidadBatalla($habilidad_batalla);
        $card->setCoste($coste);
        $card->setEstadoCarta($estado_carta);
        $card->setVida($vida);
        $card->setRareza($rareza);
        $card->setObservaciones($observaciones);
        $card->setFoto($foto);
        $card->setDefensa($defensa);
        $card->setAtaque($ataque);
        $card->setTipoCarta($tipo_carta);
        $card->setTexto($texto);
        $card->setPuntosVictoria($puntos_victoria);

        $entityManager->persist($card);
        $entityManager->flush();

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

    #[Route('/cards', name: 'listCards')]
    public function listCards()
    {
        $cardsRepository = $this->em->getRepository(Carta::class);

        // Obtenemos todas las tarjetas sin paginación
        $resultados = $cardsRepository->findAll();

        return $this->render("listCard.html", [
            "resultados" => $resultados
        ]);
    }

}