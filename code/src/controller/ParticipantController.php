<?php

namespace App\controller;

use App\controller\TwigConfig;
use App\model\DatabaseModel;
use App\repository\ParticipantsRepository;


use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;

//use App\controller\TwigConfig;

class ParticipantController extends DatabaseModel
{


    public $index;
    public $pList;
    public $twig;
    public $download;

    function __construct()
    {
        //$pdo = new DatabaseModel(['mysql:host=localhost;dbname=compets_management; charset=utf8', 'root', '']);
        //$this->pList = new ParticipantsRepository($pdo);
        $this->pList = new ParticipantsRepository();
        $this->twig = new TwigConfig();
        $this->download = new CsvController();
    }

    public function participantsViewList(Request $request, Response $response): Response
    {
        $contentPage = $this->twig->twig->render('participantList.html.twig', ['pList' => $this->pList->findAll()]);
        $response = $response->setContent($contentPage);
        return $response;
    }

    public function participantView(Request $request, Response $response): Response
    {
       // $request = Request::createFromGlobals();
        $url = explode('=', $request->getPathInfo());
        $contentPage = $this->twig->twig->render('participantId.html.twig', ['pList' => $this->pList->find($url[1])]);
        $response = $response->setContent($contentPage);
        return $response;
    }

    public function participantAdd(Request $request, Response $response)
    {
        $this->pList->add($request->request);
        $contentPage = $this->twig->twig->render('participantAdd.html.twig');
        $response = $response->setContent($contentPage);
        return $response;
    }

}