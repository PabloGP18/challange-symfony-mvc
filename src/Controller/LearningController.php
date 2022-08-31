<?php

namespace App\Controller;

use App\Form\PostType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LearningController extends AbstractController
{
    #[Route('/learning', name: 'app_learning')]
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    #[Route('/about-me', name: 'app_about_me')]
    public function aboutMe(): Response
    {
        $hello = "lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut";

        return $this->render('learning/example.html.twig', [
            'name' => 'Becode',
            'lorem' => $hello,
        ]);
    }
    #[Route('/about-you', name: 'app_about_you')]
    public function aboutYou(): Response
    {
        $hello = "lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut";

        return $this->render('learning/example.html.twig', [
            'name' => 'becode',
            'lorem' => $hello,
        ]);
    }




    #[Route('/', name: 'app_show_my_name')]
    public function showMyName(Request $request): Response{

        $user = new User();
        $form = $this->createForm(PostType::class, $user, [
            'action' => $this->generateUrl('app_show_my_name'),
            'method' => 'post'
        ]);


        $form->handleRequest($request);

        $name ='Unknown';


        if($form-> isSubmitted() && $form->isValid())
        {
            $name = $user-> getName();
            return $this->render('learning/index.html.twig', [
                'name' => $name,
            ]);
        }


        return $this->render('learning/showmyname.html.twig', [
            'name' => $name,
            'form' => $form -> createView(),
        ]);
    }


}
