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

    #[Route('/allNews', name: 'allNews', methods: ['get'])]
    public function allCards(ManagerRegistry $doctrine): JsonResponse
    {
        $news = $doctrine
            ->getRepository(Noticia::class)
            ->findAll();

        $data = [];

        foreach ($news as $new) {
            $data[] = [
                'noticia_cod' => $new->getId(),
                'fecha_publicacion' => $new->getFechaPublicacion(),
                'titulo' => $new->getTitulo(),
                'texto' => $new->getTexto(),
                'foto' => $new->getFoto(),
                'tienda' => $new->getTienda(),
            ];
        }
        return $this->json($data);
    }

    #[Route('/news/{id}', name: 'singleNew', methods: ['get'])]
    public function show(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $news = $doctrine->getRepository(Noticia::class)->find($id);

        if (!$news) {

            return $this->json('No project found for id ' . $id, 404);
        }

        $data[] = [
            'noticia_cod' => $news->getId(),
            'fecha_publicacion' => $news->getFechaPublicacion(),
            'titulo' => $news->getTitulo(),
            'texto' => $news->getTexto(),
            'foto' => $news->getFoto(),
            'tienda' => $news->getTienda(),
        ];

        return $this->json($data);
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