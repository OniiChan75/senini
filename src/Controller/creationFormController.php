<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class creationFormController extends AbstractController
{
    #[Route('/api/creation/analyze-form', name: 'api_analyzeForm')]
    public function analyzeForm(Request $request, CalcolatoreFormule $calcolatore) : Response
    {
        //Muratura di tamponamento
        $superficieTamponamento = (float)$request->request->get('superficieTamponamento') ?? 0;
        $spessoreTamponamento = (float)$request->request->get('spessoreTamponamento') ?? 0;
        $sceltaMaltaTamponamento = $request->request->get('sceltaMaltaTamponamento') ?? 0;

        //Ciclo di intonaco e finitura su tamponamento
        $superficieIntonacoTamponamento = (float)$request->request->get('superficieIntonacoTamponamento') ?? 0;
        //$sceltaIntonacoTamponamento = $request->request->get('sceltaIntonacoTamponamento') ?? 0;

        //Tavolati divisori
        //$materiale = $request->request->get('materiale') ?? 0;
        //$superficieTavoliDivisori = $request->request->get('superficieTavoliDivisori') ?? 0;
        //$spessoreTavoliDivisori = $request->request->get('spessoreTavoliDivisori') ?? 0;
        //$maltaTavDiv = $request->request->get('maltaTavDiv') ?? 0;
        //$spessoreCanafiber = $request->request->get('spessoreCanafiber') ?? 0;
        //$superficieCanafiber = $request->request->get('superficieCanafiber') ?? 0;

        //Ciclo di intonaco e finitura su tavoli divisori
        //$sceltaIntonacoTavoliDivisori = $request->request->get('sceltaIntonacoTavoliDivisori') ?? 0;

        //Isolamento copertura
        $superficieIsolamentoCopertura = (float)$request->request->get('superficieIsolamentoCopertura') ?? 0;
        $spessoreIsolamentoCopertura = (float)$request->request->get('spessoreIsolamentoCopertura') ?? 0;

        //Isolamento sottofondo
        $superficieIsolamentoSottofondo = (float)$request->request->get('superficieIsolamentoSottofondo') ?? 0;
        $spessoreIsolamentoSottofondo = (float)$request->request->get('spessoreIsolamentoSottofondo') ?? 0;

        //costruzione esistente
        $superficieContropareteEsterna = $request->request->get('superficieContropareteEsterna') ?? 0;
        $controparteEsterna = $request->request->get('controparteEsterna') ?? 0;
        $spessoreBA = $request->request->get('spessoreBA') ?? 0;
        $spessoreCanafiberEsterno = $request->request->get('spessoreCanafiberEsterno') ?? 0;
        $spessoreBioBeton = $request->request->get('spessoreBioBeton') ?? 0;

        $sceltaIntFinEst = $request->request->get('sceltaIntFinEst') ?? 0;

        $superficieContropareteInterna = (float)$request->request->get('superficieContropareteInterna') ?? 0;
        $controparteInterna = $request->request->get('controparteInterna') ?? 0;
        $spessoreBAInt1 = $request->request->get('spessoreBAInt1') ?? 0;
        $spessoreBAInt2 = $request->request->get('spessoreBAInt2') ?? 0;
        $spessoreCanaInt = $request->request->get('spessoreCanaInt') ?? 0;
        $spessoreBAInt3 = $request->request->get('spessoreBAInt3') ?? 0;
        $spessoreBBProntoInt1 = $request->request->get('spessoreBBProntoInt1') ?? 0;
        $spessoreBBProntoInt2 = $request->request->get('spessoreBBProntoInt2') ?? 0;
        $spessoreCanaInt2 = (float)$request->request->get('spessoreCanaInt2') ?? 0;

        $sceltaIntFinInt = $request->request->get('sceltaIntFinInt') ?? 0;

        $superficieIsolamentoSolaioSottofondo = $request->request->get('superficieIsolamentoSolaioSottofondo') ?? 0;
        $spessoreIsolamentoSolaioSottofondo = $request->request->get('spessoreIsolamentoSolaioSottofondo') ?? 0;

        $superficieTermointonaco = $request->request->get('superficieTermointonaco') ?? 0;
        $spessoreTermointonaco = $request->request->get('spessoreTermointonaco') ?? 0;

        $sconto = $request->request->get('sconto') ?? 0;
        $agente = $request->request->get('agente') ?? 'null';


        //calcoli belli
        $metriCubiBloccoAmbiente = $calcolatore->metriCubiBloccoAmbiente($superficieTamponamento, $spessoreTamponamento, 0.96);
        $prezzoMetroQuadroBloccoAmbiente = $calcolatore->calcoloPrezzoMetroQuadro($metriCubiBloccoAmbiente, 380-(380*$sconto/100), $superficieTamponamento);
        $metriCubiMalta = $calcolatore->metriCubiMalta($superficieTamponamento, $spessoreTamponamento);
        $calcoloSecchiMalta = $calcolatore->calcoloSecchiMalta($superficieTamponamento, $spessoreTamponamento);
        $prezzoMetroQuadroMalta = $calcolatore->calcoloPrezzoMetroQuadro($metriCubiMalta, 406-(406*$sconto/100), $superficieTamponamento);
        $prezzoMetroQuadroMaltaSecchi = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSecchiMalta, 23-(23*$sconto/100), $superficieTamponamento);
        $calcoloSacchiIntonaco = $calcolatore->calcoloSacchiIntonaco($superficieIntonacoTamponamento);
        $calcoloSacchiMaltaFinetura = $calcolatore->calcoloSacchiMaltaFinetura($superficieIntonacoTamponamento);
        $prezzoMetroQuadroSacchiIntonaco = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSacchiIntonaco, 11-(11*$sconto/100), $superficieIntonacoTamponamento);
        $prezzoMetroQuadroMaltaFinetura = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSacchiMaltaFinetura, 6-(6*$sconto/100), $superficieIntonacoTamponamento);
        $calcoloSacchiSNTplus = $calcolatore->calcoloSacchiSNTplus($superficieIntonacoTamponamento);
        $prezzoMetroQuadroSNTplus = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSacchiSNTplus, 26-(26*$sconto/100), $superficieIntonacoTamponamento);
        $calcoloSecchiBioBeton = $calcolatore->calcoloSecchiBioBeton($superficieIntonacoTamponamento);
        $calcoloAdditivoProbiotico = $calcolatore->calcoloAdditivoProbiotico($superficieIntonacoTamponamento);
        $calcoloSecchiCanapulino = $calcolatore->calcoloSecchiCanapulino($superficieIntonacoTamponamento);
        $prezzoMetroQuadroBioBeton = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSecchiBioBeton, 23-(23*$sconto/100), $superficieIntonacoTamponamento);
        $prezzoMetroQuadroAdditivoProbiotico = $calcolatore->calcoloPrezzoMetroQuadro($calcoloAdditivoProbiotico, 13-(13*$sconto/100), $superficieIntonacoTamponamento);
        $prezzoMetroQuadroCanapulino = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSecchiCanapulino, 27-(27*$sconto/100), $superficieIntonacoTamponamento);
        $calcoloIsolamentoCopertura = $calcolatore->calcoloIsolamentoCopertura($superficieIsolamentoCopertura, $spessoreIsolamentoCopertura);
        $calcoloIsolamentoSottofondo = $calcolatore->calcoloIsolamentoCopertura($superficieIsolamentoSottofondo, $spessoreIsolamentoSottofondo);
        $prezzoMetroQuadroIsolamentoCopertura = $calcolatore->calcoloPrezzoMetroQuadro($calcoloIsolamentoCopertura, 230-(230*$sconto/100), $superficieIsolamentoCopertura);
        $prezzoMetroQuadroIsolamentoSottofondo = $calcolatore->calcoloPrezzoMetroQuadro($calcoloIsolamentoSottofondo, 230-(230*$sconto/100), $superficieIsolamentoSottofondo);
        $calcoloContropareteInterna = $calcolatore->calcoloContropareteInterna($superficieContropareteInterna, $spessoreCanaInt2);
        $prezzoMetroQuadroContropareteInterna = $calcolatore->calcoloPrezzoMetroQuadro($calcoloContropareteInterna, 280-(280*$sconto/100), $superficieContropareteInterna);

        return $this->render('senini/pdf-organize.html.twig', [
            'superficieTamponamento' => $superficieTamponamento,
            'spessoreTamponamento' => $spessoreTamponamento,
            'metriCubiBloccoAmbiente' => $metriCubiBloccoAmbiente,
            'prezzoMetroQuadroBloccoAmbiente' => $prezzoMetroQuadroBloccoAmbiente,
            'metriCubiMalta' => $metriCubiMalta,
            'calcoloSecchiMalta' => $calcoloSecchiMalta,
            'prezzoMetroQuadroMalta' => $prezzoMetroQuadroMalta,
            'prezzoMetroQuadroMaltaSecchi' => $prezzoMetroQuadroMaltaSecchi,
            'superficieIntonacoTamponamento' => $superficieIntonacoTamponamento,
            'calcoloSacchiIntonaco' => $calcoloSacchiIntonaco,
            'calcoloSacchiMaltaFinetura' => $calcoloSacchiMaltaFinetura,
            'prezzoMetroQuadroSacchiIntonaco' => $prezzoMetroQuadroSacchiIntonaco,
            'prezzoMetroQuadroMaltaFinetura' => $prezzoMetroQuadroMaltaFinetura,
            'calcoloSacchiSNTplus' => $calcoloSacchiSNTplus,
            'prezzoMetroQuadroSNTplus' => $prezzoMetroQuadroSNTplus,
            'calcoloSecchiBioBeton' => $calcoloSecchiBioBeton,
            'calcoloAdditivoProbiotico' => $calcoloAdditivoProbiotico,
            'calcoloSecchiCanapulino' => $calcoloSecchiCanapulino,
            'prezzoMetroQuadroBioBeton' => $prezzoMetroQuadroBioBeton,
            'prezzoMetroQuadroAdditivoProbiotico' => $prezzoMetroQuadroAdditivoProbiotico,
            'prezzoMetroQuadroCanapulino' => $prezzoMetroQuadroCanapulino,
            'superficieIsolamentoCopertura' => $superficieIsolamentoCopertura,
            'spessoreIsolamentoCopertura' => $spessoreIsolamentoCopertura,
            'calcoloIsolamentoCopertura' => $calcoloIsolamentoCopertura,
            'superficieIsolamentoSottofondo' => $superficieIsolamentoSottofondo,
            'spessoreIsolamentoSottofondo' => $spessoreIsolamentoSottofondo,
            'calcoloIsolamentoSottofondo' => $calcoloIsolamentoSottofondo,
            'prezzoMetroQuadroIsolamentoCopertura' => $prezzoMetroQuadroIsolamentoCopertura,
            'prezzoMetroQuadroIsolamentoSottofondo' => $prezzoMetroQuadroIsolamentoSottofondo,
            'superficieContropareteInterna' => $superficieContropareteInterna,
            'spessoreCanaInt2' => $spessoreCanaInt2,
            'calcoloContropareteInterna' => $calcoloContropareteInterna,
            'prezzoMetroQuadroContropareteInterna' => $prezzoMetroQuadroContropareteInterna,
            'agente' => $agente,
            'sconto' => $sconto,
        ]);


        /*return $this->render('senini/pdf-finale.html.twig', [

        ]);*/
    }
}