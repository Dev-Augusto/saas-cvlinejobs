<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Partner;
use App\Models\Slide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slide = [
            "title" => "Crie um Currículo Profissional em 3 Minutos",
            "image" => "bg-04.jpg",
            "button" => "Entrar Na Plataforma",
            "description" => "Tenha acesso a modelos de CV prontos, edite com facilidade e mantenha seus currículos organizados em um só lugar.
            Ideal para quem quer criar currículos modernos, rápidos e prontos para impressão ou envio.
            "
        ];
        Slide::create($slide);

        $about = [
            "title" => "Sobre Nós",
            "image" => "cvlinejobs.png",
            "description" => '<p class="text-justify" aria-label="currículo vitae">Na nossa plataforma, acreditamos que um bom currículo abre portas. Por isso, criámos uma solução simples, acessível e eficiente para qualquer pessoa que deseje criar um Currículo Vitae profissional, mesmo sem experiência técnica.</p>
                <p class="text-justify">Com modelos modernos e um editor fácil de usar, ajudamos milhares de usuários a construírem o seu CV de forma rápida, personalizada e com aparência profissional. Seja para imprimir, enviar por e-mail ou guardar em PDF, o seu currículo estará sempre ao seu alcance, online.</p>
                <p class="text-justify">Nosso compromisso é oferecer uma ferramenta intuitiva, confiável e sempre atualizada, que permita a qualquer pessoa apresentar suas competências com clareza e impacto.</p>'
        ];
        About::create($about);

        for ($i=1; $i <= 4 ; $i++) { 
            Partner::create([
                "name" => "CVLineJobs",
                "image" => "screenshot".$i.".jpg",
                "link" => "https://www.facebook.com/profile.php?id=100082862454759",
                "description" => "Nosso compromisso é oferecer uma ferramenta intuitiva, confiável e sempre atualizada, que permita a qualquer pessoa apresentar suas competências com clareza e impacto."
            ]);
        }
    }
}
