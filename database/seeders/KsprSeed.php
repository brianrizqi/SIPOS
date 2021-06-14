<?php

namespace Database\Seeders;

use App\Models\Kspr;
use Illuminate\Database\Seeder;

class KsprSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number = ['1', '2a', '2b', '3', '4', '5', '6', '7', '8', '9', '9a', '9b', '9c', '10',
            '11', '11a', '11b', '11c', '11d', '11e', '11f', '12', '13', '14', '15', '16',
            '17', '18', '19', '20'];
        $factor = ['Terlalu muda hamil < 16 tahun', 'Terlalu lambat hamil 1, kawin > 4 tahun',
            'Terlalu tua, hamil 1 > 35 tahun', 'Terlalu cepat hamil lagi (<2 tahun)',
            'Terlalu lama hamil lagi (>10 tahun)', 'Terlalu banyak anak, 4/lebih',
            'Terlalu tua, umur >35 tahun', 'Terlalu pendek <145 cm',
            'Pernah gagal kehamilan', 'Pernah melahirkan dengan',
            'Tarikan tang / vakum', 'Uri dirogoh',
            'Diberi infus / transfusi', 'Pernah operasi sesar',
            'Penyakit pada ibu hamil', 'Kurang darah',
            'Malaria', 'TBC Paru',
            'Payah jantung', 'Kencing manis (Diabetes)',
            'Penyakit menular seksual', 'Bengkak pada muka / tungkai dan tekanan darah tinggi',
            'Hamil kembar 2 atau lebih', 'Hamil kembar air (hydraminon)',
            'Bayi mati dalam kandungan', 'Kehamilan lebih bulan',
            'Letak sungsang', 'Letak lintang', 'Pendarahan dalam kehamilan ini',
            'Pre-eklampsia berat / kejang-kejang'
        ];
        $score = [4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 4, 4, 4, 8, 0, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 8, 8, 8, 8];
        $group = ['I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I',
            'II', 'II', 'II', 'II', 'II', 'II', 'II', 'II', 'II', 'II', 'II', 'II', 'II', 'II',
            'III', 'III'];
        foreach ($number as $i => $item) {
            Kspr::create([
                'number' => $item,
                'factor' => $factor[$i],
                'score' => $score[$i],
                'group_factor' => $group[$i]
            ]);
        }
    }
}
