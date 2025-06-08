<?php

namespace App\Helpers;

use App\Models\EvidenceFiles;
use App\Models\Modules;
use App\Models\MonitoramentoActividade;
use App\Models\Blacklist;
use App\Models\Supply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Helper
{

    public static function removerCaracteresEspeciais($texto)
    {
        $textoSemEspeciais = preg_replace('/[^a-zA-Z0-9]/', '', $texto);
        $textoMinusculo = strtolower($textoSemEspeciais);
        return $textoMinusculo;
    }
    public static function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    public static function objectJson($data, $assoc = false)

    //
    {
        return json_decode(json_encode($data), $assoc);
    }

    public static function getExtensionFile($file)
    {
        if (!is_null($file)) {
            $extension = $file->getClientOriginalExtension();
            return  $extension;
        }
    }
    public static function returnApi($messages, $status, $data = null, $header = null)
    {
        $response = ['status' => '0', 'message' => 'Validation error'];
        $response['status'] = $status;
        $response['message'] = $messages;
        if ($data != null) {
            $response['data'] = $data;
        }
        return response($response, $status)->withHeaders([
            $header
        ]);
    }

    public static function upload($image, string $local, $rand_status = true)
    {
        if (is_file($image)) {
            $extension = $image->getClientOriginalExtension();
            if ($rand_status) {
                $rand = rand(1, 1000000);
                $picture = time() . $rand . '.' . $extension;
            } else {
                $picture = time() . '.' . $extension;
            }

            $destinationPath = public_path() . $local;
            $res = $image->move($destinationPath, $picture);
            if ($res) {
                return [
                    'status' => true,
                    'message' => $picture
                ];
            }
            return [
                'status' => false,
                'message' => "Error Upload"
            ];
        }
    }
    public static function colorText($string, $searchPhrase)
    {
        $searchPhrase = ltrim(ucfirst($searchPhrase));
        $string = ltrim(ucfirst($string));
        $highlightedSubstring = '<span style="background-color: yellow">' . $searchPhrase . '</span>';
        $highlightedString = str_ireplace($searchPhrase, $highlightedSubstring, $string);
        echo ucfirst($highlightedString);
    }

    public static function formata_telefone($numero)
    {
        if (empty($numero)) {
            return $numero;
        }
        $ret = '';
        switch (strlen($numero)) {
            case '10':
                $ret = "(" . substr($numero, 0, 2) . ") " . substr($numero, 2, 4) . "-" . substr($numero, 6, 4);
            case '11':
                $ret = "(" . substr($numero, 0, 2) . ") " . substr($numero, 2, 1) . "-" . substr($numero, 3, 4) . "-" . substr($numero, 7, 4);
                break;
            case '12':
                $ret = substr($numero, 0, 2) . " (" . substr($numero, 2, 2) . ") " . substr($numero, 4, 4) . "-" . substr($numero, 8, 4);
                break;
            case '13':
                $ret = substr($numero, 0, 2) . " (" . substr($numero, 2, 2) . ") " . substr($numero, 4, 1) . "-" . substr($numero, 5, 4) . "-" . substr($numero, 9, 4);
                break;
            default:
                $ret = $numero;
                break;
        }
        return $ret;
    }

    public static function hashPassWordCode()
    {
        $maiu = [
            '€',
            '$',
            '?',
            '#',
            ')',
            '-',
            'M',
            'a',
            'A',
            'Z',
            'L',
            '/',
            '=',
            '~',
            '%'
        ];
        $rar = rand(0, 7);
        $rarr = rand(0, 7);
        $rar1 = rand(0, 7);
        $rar3 = rand(0, 7);
        $rar5 = rand(0, 7);

        $senha = rand(1, 51) . "" . $maiu[$rar5] . "" . $maiu[$rar3] . "" . $maiu[$rar1] . "" . rand(1, 51) . "" . $maiu[$rar] . rand(1, 69) . "" . $maiu[$rarr] . "" . rand(1, 51);

        return $senha;
    }

    public static function addYear($year)
    {
        $date_atual = new \DateTime(date('Y-m-d'));
        $day_start = $year;
        $data_expire = $date_atual->modify('+' . $day_start . ' year');
        return $data_expire;
    }

    public static function convertBaseImage($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return $base64;
    }

    public static function SegundoMaior(array $arr)
    {

        return  max($arr);
    }

    public static function permissions($module)
    {
        $verify = Modules::verifyModule($module);
        if (!$verify == false) {
            return redirect()->back()->with('error', "Erro");
        }
    }

    public static function verifyEvidences($id_kyc = null)
    {
        if (empty($id_kyc)) {
            return false;
        }
        return EvidenceFiles::where('id_cdd_colectivo', $id_kyc)->exists();
    }

    public function verifyActividade(array $data)
    {
        $data = MonitoramentoActividade::Where('id_company', $data['id_company'])
            ->Where('id_supply', $data['id_supply'])
            ->Where('id_analist', $data['id_analist'])
            ->Where('id_activity', $data['id_activity'])
            ->Where('table', $data['table'])
            ->Where('type', $data['type'])
            ->Where('status', $data['status'])
            ->first();
        if (is_null($data)) {
            return true;
        } else {
            return false;
        }
    }

    public static function blackList($nif_number)
    {
        $verify = BlackList::Where("nif_number", $nif_number)->first();
        if ($verify) {
            return true;
        } else {
            return false;
        }
    }

    public function setLevel(int $id_supply)
    {
        $user = Auth::user()->getTypeUser();
        $level = 1;
        switch ($user) {
            case 4:
                $level = 1;
                break;
            case 3:
                $level = 2;
                break;
            case 2:
                $level = 3;
                break;
        }
        return $level;
    }

    public function KycCentralVerify(string $type, string $nif_number)
    {
        $id_user_company = Auth::user()->getEmpresaId();
        $typeComercial = TypeUser::find(8);
        $type_userComercial = 0;
        !is_null($typeComercial) ? $type_userComercial = $typeComercial->id : "";
        $i = 0;
        $data = [];
        Auth::user()->type_user == $type_userComercial ? $i = 1 : $i = 0;
        // FOREACH PARA KYC
        if ($type == "singular") {
            //    peps
            $value = Kyc::Where('id_user', $id_user_company)
                ->Where("nif_number", $nif_number)
                ->first();
            $pepAo = PepAngola::search($value->name, $value->bi_number);
            $pepUe = PepUe::search($value->name, $value->bi_number);
            $i = 0;
            if (count($pepAo)) {
                array_push($data, $pepAo);
                $key = array_search($pepAo, $data);
                $data[$key]['table'] = 'Pep Angola';
                $data[$key]['type'] = 'KYC Singular';
                $data[$key]['author'] = $value;
                $i = 0;
                foreach ($pepAo as $key => $pep) {
                    if (!($i >= (count($pepAo) - 3))) {
                        if ($pepAo[$i]->score >= 90) {
                            if (!$this->alertExist($id_user_company, $value->id, $pepAo[$i]->id, 'Pep Angola', 'KYC Singular')) {
                                Central_alerta::create([
                                    'id_user' => $id_user_company,
                                    'id_supply' => Auth::user()->id,
                                    'id_analist' => null,
                                    'id_author' => $value->id,
                                    'id_alert' => $pepAo[$i]->id,
                                    'percentagem' => round($pepAo[$i]->score, 1),
                                    'table' => 'Pep Angola',
                                    'type' => 'KYC Singular',
                                    'date_alert' => date('Y-m-d', strtotime('NOW')),
                                    'classification' => 'sem classificacao',
                                    'status' => 'Em validação do 1° Nivel',
                                    'level' => 1,
                                    'aception' => $i,
                                ]);
                            }
                        }
                    }
                    $i++;
                }
            }
            if (count($pepUe)) {
                array_push($data, $pepUe);
                $key = array_search($pepUe, $data);
                $data[$key]['table'] = 'World Pep';
                $data[$key]['type'] = 'KYC Singular';
                $data[$key]['author'] = $value;
                $i = 0;
                foreach ($pepUe as $key => $pep) {

                    if (!($i >= (count($pepUe) - 3))) {
                        if ($pepUe[$i]->score >= 90) {
                            if (!$this->alertExist($id_user_company, $value->id, $pepUe[$i]->id, 'World Pep', 'KYC Singular')) {
                                Central_alerta::create([
                                    'id_user' => $id_user_company,
                                    'id_supply' => Auth::user()->id,
                                    'id_analist' => null,
                                    'id_author' => $value->id,
                                    'id_alert' => $pepUe[$i]->id,
                                    'percentagem' => round($pepUe[$i]->score, 1),
                                    'table' => 'World Pep',
                                    'type' => 'KYC Singular',
                                    'date_alert' => date('Y-m-d', strtotime('NOW')),
                                    'classification' => 'sem classificacao',
                                    'status' => 'Em validação do 1° Nivel',
                                    'level' => 1,
                                    'aception' => $i,
                                ]);
                            }
                        }
                    }
                    $i++;
                }
            }
            // ===================================
            // Sanções
            $ofac = Ofac::search($value->name);
            if (count($ofac)) {
                array_push($data, $ofac);
                $key = array_search($ofac, $data);
                $data[$key]['table'] = 'Sanções da OFAC';
                $data[$key]['type'] = 'KYC Singular';
                $data[$key]['author'] = $value;
                $i = 0;
                foreach ($ofac as $key => $ofa) {
                    if (!($i >= (count($ofac) - 3))) {
                        if ($ofac[$i]->score >= 90) {
                            if (!$this->alertExist($id_user_company, $value->id, $ofac[$i]->id, 'Sanções da OFAC', 'KYC Singular')) {
                                Central_alerta::create([
                                    'id_user' => $id_user_company,
                                    'id_supply' => Auth::user()->id,
                                    'id_analist' => null,
                                    'id_author' => $value->id,
                                    'id_alert' => $ofac[$i]->id,
                                    'percentagem' => round($ofac[$i]->score, 1),
                                    'table' => 'Sanções da OFAC',
                                    'type' => 'KYC Singular',
                                    'date_alert' => date('Y-m-d', strtotime('NOW')),
                                    'classification' => 'sem classificacao',
                                    'status' => 'Em validação do 1° Nivel',
                                    'level' => 1,
                                    'aception' => $i,
                                ]);
                            }
                        }
                    }
                    $i++;
                }
            }
            $onu = Onu::search($value->name);
            if (count($onu)) {
                array_push($data, $onu);
                $key = array_search($onu, $data);
                $data[$key]['table'] = 'Sanções da ONU';
                $data[$key]['type'] = 'KYC Singular';
                $data[$key]['author'] = $value;
                $i = 0;
                foreach ($onu as $key => $on) {
                    if (!($i >= (count($onu) - 3))) {
                        if ($onu[$i]->score >= 90) {
                            if (!$this->alertExist($id_user_company, $value->id, $onu[$i]->id, 'Sanções da ONU', 'KYC Singular')) {
                                Central_alerta::create([
                                    'id_user' => $id_user_company,
                                    'id_supply' => Auth::user()->id,
                                    'id_analist' => null,
                                    'id_author' => $value->id,
                                    'id_alert' => $onu[$i]->id,
                                    'percentagem' => round($onu[$i]->score, 1),
                                    'table' => 'Sanções da ONU',
                                    'type' => 'KYC Singular',
                                    'date_alert' => date('Y-m-d', strtotime('NOW')),
                                    'classification' => 'sem classificacao',
                                    'status' => 'Em validação do 1° Nivel',
                                    'level' => 1,
                                    'aception' => $i,
                                ]);
                            }
                        }
                    }
                    $i++;
                }
            }
            $ue = Ue::search($value->name);
            if (count($ue)) {
                array_push($data, $ue);
                $key = array_search($ue, $data);
                $data[$key]['table'] = 'Sanções da UE';
                $data[$key]['type'] = 'KYC Singular';
                $data[$key]['author'] = $value;
                $i = 0;
                foreach ($ue as $key => $e) {
                    if (!($i >= (count($ue) - 3))) {
                        if ($ue[$i]->score >= 90) {
                            if (!$this->alertExist($id_user_company, $value->id, $ue[$i]->id, 'Sanções da UE', 'KYC Singular')) {
                                Central_alerta::create([
                                    'id_user' => $id_user_company,
                                    'id_supply' => Auth::user()->id,
                                    'id_analist' => null,
                                    'id_author' => $value->id,
                                    'id_alert' => $ue[$i]->id,
                                    'percentagem' => round($ue[$i]->score, 1),
                                    'table' => 'Sanções da UE',
                                    'type' => 'KYC Singular',
                                    'date_alert' => date('Y-m-d', strtotime('NOW')),
                                    'classification' => 'sem classificacao',
                                    'status' => 'Em validação do 1° Nivel',
                                    'level' => 1,
                                    'aception' => $i,
                                ]);
                            }
                        }
                    }
                    $i++;
                }
            }
            // ===================================
        }

        if ($type == "coletivo") {
            // Sanções
            $value = KycEmpresarial::Where('id_user', $id_user_company)
                ->Where("nif_number", $nif_number)
                ->first();
            $ofac = Ofac::search($value->company_name);
            if (count($ofac)) {
                array_push($data, $ofac);
                $key = array_search($ofac, $data);
                $data[$key]['table'] = 'Sanções da OFAC';
                $data[$key]['type'] = 'KYC Empresarial';
                $data[$key]['author'] = $value;
                $i = 0;
                foreach ($ofac as $key => $ofa) {
                    if (!($i >= (count($ofac) - 3))) {
                        if ($ofac[$i]->score >= 90) {
                            if (!$this->alertExist($id_user_company, $value->id, $ofac[$i]->id, 'Sanções da OFAC', 'KYC Empresarial')) {
                                Central_alerta::create([
                                    'id_user' => $id_user_company,
                                    'id_supply' => Auth::user()->id,
                                    'id_analist' => null,
                                    'id_author' => $value->id,
                                    'id_alert' => $ofac[$i]->id,
                                    'percentagem' => round($ofac[$i]->score, 1),
                                    'table' => 'Sanções da OFAC',
                                    'type' => 'KYC Empresarial',
                                    'date_alert' => date('Y-m-d', strtotime('NOW')),
                                    'classification' => 'sem classificacao',
                                    'status' => 'Em validação do 1° Nivel',
                                    'level' => 1,
                                    'aception' => $i,
                                ]);
                            }
                        }
                    }
                    $i++;
                }
            }
            $onu = Onu::search($value->company_name);
            if (count($onu)) {
                array_push($data, $onu);
                $key = array_search($onu, $data);
                $data[$key]['table'] = 'Sanções da ONU';
                $data[$key]['type'] = 'KYC Empresarial';
                $data[$key]['author'] = $value;
                $i = 0;
                foreach ($onu as $key => $on) {
                    if (!($i >= (count($onu) - 3))) {
                        if ($onu[$i]->score >= 90) {
                            if (!$this->alertExist($id_user_company, $value->id, $onu[$i]->id, 'Sanções da ONU', 'KYC Empresarial')) {
                                Central_alerta::create([
                                    'id_user' => $id_user_company,
                                    'id_supply' => Auth::user()->id,
                                    'id_analist' => null,
                                    'id_author' => $value->id,
                                    'id_alert' => $onu[$i]->id,
                                    'percentagem' => round($onu[$i]->score, 1),
                                    'table' => 'Sanções da ONU',
                                    'type' => 'KYC Empresarial',
                                    'date_alert' => date('Y-m-d', strtotime('NOW')),
                                    'classification' => 'sem classificacao',
                                    'status' => 'Em validação do 1° Nivel',
                                    'level' => 1,
                                    'aception' => $i,
                                ]);
                            }
                        }
                    }
                    $i++;
                }
            }
            $ue = Ue::search($value->company_name);
            if (count($ue)) {
                array_push($data, $ue);
                $key = array_search($ue, $data);
                $data[$key]['table'] = 'Sanções da UE';
                $data[$key]['type'] = 'KYC Empresarial';
                $data[$key]['author'] = $value;
                $i = 0;
                foreach ($ue as $key => $e) {
                    if (!($i >= (count($ue) - 3))) {
                        if ($ue[$i]->score >= 90) {
                            if (!$this->alertExist($id_user_company, $value->id, $ue[$i]->id, 'Sanções da UE', 'KYC Empresarial')) {
                                Central_alerta::create([
                                    'id_user' => $id_user_company,
                                    'id_supply' => Auth::user()->id,
                                    'id_analist' => null,
                                    'id_author' => $value->id,
                                    'id_alert' => $ue[$i]->id,
                                    'percentagem' => round($ue[$i]->score, 1),
                                    'table' => 'Sanções da UE',
                                    'type' => 'KYC Empresarial',
                                    'date_alert' => date('Y-m-d', strtotime('NOW')),
                                    'classification' => 'sem classificacao',
                                    'status' => 'Em validação do 1° Nivel',
                                    'level' => 1,
                                    'aception' => $i,
                                ]);
                            }
                        }
                    }
                    $i++;
                }
            }
            // ===================================
        }
        // ====================================================
    }

    private function alertExist($id_user, $id_author, $id_alert, $table, $type)
    {
        $verify = Central_alerta::Where('id_user', $id_user)
            ->Where('id_author', $id_author)
            ->Where('id_alert', $id_alert)
            ->Where('table', $table)
            ->Where('type', $type)->first();
        if ($verify) {
            return true;
        } else {
            return false;
        }
    }

    public static function formatDate($data)
    {
        $date = Carbon::parse($data)->locale('pt_PT');

        return str_replace("De ", "de ", ucwords($date->translatedFormat('d \d\e F \d\e Y, \à\s H:i')));
    }
    public static function formatOutTime($data)
    {
        $date = Carbon::parse($data)->locale('pt_PT');

        return str_replace("De ", "de ", ucwords($date->translatedFormat('d \d\e F \d\e Y')));
    }


    public static function addPercentage($result, $searchString)
    {
        $result = \Normalizer::normalize(mb_strtolower($result), \Normalizer::FORM_D);
        $searchString = \Normalizer::normalize(mb_strtolower($searchString), \Normalizer::FORM_D);

        $result = preg_replace('/[^a-z0-9\s]/', '', $result);
        $searchString = preg_replace('/[^a-z0-9\s]/', '', $searchString);

        $resultWords = explode(' ', $result);
        $searchWords = explode(' ', $searchString);

        $matches = array_intersect($resultWords, $searchWords);
        $percent = (count($matches) / count($resultWords)) * 100;

        if (count($matches) == 0) {
            $pattern = '/' . implode('.*', $resultWords) . '/';
            if (preg_match($pattern, $searchString)) {
                $percent = 100;
            }
        }

        return round($percent) . '%';
    }

    public static function toArray(): array
    {
        $array = [];
        $uniqueUsers = Supply::select('id_company')->distinct()->get();
        foreach ($uniqueUsers as $key => $value) {
            if (!array_key_exists($key, $array))
                array_push($array, $value->id_user);
        }
        return $array;
    }

    public static function formatarString($string)
    {
        // Normalizar a string para remover acentos
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        // Substituir espaços por hífens
        $stringFormatada = preg_replace('/\s+/', '-', $string);
        // Converter para minúsculas
        $stringFormatada = strtolower($stringFormatada);
        // Remover caracteres especiais, mantendo apenas letras, números e hífens
        $stringFormatada = preg_replace('/[^a-z0-9\-áéíóúãõâêîôûàèìòùäëïöüçñ]/', '', $stringFormatada);

        return $stringFormatada;
    }
}
