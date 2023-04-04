<?php

namespace App\Controller;

use DeprecationTests\Foo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Util\Food;

class DefaultController extends AbstractController
{

    #[Route('/food', name: 'food')]
    public function food(): Response
    {
        $template = 'default/food.html.twig';

        $food1 = new Food();
        $food1->setName('lemon juice');
        $food1->setPhValue(2);

        $food2 = new Food();
        $food2->setName('fresh eggs');
        $food2->setPhValue(8);

        $food3 = new Food();
        $food3->setName('apples');
        $food3->setPhValue(4);

        $foods = [];
        $foods[] = $food1;
        $foods[] = $food2;
        $foods[] = $food3;

        $args = [
            'foods' => $foods
        ];

        return $this->render($template, $args);
    }

    #[Route('/slug/{word1}/{word2}', name: 'slug')]
    public function slug(string $word1, string $word2): Response
    {
        $template = 'default/slug.html.twig';
        $message = "$word1-$word2";
        $args = [
            'message' => $message
        ];

        return $this->render($template, $args);
    }

    #[Route('/', name: 'homepage')]
    public function home(): Response
    {
        $template = 'default/home.html.twig';
        $args = [];

        return $this->render($template, $args);
    }

    #[Route('/coffee', name: 'coffee')]
    public function coffee(): Response
    {
        $template = 'default/coffee.html.twig';
        $args = [];

        return $this->render($template, $args);
    }


}
