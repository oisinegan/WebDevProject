<?php

namespace App\Controller;

use App\Entity\EventSong;
use App\Form\EventSongType;
use App\Repository\EventSongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/event/song')]
class EventSongController extends AbstractController
{
    #[Route('/', name: 'app_event_song_index', methods: ['GET'])]
    public function index(EventSongRepository $eventSongRepository): Response
    {
        return $this->render('event_song/index.html.twig', [
            'event_songs' => $eventSongRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_event_song_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EventSongRepository $eventSongRepository): Response
    {
        $eventSong = new EventSong();
        $form = $this->createForm(EventSongType::class, $eventSong);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eventSongRepository->save($eventSong, true);

            return $this->redirectToRoute('app_event_song_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('event_song/new.html.twig', [
            'event_song' => $eventSong,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_event_song_show', methods: ['GET'])]
    public function show(EventSong $eventSong): Response
    {
        return $this->render('event_song/show.html.twig', [
            'event_song' => $eventSong,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_event_song_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EventSong $eventSong, EventSongRepository $eventSongRepository): Response
    {
        $form = $this->createForm(EventSongType::class, $eventSong);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eventSongRepository->save($eventSong, true);

            return $this->redirectToRoute('app_event_song_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('event_song/edit.html.twig', [
            'event_song' => $eventSong,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_event_song_delete', methods: ['POST'])]
    public function delete(Request $request, EventSong $eventSong, EventSongRepository $eventSongRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eventSong->getId(), $request->request->get('_token'))) {
            $eventSongRepository->remove($eventSong, true);
        }

        return $this->redirectToRoute('app_event_song_index', [], Response::HTTP_SEE_OTHER);
    }
}
