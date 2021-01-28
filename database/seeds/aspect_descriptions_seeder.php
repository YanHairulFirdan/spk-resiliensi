<?php

use App\Aspect;
use Illuminate\Database\Seeder;

class aspect_descriptions_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrs = [
            "Mampu mengontrol emosi, atensi, dan perilaku, dan mampu tetap tenang dibawah kondisi yang menekan.",
            "Mampu mengendalikan keinginan, dorongan, kesukaan, dan tekanan yang muncul dari dalam diri.",
            "Memandang masalah secara positif, berpikir optimis.",
            "Keyakinan akan kemampuan dalam memecahkan masalah.",
            "Mampu mengidentifikasi penyebab permasalahan yang dihadapi.",
            "Mampu menempatkan diri pada posisi orang lain, ikut merasakan apa yang dirasakan oleh orang lain.",
            "Berani mengatasi ketakutan-ketakutan yang mengancam, mampu mengambil hikmah dari permasalahan yang menimpa."
        ];
        $aspects = Aspect::get();
        foreach ($aspects as $key => $aspect) {
            $aspect->descriptions = $arrs[$key];
            $aspect->save();
        }
    }
}
