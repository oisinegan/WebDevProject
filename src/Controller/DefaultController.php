<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/contact-us', name: 'app_contact')]
    public function contactUs(): Response
    {
        return $this->render('default/contact_us.html.twig');
    }
    #[Route('/About-us', name: 'app_About-us')]
    public function aboutUs(): Response
    {
        return $this->render('default/about_us.html.twig');
    }

    #[Route('/privacy-policy', name: 'app_privacy_policy')]
    public function privacyPolicy(): Response
    {
        return $this->render('default/privacy_policy.html.twig');
    }

    #[Route('/getLocation', name: 'app_location')]
    public function location(): Response
    {
        return $this->render('default/getLocation.html.twig');
    }
    #[Route('/location', name: 'app_3Arena_location')]
    public function find(): Response
    {
        return $this->render('location/location.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}

//final commit