<?php

namespace Database\Seeders;

use App\Country;
use App\GeographicalOriginLabel;
use App\Vineyard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeographicalOriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function run()
    {
        // Dodaj Hrvatsku u tabelu countries ako već nije dodana
        $croatia = Country::firstOrCreate(['name' => 'Hrvatska']);

        // Istra
        $istra = GeographicalOriginLabel::create([
            'region' => 'Istra',
            'subregion' => 'Istra',
            'country_id' => $croatia->id
        ]);

        $vineyardsIstra = [
            'Porečko vinogorje',
            'Buzetsko vinogorje',
            'Motovunsko vinogorje',
            'Višnjan-Pazinjština',
            'Umag-Novigrad vinogorje',
            'Poreština vinogorje',
            'Labinština vinogorje'
        ];

        foreach ($vineyardsIstra as $vineyard) {
            Vineyard::create([
                'name' => $vineyard,
                'geographical_origin_id' => $istra->id
            ]);
        }

        // Primorje i Kvarner
        $primorjeKvarner = GeographicalOriginLabel::create([
            'region' => 'Primorje i Kvarner',
            'subregion' => 'Primorje i Kvarner',
            'country_id' => $croatia->id
        ]);

        $vineyardsPrimorjeKvarner = [
            'Vinodol',
            'Krk',
            'Škrapi',
            'Opatija i Rijeka',
            'Gorski kotar',
            'Istok'
        ];

        foreach ($vineyardsPrimorjeKvarner as $vineyard) {
            Vineyard::create([
                'name' => $vineyard,
                'geographical_origin_id' => $primorjeKvarner->id
            ]);
        }

        // Sjeverna Dalmacija
        $sjevernaDalmacija = GeographicalOriginLabel::create([
            'region' => 'Sjeverna Dalmacija',
            'subregion' => 'Sjeverna Dalmacija',
            'country_id' => $croatia->id
        ]);

        $vineyardsSjevernaDalmacija = [
            'Zadar',
            'Šibenik',
            'Skradin',
            'Vrgorac',
            'Imotski',
            'Split',
            'Vis',
            'Hvar'
        ];

        foreach ($vineyardsSjevernaDalmacija as $vineyard) {
            Vineyard::create([
                'name' => $vineyard,
                'geographical_origin_id' => $sjevernaDalmacija->id
            ]);
        }

        // Srednja i Južna Dalmacija
        $srednjaJuznaDalmacija = GeographicalOriginLabel::create([
            'region' => 'Srednja i Južna Dalmacija',
            'subregion' => 'Srednja i Južna Dalmacija',
            'country_id' => $croatia->id
        ]);

        $vineyardsSrednjaJuznaDalmacija = [
            'Brač',
            'Korčula',
            'Lastovo',
            'Pelješac',
            'Neretva',
            'Dubrovnik'
        ];

        foreach ($vineyardsSrednjaJuznaDalmacija as $vineyard) {
            Vineyard::create([
                'name' => $vineyard,
                'geographical_origin_id' => $srednjaJuznaDalmacija->id
            ]);
        }

        // Slavonija i Baranja
        $slavonijaBaranja = GeographicalOriginLabel::create([
            'region' => 'Slavonija i Baranja',
            'subregion' => 'Slavonija i Baranja',
            'country_id' => $croatia->id
        ]);

        $vineyardsSlavonijaBaranja = [
            'Feričanci',
            'Kutjevo',
            'Đakovo',
            'Baranja',
            'Erdut'
        ];

        foreach ($vineyardsSlavonijaBaranja as $vineyard) {
            Vineyard::create([
                'name' => $vineyard,
                'geographical_origin_id' => $slavonijaBaranja->id
            ]);
        }

        // Kontinentalna Hrvatska
        $kontinentalnaHrvatska = GeographicalOriginLabel::create([
            'region' => 'Kontinentalna Hrvatska',
            'subregion' => 'Kontinentalna Hrvatska',
            'country_id' => $croatia->id
        ]);

        $vineyardsKontinentalnaHrvatska = [
            'Zagorje',
            'Prigorje',
            'Moslavina',
            'Podunavlje',
            'Pokuplje',
            'Bilogora',
            'Posavina'
        ];

        foreach ($vineyardsKontinentalnaHrvatska as $vineyard) {
            Vineyard::create([
                'name' => $vineyard,
                'geographical_origin_id' => $kontinentalnaHrvatska->id
            ]);
        }

        // Međimurje
        GeographicalOriginLabel::create([
            'region' => 'Međimursko vinogorje',
            'subregion' => 'Međimurje',
            'country_id' => $croatia->id
        ]);
    }
    }
