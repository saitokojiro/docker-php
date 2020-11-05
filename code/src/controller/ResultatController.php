<?php

namespace App\controller;


use App\controller\TwigConfig;
use App\model\DatabaseModel;
use App\repository\ParticipantsRepository;
use App\repository\ResultatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\controller\CsvController;


class ResultatController extends DatabaseModel
{
    public $twig;
    public $uploaded;
    public $resRepo;

    public function __construct()
    {
        $this->twig = new TwigConfig();
        $this->uploaded = new CsvController();
        $this->resRepo = new ResultatRepository();
    }

    public function viewAllParticipant(Request $request, Response $response): Response
    {
        $test = $this->uploaded->csvImportAnotherPage($request);
        $url = explode('=', $request->getPathInfo());
        $this->resRepo->addParticipantsResult($test , $url[1]);
        $contentPage = $this->twig->twig->render('resultatList.html.twig', ['pList' => $test]);
        $response->setContent($contentPage);
        return $response;
    }
    public function ParticipantResult()
    {

    }
}