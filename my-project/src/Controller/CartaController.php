<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Carta;
use App\Entity\Edicion;
use App\Entity\CartaEdicion;

class CartaController extends AbstractController
{

    //Variable y constructor del EntityManagerInterface
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/allCards', name: 'allCards', methods:['get'])]
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

    #[Route('/cardName/{name}', name: 'nameCard', methods: ['get'])]
    public function showName(ManagerRegistry $doctrine, string $name): JsonResponse
    {
        $repository = $doctrine->getRepository(Carta::class);

        // Utilizamos la función LIKE para buscar nombres que contengan el valor proporcionado
        $query = $repository->createQueryBuilder('c')
            ->where('c.nombre LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->getQuery();

        $cards = $query->getResult();

        if (empty($cards)) {
            return $this->json('No project found for name ' . $name, 404);
        }

        $responseData = [];
        foreach ($cards as $card) {
            $data = [
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
            $responseData[] = $data;
        }

        return $this->json($responseData);
    }


    #[Route('/cards', name: 'listCards')]
    public function listCards()
    {
        $cardsRepository = $this->em->getRepository(Carta::class);

        $resultados = $cardsRepository->findAll();

        return $this->render("listCard.html", [
            "resultados" => $resultados
        ]);
    }

    #[Route('/renderInsertCard', name: 'renderInsertCard')]
    public function renderInsert(): Response
    {
        return $this->render("insertFormCard.html", []);
    }

    #[Route('/deleteCard/{id}', name: 'delClient')]
    public function del(int $id): Response
    {
        $cardsRepository = $this->em->getRepository(Carta::class);
        $cardEditionRepository = $this->em->getRepository(CartaEdicion::class);

        $card = $cardsRepository->find($id);

        $cardEdition = $cardEditionRepository->findOneBy(['carta_id' => $id]);

        if (!$card || !$cardEdition) {
            throw $this->createNotFoundException('La carta o su edición no fueron encontradas');
        }

        $this->em->remove($cardEdition);

        $this->em->remove($card);

        $this->em->flush();

        return $this->redirectToRoute('listCards');
    }

    #[Route('/insertCard', name: 'insertCard', methods: ['POST'])]
    public function insert(): Response
    {
        $nameCard = $_POST['nameCard'];
        $firstHability = $_POST['habRecurso'];
        $secondHability = $_POST['habBatalla'];
        $cost = $_POST['coste'];
        $cardStatus = $_POST['estado_carta'];
        $health = $_POST['vida'];
        $rarity = $_POST['rareza'];
        $foto = '';
        $attack = $_POST['ataque'];
        $defense = $_POST['defensa'];
        $typeCard = $_POST['tipo_carta'];
        $text = $_POST['texto'];
        $observations = $_POST['observaciones'];
        $edition = $_POST['edicion'];
        $victoryPoints = 0;

        $card = new Carta();

        $card->setNombre($nameCard);
        $card->setHabilidadRecurso($firstHability);
        $card->setHabilidadBatalla($secondHability);
        $card->setCoste($cost);
        $card->setEstadoCarta($cardStatus);
        $card->setVida($health);
        $card->setRareza($rarity);
        $card->setObservaciones($observations);
        $card->setFoto($foto);
        $card->setDefensa($defense);
        $card->setAtaque($attack);
        $card->setTipoCarta($typeCard);
        $card->setTexto($text);
        $card->setPuntosVictoria($victoryPoints);

        $this->em->persist($card);
        $this->em->flush();

        $editionObject = $this->em->getRepository(Edicion::class)->find($edition);

        $cardEdition = new CartaEdicion();
        $cardEdition->setCartaId($card);
        $cardEdition->setEdicionId($editionObject);

        $this->em->persist($cardEdition);
        $this->em->flush();


        return $this->redirectToRoute('listCards');

    }

    #[Route('/renderUpdateCard/{id}', name: 'renderUpdateCard')]
    public function renderUpdate($id): Response
    {
        $cardRepository = $this->em->getRepository(Carta::class);
        $card = $cardRepository->find($id);

        return $this->render("updateFormCard.html", [
            "resultados" => $card,
        ]);
    }

    #[Route('/updateCard/{id}', name: 'updateClient', methods: ['POST'])]
    public function updateProcess($id): Response
    {
        // Obtener los datos del formulario
        $nameCard = $_POST['nameCard'];
        $firstHability = $_POST['habRecurso'];
        $secondHability = $_POST['habBatalla'];
        $cost = $_POST['coste'];
        $cardStatus = $_POST['estado_carta'];
        $health = $_POST['vida'];
        $rarity = $_POST['rareza'];
        $foto = '';
        $attack = $_POST['ataque'];
        $defense = $_POST['defensa'];
        $typeCard = $_POST['tipo_carta'];
        $text = $_POST['texto'];
        $observations = $_POST['observaciones'];
        $editionId = $_POST['edicion']; // Obtener el ID de la edición

        // Buscar la carta por su ID
        $card = $this->em->getRepository(Carta::class)->find($id);

        if (!$card) {
            throw $this->createNotFoundException('La carta no fue encontrada');
        }

        // Actualizar los campos de la carta
        $card->setNombre($nameCard);
        $card->setHabilidadRecurso($firstHability);
        $card->setHabilidadBatalla($secondHability);
        $card->setCoste($cost);
        $card->setEstadoCarta($cardStatus);
        $card->setVida($health);
        $card->setRareza($rarity);
        $card->setObservaciones($observations);
        $card->setFoto($foto);
        $card->setDefensa($defense);
        $card->setAtaque($attack);
        $card->setTipoCarta($typeCard);
        $card->setTexto($text);
        $card->setPuntosVictoria(0);

        // Persistir la carta
        $this->em->persist($card);

        // Buscar o crear la CartaEdicion asociada
        $cardEdition = $this->em->getRepository(CartaEdicion::class)->findOneBy(['carta_id' => $id]);
        if (!$cardEdition) {
            $cardEdition = new CartaEdicion();
            $cardEdition->setCartaId($card);
        }

        // Obtener la entidad de Edicion por su ID
        $edition = $this->em->getRepository(Edicion::class)->find($editionId);

        if (!$edition) {
            throw $this->createNotFoundException('La edición no fue encontrada');
        }

        // Asignar la edición a la CartaEdicion
        $cardEdition->setEdicionId($edition);

        // Persistir la CartaEdicion
        $this->em->persist($cardEdition);

        // Aplicar los cambios en la base de datos
        $this->em->flush();

        // Redirigir a la página deseada
        return $this->redirectToRoute('listCards');
    }
}