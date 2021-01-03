<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
     * @Route("/profile", name="profile")
     */
    public function index(){
        return $this->render('user/index.html.twig', [
            'user' => $this->getUser(),
        ]);
    }


    /**
     * @Route("/registration", name="registration.user")
     */

    public function registration(Request $request, EntityManagerInterface $em){

        $regis = new User();
        $form = $this->createForm(UserType::class, $regis);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($regis);
            $em->flush();

            return $this->redirectToRoute('app_login');
        }
        return $this->render('user/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/{id}", name="show.user")
     * @param User $user
     * @return Response
     */
    public function showUser(User $user) : Response{

        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/user/{id}/edit", name="edit.user")
     * @param Request $request
     * @param User $user
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function editUser(Request $request, User $user, EntityManagerInterface $em) : Response {

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirectToRoute('show.html.twig');
        }

        return $this->render('user/registration.html.twig', [
            'form' => $form->createView(),
            'user1' => $user,
        ]);
    }

}
