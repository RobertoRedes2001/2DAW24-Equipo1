<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Noticia;

class NoticiasController extends AbstractController
{
    //Variable y constructor del EntityManagerInterface
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/noticias', name: 'listNoticias')]
    public function listNoticias()
    {
        $noticiasRepository = $this->em->getRepository(Noticia::class);

        $resultados = $noticiasRepository->findAll();

        return $this->render("listNoticias.html", [
            "resultados" => $resultados
        ]);
    }



    
}