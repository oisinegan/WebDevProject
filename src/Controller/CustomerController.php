<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;
use App\Repository\BandRepository;

class CustomerController extends AbstractController
{
    #[Route('/customer', name: 'app_customer')]
    #[IsGranted('ROLE_CUSTOMER')]
    public function index(): Response
    {
        return $this->render('customer/index.html.twig', [
            'controller_name' => 'CustomerController',
            'user' => $this->getUser(),
        ]);
    }

    #[Route('/customer/bandlist', name: 'app_customer_bandList')]
    #[IsGranted('ROLE_CUSTOMER')]
    public function bandList(BandRepository $bandRepository): Response
    {
        return $this->render('customer/bandlist.html.twig', [
            'controller_name' => 'CustomerController',
            'bands' => $bandRepository->findAll(),
            'band' => $this->getUser(),
            'user'=>$this->getUser(),
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/customer/booking', name: 'app_customer_booking', methods: ['GET', 'POST'])]
    public function new(Request $request, EventRepository $eventRepository): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);

        if(isset($_POST['priceButton'])){
            if ($event->getPrice() != null){
                echo $event->getPrice();
            }
            echo 'pick a band';
        }

        if ($form->isSubmitted() && $form->isValid()) {

            //code to change price based on band
            $event->setPrice($event->getBand()->getPrice());

            //TODO make a check price button so user can check price before submitting the form

            $eventRepository->save($event, true);

            return $this->redirectToRoute('app_user_show', ['id'=>$this->getUser()->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('customer/eventBooking.html.twig', [
            'event' => $event,
            'form' => $form,
        ]);
    }

}
