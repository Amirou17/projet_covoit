<?php

namespace App\Controller;

use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{
    private $session;

    public function __contruct(SessionInterface $session){
        $this->session = $session;
    }

    /**
     * @Route("/theme/{theme}", name="theme")
     * @param $theme
     * @param Response $request
     * @return Response
     */
    public function switchTheme($theme, Response $request): Response
    {
        $this->session->set('theme', $theme);
        return $this->redirect($request->server->get('HTTP_REFERER'));
    }
}
