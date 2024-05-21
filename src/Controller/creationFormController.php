<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class creationFormController extends AbstractController
{
    #[Route('/api/creation/analyze-form', name: 'api_analyzeForm')]
    public function analyzeForm(Request $request) : Response
    {
        $data = $request->request->all();

        //muratura
        $superficieTamponamento = $request->request->get('superficieTamponamento');
        $spessoreBloccoAmbiente = $request->request->get('spessoreBloccoAmbiente');
        $sceltaMaltaTamponamento = $request->request->get('sceltaMaltaTamponamento');

        //ciclo di intonaco
        $sceltaIntonacoTamponamento = $request->request->get('sceltaIntonacoTamponamento');

        //tavolati divisori
        $materiale = $request->request->get('materiale');
        $superficieTavoliDivisori = $request->request->get('superficieTavoliDivisori');
        $spessoreTavoliDivisori = $request->request->get('spessoreTavoliDivisori');
        $maltaTavDiv = $request->request->get('maltaTavDiv');
        $spessoreCanafiber = $request->request->get('spessoreCanafiber');
        $superficieCanafiber = $request->request->get('superficieCanafiber');

        //ciclo di intonaco
        $sceltaIntonacoTavoliDivisori = $request->request->get('sceltaIntonacoTavoliDivisori');

        $superficieIsolamentoCopertura = $request->request->get('superficieIsolamentoCopertura');
        $spessoreIsolamentoCopertura = $request->request->get('spessoreIsolamentoCopertura');

        $superficieIsolamentoSottofondo = $request->request->get('superficieIsolamentoSottofondo');
        $spessoreIsolamentoSottofondo = $request->request->get('spessoreIsolamentoSottofondo');

        //costruzione esistente
        $superficieContropareteEsterna = $request->request->get('superficieContropareteEsterna');
        $controparteEsterna = $request->request->get('controparteEsterna');
        $spessoreBA = $request->request->get('spessoreBA');
        $spessoreBioBeton = $request->request->get('spessoreBioBeton');

        $superficieIsolamentoCoperturaEsistente = $request->request->get('superficieIsolamentoCoperturaEsistente');
        $spessoreIsolamentoCoperturaEsistente = $request->request->get('spessoreIsolamentoCoperturaEsistente');

        $superficieIsolamentoSottofondoEsistente = $request->request->get('superficieIsolamentoSottofondoEsistente');
        $spessoreIsolamentoSottofondoEsistente = $request->request->get('spessoreIsolamentoSottofondoEsistente');

        //calcoli belli

        dd($data);

        return $this->render('senini/pdf-organize.html.twig', [
            'data' => $data,
        ]);


        /*return $this->render('senini/pdf-finale.html.twig', [
            'data' => $data,
        ]);*/
    }
}