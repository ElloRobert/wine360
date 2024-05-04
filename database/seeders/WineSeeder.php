<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Color;
use App\Variety;

class WineSeeder extends Seeder
{
    public function run()
    {
        // Stvori bijelu boju
        $whiteColor = Color::create([
            'name' => 'White',
            'code' => '#FFFFFF'
        ]);

        // Stvori crnu boju
        $blackColor = Color::create([
            'name' => 'Black',
            'code' => '#000000'
        ]);

        // Ubaci bijela vina
        $whiteWines = [
            'Malvazija Istarska',
            'Grk',
            'Pošip',
            'Graševina',
            'Debit',
            'Bijeli Pinot',
            'Žlahtina',
            'Kraljevina',
            'Chardonnay',
            'Rukatac',
            'Sauvignon Blanc',
            'Muscat Ottonel',
            'Traminac',
            'Riesling',
            'Sauvignon Gris',
            'Sauvignon Vert',
            'Pinot bijeli',
            'Pinot sivi (Pinot Gris)',
            'Muskat žuti (Moscato Giallo)',
            'Viognier'
        ];

        foreach ($whiteWines as $whiteWine) {
            Variety::create([
                'name' => $whiteWine,
                'color_id' => $whiteColor->id
            ]);
        }

        // Ubaci crna vina
        $blackWines = [
            'Plavac Mali',
            'Babić',
            'Teran',
            'Merlot',
            'Syrah',
            'Cabernet Sauvignon',
            'Frankovka',
            'Plavina',
            'Crljenak Kaštelanski (Zinfandel)',
            'Cabernet Franc',
            'Refošk',
            'Zweigelt',
            'Barbera',
            'Vranac',
            'Gamay',
            'Pinot crni',
            'Portugizac (Blauer Portugieser)',
            'Sivi Pinot (Pinot Gris)',
            'Blaufraenkisch',
            'Pinot Noir'
        ];

        foreach ($blackWines as $blackWine) {
            Variety::create([
                'name' => $blackWine,
                'color_id' => $blackColor->id
            ]);
        }
    }
}
