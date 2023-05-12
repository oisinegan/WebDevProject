<?php

namespace App\Controller;

use App\Entity\Band;
use App\Entity\User;
use App\Entity\Manager;
use App\Form\ManagerRegistrationFormType;
use App\Form\UserRegistrationFormType;
use App\Security\LoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class ManagerRegistrationController extends AbstractController
{
    #[Route('/registerManager', name: 'app_register_manager')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Manager();
        $form = $this->createForm(ManagerRegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setBandRole("ROLE_MANAGER");

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email
            return $this->redirectToRoute('app_manager');
            return $userAuthenticator->authenticateUser(
                $user,
               //$authenticator,
                $request
            );


        }

        return $this->render('registration/ManagerRegister.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
