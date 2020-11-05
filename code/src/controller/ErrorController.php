<?php

namespace App\controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ErrorController
{
    public $twig;
    public $uploaded;

    public function __construct()
    {
        $this->twig = new TwigConfig();
    }

    public function pageError( $error , Request $request, Response $response): Response
    {
        $contentPage = $this->twig->twig->render('error.html.twig', 404);
        $response->setContent($contentPage);
        return $response;
    }
}