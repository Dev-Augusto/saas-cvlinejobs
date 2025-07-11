<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ApisConsumer
{

    public function nifOrBiValidate($nif)
    {
        $response = Http::get("https://consulta.edgarsingui.ao/consultar/" . $nif . "/nif");
        return $response->json($key = null);
    }
    public static function bi($bi)
    {
        $bi_url = 'https://dominios.ao/ao/actions/bi.ajcall.php?bi=';

        $ch = curl_init($bi_url . $bi);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = json_decode(curl_exec($ch), true);

        return $data;
    }

    public static function nif($nif)
    {
        $bi_url =  'https://dominios.ao/ao/actions/nif.ajcall.php?nif=';

        $ch = curl_init($bi_url . $nif);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = json_decode(curl_exec($ch), true);

        return $data;
    }

    public static function getInterPol($color)
    {
        $bi_url =  'https://ws-public.interpol.int/notices/v1/' . $color;

        $ch = curl_init($bi_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = json_decode(curl_exec($ch), true);

        return $data;
    }

    public static function getFbi()
    {
        $bi_url =  'https://api.fbi.gov/wanted/v1/list/';

        $ch = curl_init($bi_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = json_decode(curl_exec($ch), true);

        return $data;
    }

    public static function searchInterpol($color, $forename = null, $name = null)
    {
        if (!empty($forename)) {
            $color .= "?forename=" . str_replace(' ', '+', $forename);
        }

        if (!empty($name)) {
            $color .= "?name=" . str_replace(' ', '+', $name);
        }

        $bi_url =  'https://ws-public.interpol.int/notices/v1/' . $color;

        $ch = curl_init($bi_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = json_decode(curl_exec($ch), true);

        return $data;
    }

    public static function pagination($url)
    {
        $bi_url =  $url;

        $ch = curl_init($bi_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = json_decode(curl_exec($ch), true);

        return $data;
    }
}
