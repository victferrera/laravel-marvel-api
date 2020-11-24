<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class MarvelApiControlador extends Controller
{
    public function callApi(Request $nome)
    {

        $data = new DateTime();
        $timestamp = $data->getTimestamp();

        $chavePrivada = '2292698d73b4bc4b46f1bce177dc93325dfe04a9';
        $chavePublica = '36985449538c72530e35cf3a6d4b4064';
        $chavePrivadaPublica = $chavePrivada.$chavePublica;

        $chavePrivadaPublicaComTimestamp = $timestamp.$chavePrivadaPublica;
        $chaveMd5 = hash('md5', $chavePrivadaPublicaComTimestamp);


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://gateway.marvel.com:80/v1/public/characters?ts=$timestamp&apikey=$chavePublica&hash=$chaveMd5&name=$nome->nomeHeroi");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json')                                                                       
        );
        
        $saida = curl_exec($ch) or die(curl_error());

        curl_close($ch);
        
        return view('mostrarDadosHeroi')->with('json', json_decode($saida));

    }

    public function pesquisa()
    {
        return view('inicio.pesquisa');
    }

}
