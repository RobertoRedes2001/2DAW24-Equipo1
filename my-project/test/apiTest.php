<?php

use PHPUnit\Framework\TestCase;
use Doctrine\Persistence\ManagerRegistry;
use App\Controller\CartaController;
use App\Controller\NoticiaController;
use App\Controller\Tienda;



class cardsTest extends TestCase {

    public function testShow()
    {
        $doctrine = $this->createMock(ManagerRegistry::class);

        $card = new Carta();
        $card->setNombre('sofi');

        $doctrine->method('getRepository')
            ->willReturn($this->createMock(ObjectRepository::class));

        $controller = new CartaController();
        $response = $controller->show($doctrine, 1);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals('sofi', $responseData['nombre']);
    }

    public function testInsert()
    {
        $entityManager = $this->createMock(EntityManagerInterface::class);

        $request = $this->createMock(Request::class);
        $request->request = $this->createMock(ParameterBag::class);
        $request->request->expects($this->any())
            ->method('get')
            ->willReturnMap([
                ['titulo', null, 'Título de la noticia'],
                ['texto', null, 'Texto de la noticia'],
                ['fecha', null, 'now'],
            ]);

        $repository = $this->createMock(ObjectRepository::class);
        $repository->expects($this->once())
            ->method('find')
            ->willReturn(new Tienda());

        $entityManager->expects($this->once())
            ->method('getRepository')
            ->willReturn($repository);
        $entityManager->expects($this->once())
            ->method('persist');
        $entityManager->expects($this->once())
            ->method('flush');

        $controller = new NoticiaController($entityManager);
        $response = $controller->insert($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(Response::HTTP_FOUND, $response->getStatusCode());
        $this->assertEquals('listNoticias', $response->headers->get('Location'));
    }

    //Esta prueba tiene que haber 
    public function testUpdateProcess()
    {
        $entityManager = $this->createMock(EntityManagerInterface::class);


        $request = $this->createMock(Request::class);
        $request->request = $this->createMock(ParameterBag::class);
        $request->request->expects($this->any())
            ->method('get')
            ->willReturnMap([
                ['nombre', null, 'Sofia la barbara'],
            ]);

        $repository = $this->createMock(ObjectRepository::class);
        $repository->expects($this->once())
            ->method('find')
            ->willReturn(new Carta());

        $entityManager->expects($this->once())
            ->method('getRepository')
            ->willReturn($repository);
        $entityManager->expects($this->once())
            ->method('persist');
        $entityManager->expects($this->once())
            ->method('flush');

        $controller = new CardController($entityManager);

        $response = $controller->updateProcess($request, 1);
        $this->assertInstanceOf(Response::class, $response);
    }

}

?>