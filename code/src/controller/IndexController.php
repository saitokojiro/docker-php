<?php

namespace App\controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public $twig;

    public function __construct()
    {
        $this->twig = new TwigConfig();
    }

    public function index(Request $request, Response $response): Response
    {
        $contentPage = $this->twig->twig->render('index.html.twig', []);
        $response = $response->setContent($contentPage);
        return $response;
    }

}