<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalcolatoreFormule extends AbstractController
{
    function metriCubiBloccoAmbiente(float $metriQuadri, float $spessore, float $multiploBancale): float {
        $metriCubi = $metriQuadri * 0.9 * ($spessore / 100);
        $metriCubiApprossimati = ceil($metriCubi / $multiploBancale) * $multiploBancale;
        return $metriCubiApprossimati;
    }

    function calcoloPrezzoMetroQuadro(float $metriCubi, float $prezzoMetroCubo, float $metriQuadri): float {
        return ($metriCubi * $prezzoMetroCubo) / $metriQuadri;
    }

    function metriCubiMalta(float $metriQuadri, float $spessoreBloccoAmbiente): float {
        $metriCubi = $metriQuadri * 0.1 * ($spessoreBloccoAmbiente / 100);
        $metriCubiApprossimati = ceil($metriCubi / 0.2) * 0.2;
        return $metriCubiApprossimati;
    }

    function calcoloSecchiMalta(float $metriQuadri, float $spessore): int {
        $secchiMalta = ($metriQuadri * 0.1 * $spessore / 100) / 0.015;
        $secchiMaltaApprossimati = ceil($secchiMalta);
        return (int)$secchiMaltaApprossimati;
    }

    function calcoloSacchiIntonaco(float $metriQuadri): int {
        $sacchiIntonaco = ($metriQuadri * 30) / 25;
        $sacchiIntonacoApprossimati = ceil($sacchiIntonaco);
        return (int)$sacchiIntonacoApprossimati;
    }

    function calcoloSacchiMaltaFinetura(float $metriQuadri): int {
        $sacchiMaltaFine = ($metriQuadri * 4) / 25;
        $sacchiMaltaFineApprossimati = ceil($sacchiMaltaFine);
        return (int)$sacchiMaltaFineApprossimati;
    }

    function calcoloSacchiSNTplus(float $metriQuadri): int {
        $sacchiMaltaFine = ($metriQuadri * 6) / 25;
        $sacchiMaltaFineApprossimati = ceil($sacchiMaltaFine);
        return (int)$sacchiMaltaFineApprossimati;
    }

    function calcoloSecchiBioBeton(float $metriQuadri): int {
        $sacchiMaltaFineApprossimati = ceil($metriQuadri);
        return (int)$sacchiMaltaFineApprossimati;
    }

    function calcoloAdditivoProbiotico(float $metriQuadri): int {
        $sacchiMaltaFine = $metriQuadri / 2;
        $sacchiMaltaFineApprossimati = ceil($sacchiMaltaFine);
        return (int)$sacchiMaltaFineApprossimati;
    }

    function calcoloSecchiCanapulino(float $metriQuadri): int {
        $sacchiMaltaFine = $metriQuadri / 3;
        $sacchiMaltaFineApprossimati = ceil($sacchiMaltaFine);
        return (int)$sacchiMaltaFineApprossimati;
    }

    function calcoloIsolamentoCopertura(float $metriQuadri, float $spessore): float {
        $metriCubi = ($metriQuadri * $spessore) / 100;
        $metriCubiApprossimati = ceil($metriCubi);
        return $metriCubiApprossimati;
    }
}