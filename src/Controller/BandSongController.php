<?php

namespace App\Controller;

use App\Entity\BandSong;
use App\Form\BandSongType;
use App\Repository\BandSongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/band/song')]
class BandSongController extends AbstractController
{
    #[Route('/', name: 'app_band_song_index', methods: ['GET'])]
    public function index(BandSongRepository $bandSongRepository): Response
    {
        return $this->render('band_song/index.html.twig', [
            'band_songs' => $bandSongRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_band_song_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BandSongRepository $bandSongRepository): Response
    {
        $bandSong = new BandSong();
        $form = $this->createForm(BandSongType::class, $bandSong);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bandSongRepository->save($bandSong, true);

            return $this->redirectToRoute('app_band_song_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('band_song/new.html.twig', [
            'band_song' => $bandSong,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_band_song_show', methods: ['GET'])]
    public function show(BandSong $bandSong): Response
    {
        return $this->render('band_song/show.html.twig', [
            'band_song' => $bandSong,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_band_song_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BandSong $bandSong, BandSongRepository $bandSongRepository): Response
    {
        $form = $this->createForm(BandSongType::class, $bandSong);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bandSongRepository->save($bandSong, true);

            return $this->redirectToRoute('app_band_song_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('band_song/edit.html.twig', [
            'band_song' => $bandSong,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_band_song_delete', methods: ['POST'])]
    public function delete(Request $request, BandSong $bandSong, BandSongRepository $bandSongRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bandSong->getId(), $request->request->get('_token'))) {
            $bandSongRepository->remove($bandSong, true);
        }

        return $this->redirectToRoute('app_band_song_index', [], Response::HTTP_SEE_OTHER);
    }
}
