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
        $superficieTamponamento = $request->request->get('superficieTamponamento');
        $spessoreTamponamento = $request->request->get('spessoreTamponamento');
        //$sceltaMaltaTamponamento = $request->request->get('sceltaMaltaTamponamento');

        //Ciclo di intonaco e finitura su tamponamento
        $superficieIntonacoTamponamento = $request->request->get('superficieIntonacoTamponamento');
        //$sceltaIntonacoTamponamento = $request->request->get('sceltaIntonacoTamponamento');

        //Tavolati divisori
        //$materiale = $request->request->get('materiale');
        //$superficieTavoliDivisori = $request->request->get('superficieTavoliDivisori');
        //$spessoreTavoliDivisori = $request->request->get('spessoreTavoliDivisori');
        //$maltaTavDiv = $request->request->get('maltaTavDiv');
        //$spessoreCanafiber = $request->request->get('spessoreCanafiber');
        //$superficieCanafiber = $request->request->get('superficieCanafiber');

        //Ciclo di intonaco e finitura su tavoli divisori
        //$sceltaIntonacoTavoliDivisori = $request->request->get('sceltaIntonacoTavoliDivisori');

        //Isolamento copertura
        $superficieIsolamentoCopertura = (float)$request->request->get('superficieIsolamentoCopertura');
        $spessoreIsolamentoCopertura = (float)$request->request->get('spessoreIsolamentoCopertura');

        //Isolamento sottofondo
        $superficieIsolamentoSottofondo = (float)$request->request->get('superficieIsolamentoSottofondo');
        $spessoreIsolamentoSottofondo = (float)$request->request->get('spessoreIsolamentoSottofondo');

        //costruzione esistente
        $superficieContropareteEsterna = $request->request->get('superficieContropareteEsterna');
        $controparteEsterna = $request->request->get('controparteEsterna');
        $spessoreBA = $request->request->get('spessoreBA');
        $spessoreCanafiberEsterno = $request->request->get('spessoreCanafiberEsterno');
        $spessoreBioBeton = $request->request->get('spessoreBioBeton');

        $sceltaIntFinEst = $request->request->get('sceltaIntFinEst');

        $superficieContropareteInterna = $request->request->get('superficieContropareteInterna');
        $controparteInterna = $request->request->get('controparteInterna');
        $spessoreBAInt1 = $request->request->get('spessoreBAInt1');
        $spessoreBAInt2 = $request->request->get('spessoreBAInt2');
        $spessoreCanaInt = $request->request->get('spessoreCanaInt');
        $spessoreBAInt3 = $request->request->get('spessoreBAInt3');
        $spessoreBBProntoInt1 = $request->request->get('spessoreBBProntoInt1');
        $spessoreBBProntoInt2 = $request->request->get('spessoreBBProntoInt2');
        $spessoreCanaInt2 = $request->request->get('spessoreCanaInt2');

        $sceltaIntFinInt = $request->request->get('sceltaIntFinInt');

        $superficieIsolamentoSolaioSottofondo = $request->request->get('superficieIsolamentoSolaioSottofondo');
        $spessoreIsolamentoSolaioSottofondo = $request->request->get('spessoreIsolamentoSolaioSottofondo');

        $superficieTermointonaco = $request->request->get('superficieTermointonaco');
        $spessoreTermointonaco = $request->request->get('spessoreTermointonaco');

        //calcoli belli
        $metriCubiBloccoAmbiente = $calcolatore->metriCubiBloccoAmbiente($superficieTamponamento, $spessoreTamponamento, 0.96);
        $prezzoMetroQuadroBloccoAmbiente = $calcolatore->calcoloPrezzoMetroQuadro($metriCubiBloccoAmbiente, 380, $superficieTamponamento);
        $metriCubiMalta = $calcolatore->metriCubiMalta($superficieTamponamento, $spessoreTamponamento);
        $calcoloSecchiMalta = $calcolatore->calcoloSecchiMalta($superficieTamponamento, $spessoreTamponamento);
        $prezzoMetroQuadroMalta = $calcolatore->calcoloPrezzoMetroQuadro($metriCubiMalta, 406, $superficieTamponamento);
        $prezzoMetroQuadroMaltaSecchi = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSecchiMalta, 23, $superficieTamponamento);
        $calcoloSacchiIntonaco = $calcolatore->calcoloSacchiIntonaco($superficieIntonacoTamponamento);
        $calcoloSacchiMaltaFinetura = $calcolatore->calcoloSacchiMaltaFinetura($superficieIntonacoTamponamento);
        $prezzoMetroQuadroSacchiIntonaco = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSacchiIntonaco, 11, $superficieIntonacoTamponamento);
        $prezzoMetroQuadroMaltaFinetura = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSacchiMaltaFinetura, 6, $superficieIntonacoTamponamento);
        $calcoloSacchiSNTplus = $calcolatore->calcoloSacchiSNTplus($superficieIntonacoTamponamento);
        $prezzoMetroQuadroSNTplus = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSacchiSNTplus, 26, $superficieIntonacoTamponamento);
        $calcoloSecchiBioBeton = $calcolatore->calcoloSecchiBioBeton($superficieIntonacoTamponamento);
        $calcoloAdditivoProbiotico = $calcolatore->calcoloAdditivoProbiotico($superficieIntonacoTamponamento);
        $calcoloSecchiCanapulino = $calcolatore->calcoloSecchiCanapulino($superficieIntonacoTamponamento);
        $prezzoMetroQuadroBioBeton = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSecchiBioBeton, 23, $superficieIntonacoTamponamento);
        $prezzoMetroQuadroAdditivoProbiotico = $calcolatore->calcoloPrezzoMetroQuadro($calcoloAdditivoProbiotico, 13, $superficieIntonacoTamponamento);
        $prezzoMetroQuadroCanapulino = $calcolatore->calcoloPrezzoMetroQuadro($calcoloSecchiCanapulino, 27, $superficieIntonacoTamponamento);
        $calcoloIsolamentoCopertura = $calcolatore->calcoloIsolamentoCopertura($superficieIsolamentoCopertura, $spessoreIsolamentoCopertura);
        $calcoloIsolamentoSottofondo = $calcolatore->calcoloIsolamentoCopertura($superficieIsolamentoSottofondo, $spessoreIsolamentoSottofondo);
        $prezzoMetroQuadroIsolamentoCopertura = $calcolatore->calcoloPrezzoMetroQuadro($calcoloIsolamentoCopertura, 230, $superficieIsolamentoCopertura);
        $prezzoMetroQuadroIsolamentoSottofondo = $calcolatore->calcoloPrezzoMetroQuadro($calcoloIsolamentoSottofondo, 230, $superficieIsolamentoSottofondo);

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
        ]);


        /*return $this->render('senini/pdf-finale.html.twig', [
            'data' => $data,
        ]);*/
    }
}