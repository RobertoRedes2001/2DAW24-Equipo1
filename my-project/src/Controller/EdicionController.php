<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Edicion;
use App\Entity\Tienda;

class EdicionController extends AbstractController
{
    //Variable y constructor del EntityManagerInterface
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/ediciones', name: 'listEdiciones')]
    public function listEdiciones()
    {
        $edicionRepository = $this->em->getRepository(Edicion::class);

        $resultados = $edicionRepository->findAll();

        return $this->render("listEdiciones.html", [
            "resultados" => $resultados
        ]);
    }

    #[Route('/renderInsertEdicion', name: 'renderInsertEdicion')]
    public function renderInsertEdicion()
    {
        return $this->render("insertFormEdición.html", []); 
    }

    #[Route('/insertEdicion', name: 'insertEdicion', methods: ['POST'])]
    public function insert(): Response
    {
        $nameEdition = $_POST['nameEdition'];
        $number = $_POST['cantidad'];
        $date = new \DateTime($_POST['fecha_salida']);

        $edition = new Edicion();

        $edition->setNombre($nameEdition);
        $edition->setFechaSalida($date);
        $edition->setCantidad($number);

        $tiendaObject = $this->em->getRepository(Tienda::class)->find(1);

        $edition->setTienda($tiendaObject);

        $this->em->persist($edition);
        $this->em->flush();

        return $this->redirectToRoute('listEdiciones');
    }

    #[Route('/deleteEdicion/{id}', name: 'delEdicion')]
    public function del(int $id): Response
    {
        $editionRepository = $this->em->getRepository(Edicion::class);

        $edition = $editionRepository->find($id);

        $this->em->remove($edition);

        $this->em->flush();

        return $this->redirectToRoute('listEdiciones');
    }

    #[Route('/renderUpdateEdicion/{id}', name: 'renderUpdateEdicion')]
    public function renderUpdate($id): Response
    {
        $editionRepo = $this->em->getRepository(Edicion::class);
        $edition = $editionRepo->find($id);

        return $this->render("updateFormEdiciones.html", [
            "resultados" => $edition,
        ]);
    }

    #[Route('/updateEdicion/{id}', name: 'updateEdicion')]
    public function update($id): Response
    {
        $nameEdition = $_POST['nameEdition'];
        $number = $_POST['cantidad'];
        $date = new \DateTime($_POST['fecha_salida']);

        $edition = $this->em->getRepository(Edicion::class)->find($id);

        $edition->setNombre($nameEdition);
        $edition->setFechaSalida($date);
        $edition->setCantidad($number);

        $this->em->persist($edition);
        $this->em->flush();

        return $this->redirectToRoute('listEdiciones');

    } 
}