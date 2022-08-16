<?php

use App\Aspect;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class aspectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aspects = [
            "regulasi emosi",
            "self efficiacy",
            "optimis",
            "reaching out",
            "analisis kausal",
            "empati",
            "pengendalian impuls",
        ];
        $description = [
            "Mampu mengontrol emosi, atensi, dan perilaku, dan mampu tetap tenang dibawah kondisi yang menekan.",
            "Mampu mengendalikan keinginan, dorongan, kesukaan, dan tekanan yang muncul dari dalam diri.",
            "Memandang masalah secara positif, berpikir optimis.",
            "Keyakinan akan kemampuan dalam memecahkan masalah.",
            "Mampu mengidentifikasi penyebab permasalahan yang dihadapi.",
            "Mampu menempatkan diri pada posisi orang lain, ikut merasakan apa yang dirasakan oleh orang lain.",
            "Berani mengatasi ketakutan-ketakutan yang mengancam, mampu mengambil hikmah dari permasalahan yang menimpa."
        ];
        $qoutes = [
            "Langkah pertama adalah menerima diri sendiri. Dan menerima itu sulit. Bahkan saya pun masih dalam proses untuk menerima diri saya sendiri.",
            "Jangan biarkan seseorang menghentikanmu atau mempermalukanmu hanya karena kamu menjadi diri sendiri.",
            "Saya sangat bangga dengan kalian semua. Karena hidup datang begitu cepat, dan terkadang bisa sangat sulit, tetapi jika aku bisa, aku tahu kamu pasti bisa.",
            "Saya tidak berpikir bahwa mencintai diri sendiri adalah sebuah pilihan. Itu adalah sebuah keputusan yang harus dibuat untuk bertahan hidup.",
            "Jika kamu bisa mencintai saya, artinya kamu juga bisa mencintai dirimu sendiri, setiap harinya.",
            "Mengakui kerentanan adalah salah satu bentuk kekuatan, dan membuat pilihan untuk menjalani terapi adalah salah satu bentuk kekuatan.",
            "Kamu pantas untuk merasa baik-baik saja."
        ];
        foreach ($aspects as $key => $aspect) {
            Aspect::create([
                'aspect' => $aspect,
                'descriptions' => $description[$key],
                'quote' => $qoutes[$key],
            ]);
        }
    }
}
