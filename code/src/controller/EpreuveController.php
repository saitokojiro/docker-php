<?php

namespace App\controller;


use App\model\DatabaseModel;
use App\repository\EpreuveRepository;
use App\repository\ParticipantsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EpreuveController extends DatabaseModel
{

    public $eprRepo;
    public $twig;
    public $pList;

    function __construct()
    {
        $this->pList = new ParticipantsRepository();
        $this->eprRepo = new EpreuveRepository();
        $this->twig = new TwigConfig();
        //$this->download = new CsvController();
    }


    public function epreuveList(Request $request, Response $response): Response
    {
        dump($this->eprRepo->findAll());
        $contentPage = $this->twig->twig->render('epreuveList.html.twig', ["pList" => $this->eprRepo->findAll()]);
        $response = $response->setContent($contentPage);
        return $response;
    }

    public function epreuveSelected(Request $request, Response $response): Response
    {
        $request = Request::createFromGlobals();
        $url = explode('=', $request->getPathInfo());

        dump($this->eprRepo->findAllParticipantsEp($url[1]));
        $contentPage = $this->twig->twig->render(
            'epreuveManagement.html.twig',
            ["pList" => $this->eprRepo->findAllParticipantsEp($url[1])]
        );
        $response = $response->setContent($contentPage);
        return $response;
    }

    public function epreuveAdd(Request $request, Response $response): Response
    {
        $this->eprRepo->add($request->request);
        $contentPage = $this->twig->twig->render('epreuveAdd.html.twig');
        $response = $response->setContent($contentPage);
        return $response;
    }

}