<?php

namespace App\Controller;

use App\Entity\BandMember;
use App\Form\BandMemberType;
use App\Repository\BandMemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/band/member')]
class BandMemberController extends AbstractController
{
    #[Route('/', name: 'app_band_member_index', methods: ['GET'])]
    public function index(BandMemberRepository $bandMemberRepository): Response
    {
        return $this->render('band_member/index.html.twig', [
            'band_members' => $bandMemberRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_band_member_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BandMemberRepository $bandMemberRepository): Response
    {
        $bandMember = new BandMember();
        $form = $this->createForm(BandMemberType::class, $bandMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bandMemberRepository->save($bandMember, true);

            return $this->redirectToRoute('app_band_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('band_member/new.html.twig', [
            'band_member' => $bandMember,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_band_member_show', methods: ['GET'])]
    public function show(BandMember $bandMember): Response
    {
        return $this->render('band_member/show.html.twig', [
            'band_member' => $bandMember,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_band_member_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BandMember $bandMember, BandMemberRepository $bandMemberRepository): Response
    {
        $form = $this->createForm(BandMemberType::class, $bandMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bandMemberRepository->save($bandMember, true);

            return $this->redirectToRoute('app_band_member_index', [], Response::HTTP_SEE_OTHER);
        }
       $bmId = $bandMember->getId();
        return $this->renderForm('band_member/edit.html.twig', [
            'bmId' => $bmId,
            'band_member' => $bandMember,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_band_member_delete', methods: ['POST'])]
    public function delete(Request $request, BandMember $bandMember, BandMemberRepository $bandMemberRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bandMember->getId(), $request->request->get('_token'))) {
            $bandMemberRepository->remove($bandMember, true);
        }

        return $this->redirectToRoute('app_band_member_index', [], Response::HTTP_SEE_OTHER);
    }
}
