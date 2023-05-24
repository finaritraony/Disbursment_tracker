<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(): Response
    {
        $vriable = 'test';
        $des="test1";
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
