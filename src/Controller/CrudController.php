<?php

namespace App\Controller;
use App\Entity\Anime;
use App\Form\AnimeType;
use App\Repository\AnimeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CrudController extends AbstractController
{
    #[Route('/crud', name: 'crud_crud', methods: ['GET'])]
    public function index(AnimeRepository $repository): Response
    {
        $animes = $repository->findAll();
        
        return $this->render('crud/crud.html.twig', [
            'animes' => $animes
        ]);
    }
    #[Route('/crud/new', name: 'app_newAnime', methods: ['GET', 'POST'])]
    public function newAnime(
        Request $request,
        EntityManagerInterface $manager
        ): Response{
        $anime = new Anime();
        $form = $this->createForm(AnimeType::class, $anime);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $anime = $form->getData();

            $manager->persist($anime);
            $manager->flush();

           return $this->redirectToRoute('crud_crud');
        }

        return $this->render('crud/new.html.twig',[
         'form' => $form->createView()
      ]);
     }
     #[Route('/crud/edit/{id}', name: 'app_editAnime', methods: ['GET', 'POST'])]
     public function editAnime(Anime $anime, 
     Request $request,
     EntityManagerInterface $manager
     ): Response {
        $form = $this->createForm(AnimeType::class, $anime);
        if ($form->isSubmitted() && $form->isValid()) {
            $anime = $form->getData();

            $manager->persist($anime);
            $manager->flush();


           return $this->redirectToRoute('crud_crud');
        }
         return $this->render('crud/edit.html.twig',[
            'form' => $form->createView()
         ]);
     }
     #[Route('/crud/supp/{id}', name: 'app_suppAnime', methods: ['GET',])]
     public function delete(EntityManagerInterface $manager, Anime $anime): Response {

        $manager->remove($anime);
        $manager->flush();

        return $this->redirectToRoute('app_crud');
     }
}
