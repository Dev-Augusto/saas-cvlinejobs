<?php

namespace App\Helpers;

use App\Models\Admin\CV\Curriculo;
use Spatie\Browsershot\Browsershot;
use App\Models\EvidenceFiles;
use App\Models\Modules;
use App\Models\MonitoramentoActividade;
use App\Models\Blacklist;
use App\Models\Supply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PHPUnit\TextUI\Output\NullPrinter;

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
        //$verify = Modules::verifyModule($module);
        $verify = true;
        if (!$verify == false) {
            return redirect()->back()->with('error', "Erro");
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

    // MONTAGEM DE DADOS
    public static function dataConstruct(array &$data, $cv, $id=null)
    {
        if (isset($cv['foto_perfil_temp']) && !empty($cv['foto_perfil_temp'])) {
            $extensao = pathinfo($cv['foto_perfil_temp'], PATHINFO_EXTENSION);
            $nomeImagem = 'cv-' . self::formatarString($cv['nome'] . $cv['telefone']) . '.' . $extensao;
            $caminhoDestino = 'adm/img/cv-images/' . $nomeImagem;
            Storage::disk('public')->move($cv['foto_perfil_temp'], $caminhoDestino);
            $cv['foto_perfil'] = $nomeImagem;
        }
        $data['curriculo'] = [
            "name" => $cv['nome'],
            "document" => $cv['documento'] ?? null,
            "born" => $cv['data_nascimento'],
            "gender" => $cv['genero'],
            "email" => $cv['email'] ?? null,
            "address" => $cv['endereco'],
            "telephone" => $cv['telefone'],
            "profitional_profile" => $cv['perfil_profissional'],
            "grade" => $cv['classe'],
            "course" => $cv['curso'] ?? null,
            "institute" => $cv['instituicao'],
            "year_start" => $cv['inicio_formacao'],
            "year_end" => $cv['fim_formacao'],
            "image" => $cv['foto_perfil'] ?? null,
            "templante_number" => $id ?? null,
            "lang" => $cv['idioma_cv'],
            "experiences" => [],
            "skills" => [],
            "languages" => [],
        ];

        if (!empty($cv['experiencias']) && is_array($cv['experiencias'])) {
            foreach ($cv['experiencias'] as $exp) {
                $data['curriculo']['experiences'][] = [
                    'company' => $exp['empresa'] ?? '',
                    'area' => $exp['cargo'] ?? '',
                    'start_year' => $exp['inicio'] ?? '',
                    'end_year' => $exp['fim'] ?? '',
                    'description' => $exp['descricao'] ?? '',
                ];
            }
        }

        // SKILLS
        if (!empty($cv['habilidades']) && is_array($cv['habilidades'])) {
            foreach ($cv['habilidades'] as $skill) {
                $data['curriculo']['skills'][] = ['name'=>$skill];
            }
        }

        // LANGUAGES
        if (!empty($cv['idiomas']) && is_array($cv['idiomas'])) {
            foreach ($cv['idiomas'] as $lang) {
                $data['curriculo']['languages'][] = [
                    'name' => $lang['nome'] ?? '',
                    'level' => $lang['nivel'] ?? '',
                ];
            }
        }
    }

    // MONTAGEM DE DADOS PARA A VIEW DOS CV
    public static function dataConstructCV(array &$data, Curriculo $cv)
    {
        $data['curriculo'] = [
            "nome" => $cv->name,
            "documento" => $cv->document ?? null,
            "data_nascimento" => $cv->born,
            "genero" => $cv->gender,
            "email" => $cv->email ?? null,
            "endereco" => $cv->address,
            "telefone" => $cv->telephone,
            "perfil_profissional" => $cv->profitional_profile,
            "classe" => $cv->grade,
            "curso" => $cv->course ?? null,
            "instituicao" => $cv->institute,
            "inicio_formacao" => $cv->year_start,
            "fim_formacao" => $cv->year_end,
            "foto_perfil" => $cv->image ?? null,
            "templante_number" => $cv->templante_number ?? null,
            "idioma_cv" => $cv->lang,
            "experiencias" => [],
            "habilidades" => [],
            "idiomas" => [],
        ];

            $data['curriculo']['experiencias'] = $cv->experiencies->map(function ($exp) {
                return [
                    'empresa' => $exp->company,
                    'cargo' => $exp->area,
                    'inicio' => $exp->start_year,
                    'fim' => $exp->end_year,
                    'descricao' => $exp->description,
                ];
            })->toArray();

            // SKILLS
            $data['curriculo']['habilidades'] = $cv->habilities->pluck('name')->toArray();
            // LANGUAGES
            $data['curriculo']['idiomas'] = $cv->languages->map(function ($lang) {
                return [
                    'nome' => $lang->name,
                    'nivel' => $lang->level,
                ];
            })->toArray();

    }

    public static function screenShot(string $language, int $id, $data)
    {
        $curriculo = Curriculo::with(['experiencies', 'habilities', 'languages'])->findOrFail($data->id);
        $curri = [];
        Helper::dataConstructCV($curri, $curriculo);
        $cv = $curri['curriculo'];
        if($language == "Português"){
            $html = view("admin.pages.cv.models.portuguese.models-".($id >= 10 ? $id : "0".$id ), compact('cv'))->render();
        }elseif($language == "Inglês"){
            $html = view("admin.pages.cv.models.englesh.models-".($id >= 10 ? $id : "0".$id ), compact('cv'))->render();
        }elseif($language == "Espanhol"){
            $html = view("admin.pages.cv.models.spain.models-".($id >= 10 ? $id : "0".$id ), compact('cv'))->render();
        }
        // Caminho de saída para a imagem
        $path = storage_path('app/public/screenshots/cv_' . $data->id . '.png');

        // Cria o diretório, se não existir
        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }
        // Gera imagem com BrowserShot
        Browsershot::html($html)
            ->setOption('args', ['--no-sandbox'])
            ->windowSize(1240, 1754)
            ->waitUntilNetworkIdle()
            ->save($path);

        return response()->download($path);
    }
}

