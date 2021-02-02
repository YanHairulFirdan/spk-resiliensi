<?php

use App\Tip;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tips = [
            [
                [
                    'tip' => "Mengontrol emosi",
                    "type" => "todo"
                ],
                [
                    'tip' => "Mengontrol atensi",
                    "type" => "todo"
                ],
                [
                    'tip' => "Mengontrol perilaku mereka",
                    "type" => "todo"
                ],
                [
                    'tip' => "Belajar mengungkapkan perasaan",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar mengendalikan dorongan hati",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar memahami perbedaan antara perasaan dan tindakan",
                    "type" => "suggestion"
                ],
            ],
            [
                [
                    'tip' => "Perilaku sabar",
                    "type" => "todo"
                ],
                [
                    'tip' => "Tidak impulsive",
                    "type" => "todo"
                ],
                [
                    'tip' => "Tidak berlaku agresif ",
                    "type" => "todo"
                ],
                [
                    'tip' => "Membuat orang disekitarnya merasa nyaman",
                    "type" => "todo"
                ],
                [
                    'tip' => "Belajar memahami sudut pandang orang lain",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar mempelajari keterampilan komunikasi verbal dan nonverbal",
                    "type" => "suggestion"
                ]
            ],
            [
                [
                    'tip' => "Kemampuan mengatasi kesulitan yang mungkin terjadi di masa depan",
                    "type" => "todo"
                ],
                [
                    'tip' => "Belajar mengelola perasaan",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar mengembangkan tanggung jawab pribadi",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar mengembangkan keterampilan berperilaku sopan dan santun",
                    "type" => "suggestion"
                ],
            ],
            [
                [
                    'tip' => "Memecahkan masalah yang dialami dan mencapai kesuksesan",
                    "type" => "todo"
                ],
                [
                    'tip' => "Belajar menerima diri sendiri",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar menyelesaikan konflik",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar membuka diri dan memahami diri sendiri",
                    "type" => "suggestion"
                ],
            ],
            [
                [
                    'tip' => "Mengidentifikasikan penyebab dari permasalahan yang mereka hadapi secara tepat",
                    "type" => "todo"
                ],
                [
                    'tip' => "Belajar menggunakan langkah-langkah penyelesaian masalah",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar mengambil keputusan pribadi",
                    "type" => "suggestion"
                ],
            ],
            [
                [
                    'tip' => "Membaca isyarat non verbal orang lain",
                    "type" => "todo"
                ],
                [
                    'tip' => "Membangun hubungan yang lebih dalam dengan orang lain",
                    "type" => "todo"
                ],
                [
                    'tip' => "Mengembangkan kemampuan emosional lebih cocok",
                    "type" => "todo"
                ],
                [
                    'tip' => "Merasakan apa yang dirasakan orang lain",
                    "type" => "todo"
                ],
                [
                    'tip' => "Memperkirakan maksud dari orang lain",
                    "type" => "todo"
                ],
                [
                    'tip' => "Belajar berkomunikasi",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar mengambil keputusan pribadi",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar membaca dan menafsirkan isyarat-isyarat sosial",
                    "type" => "suggestion"
                ],
            ],
            [
                [
                    'tip' => "Meningkatkan aspek-aspek yang positif dalam kehidupan",
                    "type" => "todo"
                ],
                [
                    'tip' => "Mencakup pula keberanian untuk mengatasi segala ketakutan-ketakutan yang mengancam dalam kehidupannya",
                    "type" => "todo"
                ],
                [
                    'tip' => "Belajar mengembangkan ketegasan",
                    "type" => "suggestion"
                ],
                [
                    'tip' => "Belajar menangani stress dan belajar bersikap positif terhadap kehidupan",
                    "type" => "suggestion"
                ]
            ],
        ];

        foreach ($tips as $key => $tip) {
            foreach ($tip as $keys => $item) {
                Tip::create([
                    'aspect_id' => $key + 1,
                    'tips' => $item['tip'],
                    'tipe' => $item['type'],
                ]);
            }
        }
    }
}
