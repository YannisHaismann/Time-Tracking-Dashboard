<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'user' => $user,
        ]);
    }
}