<?php

namespace App\Controller;

use App\Entity\Band;
use App\Form\BandType;
use App\Repository\BandRepository;
use App\Repository\EventRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/band')]
#[IsGranted('ROLE_BAND')]
class BandController extends AbstractController
{
    #[Route('/', name: 'app_band', methods: ['GET'])]
    public function index(BandRepository $bandRepository): Response
    {
//        return $this->render('band/index.html.twig', [
//            'bands' => $bandRepository->findAll(),
//        ]);

        $band = $this->getUser();

        return $this->render('band/show.html.twig', [
            'band' => $band,
            'bandSongs' => $band->getBandSongs(),
        ]);

    }
    #[Route('/bookings', name: 'app_band_bookings')]
    public function bandBookings( EventRepository $eventRepository ): Response
    {
          $band = $this->getUser();
          $events = $eventRepository->findAll();




        return $this->render('band/showBookings.html.twig', [
            'events' => $events,
            'band' => $band
        ]);
    }
    #[Route('/new', name: 'app_band_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BandRepository $bandRepository): Response
    {
        $band = new Band();
        $form = $this->createForm(BandType::class, $band);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bandRepository->save($band, true);

            return $this->redirectToRoute('app_band_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('band/new.html.twig', [
            'band' => $band,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_band_show', methods: ['GET'])]
    public function show(Band $band): Response
    {
        /*return $this->render('band/show.html.twig', [
            'band' => $band,
            'bandSongs' => $band->getBandSongs(),
        ]);*/
    }

    #[Route('/{id}/edit', name: 'app_band_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Band $band, BandRepository $bandRepository): Response
    {
        $form = $this->createForm(BandType::class, $band);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bandRepository->save($band, true);

            return $this->redirectToRoute('app_band', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('band/edit.html.twig', [
            'band' => $band,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_band_delete', methods: ['POST'])]
    public function delete(Request $request, Band $band, BandRepository $bandRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$band->getId(), $request->request->get('_token'))) {
            $bandRepository->remove($band, true);
        }

        return $this->redirectToRoute('app_band_index', [], Response::HTTP_SEE_OTHER);
    }


}
