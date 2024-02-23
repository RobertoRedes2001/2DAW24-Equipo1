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
use App\Entity\Tienda;

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

    #[Route('/addNoticia', name: 'addNoticia')]
    public function renderInsert()
    {
        return $this->render("insertFormNoticia.html", []);
    }

    #[Route('/insertNoticia', name: 'insertNoticia', methods: ['POST'])]
    public function insert(): Response
    {
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $file = $_FILES["fotoNoticia"];
        $fecha = new \DateTime($_POST['fecha']);

        $noticia = new Noticia();

        $noticia->setFechaPublicacion($fecha);
        $noticia->setTitulo($titulo);
        $noticia->setTexto($texto);

        $tiendaObject = $this->em->getRepository(Tienda::class)->find(1);

        $noticia->setTienda($tiendaObject);

        if ($file["error"] === UPLOAD_ERR_OK) {
            $filename = basename($file["name"]);
            $tempFilePath = $file["tmp_name"];

            echo $tempFilePath . "<br>"; // Comprobación de la ruta del archivo temporal

            $uploadDir = "./img/";
            $destination = $uploadDir . $filename;

            echo $destination . "<br>"; // Comprobación de la ruta de destino del archivo

            // Moviendo el archivo desde la ubicación temporal a la carpeta de destino
            if (rename($tempFilePath, $destination)) {
                $rutaArchivo = $destination;
                $noticia->setFoto(realpath($rutaArchivo));
                echo "El archivo se ha movido correctamente."; // Mensaje de éxito
            } else {
                echo "Error al mover el archivo."; // Mensaje de error al mover el archivo
            }
        } else {
            echo "Error en la subida del archivo."; // Mensaje de error en la subida del archivo
        }




        $this->em->persist($noticia);
        $this->em->flush();

        return $this->redirectToRoute('listNoticias');
    }

    #[Route('/deleteNoticia/{id}', name: 'delNoticia')]
    public function del(int $id): Response
    {
        $noticiaRepository = $this->em->getRepository(Noticia::class);

        $noticia = $noticiaRepository->find($id);

        $this->em->remove($noticia);

        $this->em->flush();

        return $this->redirectToRoute('listNoticias');
    }

    #[Route('/renderUpdateNoticia/{id}', name: 'renderUpdateNoticia')]
    public function renderUpdate($id): Response
    {
        $noticiaRepository = $this->em->getRepository(Noticia::class);
        $noticia = $noticiaRepository->find($id);

        return $this->render("updateFormNoticia.html", [
            "resultados" => $noticia,
        ]);
    }

    #[Route('/updateNoticia/{id}', name: 'updateNoticia')]
    public function update($id): Response
    {
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $fotoNoticia = '';
        $fecha = new \DateTime($_POST['fecha']);

        $noticia = $this->em->getRepository(Noticia::class)->find($id);

        $noticia->setFechaPublicacion($fecha);
        $noticia->setTitulo($titulo);
        $noticia->setTexto($texto);
        $noticia->setFoto($fotoNoticia);

        $tiendaObject = $this->em->getRepository(Tienda::class)->find(1);

        $noticia->setTienda($tiendaObject);

        $this->em->persist($noticia);
        $this->em->flush();

        return $this->redirectToRoute('listNoticias');

    } 
}