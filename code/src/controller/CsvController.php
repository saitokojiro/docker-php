<?php


namespace App\controller;

use App\entity\Participant;
use App\repository\ParticipantsRepository;
use phpDocumentor\Reflection\Types\Void_;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Exception;


class CsvController
{

    /**
     * Get a CSV file from an array
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function csvExport()
    {
        $partRepo = new ParticipantsRepository();
        $fp = fopen('php://output', 'w+');
        $templateCsv = array(
            'id',
            'nom',
            'prenom',
            'photo',
            'categorie',
            'profil',
            'email',
            'date_de_naissance',
            'passage',
            'passage_1 ',
            'passage_2'
        );
        fputcsv($fp, $templateCsv);
        foreach ($partRepo->findAll() as $line) {
            fputcsv($fp, $line);
        }
        $response = new Response(stream_get_contents($fp));

        //$response = new Response();
        fclose($fp);
        $response->headers->set('Content-type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="ok.csv";');
        $response->sendHeaders();
        $response->getContent();

        return $response;
    }

    public function csvImport(Request $request)
    {
        $twig = new TwigConfig();
        $getAllPart = new Participant();
        dump($request);
        /** @var UploadedFile $uploadfile */
        $uploadedfile = $request->files->get('csv');
        if ($uploadedfile == null) {
            echo $twig->twig->render('test.html.twig');
        } else {
            $csvDataJson = $this->csvAll($uploadedfile);
            for ($i = 0; $i < count($csvDataJson); $i++) {
                $getAllPart->setNom($csvDataJson[$i]->nom);
                $getAllPart->setPrenom($csvDataJson[$i]->prenom);
                dump($getAllPart->getAllVal());
            }
            echo $twig->twig->render('test.html.twig');
        }
    }

    public function csvImportAnotherPage($request)
    {
        $twig = new TwigConfig();
        /** @var UploadedFile $uploadfile */
        $uploadedfile = $request->files->get('csv');
        if ($uploadedfile == null) {
            return null;
        } else {
            $csvDataJson = $this->csvAll($uploadedfile);

            return $csvDataJson;
        }
    }

    public function convertorJs($array)
    {
        $jsonEncode = json_encode($array);
        return json_decode($jsonEncode);
    }

    public function replaceValue($array, $find, $replace)
    {
        if (strpos($array, ';') == true) {
            $array = str_replace($find, $replace, $array);
        }
        return $array;
    }

    public function csvControl($arrayCsvMain)
    {
        $lines = explode("\n", $arrayCsvMain);
        $head = str_getcsv(array_shift($lines));
        $arrayCsv = array();
        foreach ($lines as $line) {
            if (!$line == false) {
                if (count($head) !== count(str_getcsv($line))) {
                    return new Exception("contenu incorrect");
                }

                $arrayCsv[] = array_combine($head, str_getcsv($line));
            }
        }
        return $arrayCsv;
    }

    public function csvAll($uploadedfile)
    {
        $csvData = file_get_contents($uploadedfile);
        $csvDatas = $this->replaceValue($csvData, ";", ",");
        $arrayCsv = $this->csvControl($csvDatas);
        $csvDataJson = $this->convertorJs($arrayCsv);
        return $csvDataJson;
    }
}