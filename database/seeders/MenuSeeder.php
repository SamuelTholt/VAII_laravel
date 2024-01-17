<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Polievky
        DB::table('jedla')->insert([
            'jedlo_id' => 1,
            'kategoria_id' => 1,
            'nazov' => 'Slepačí vývar s cestovinou',
            'popis' => 'Výnimočný slepačí vývar s cestovinou, vytvorený pre okamžitú pohodu. Teplá nádišná chuť v každej lyžičke.',
            'alergeny' => '1, 2, 5',
            'cena' => 1.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 2,
            'kategoria_id' => 1,
            'nazov' => 'Brokolicový krém s krutónmi',
            'popis' => 'Hladký brokolicový krém s chrumkavými krutónmi, pre vychutnanie chuti a jednoduchosť v každom polievkovom hrnčeku.',
            'alergeny' => '2, 5',
            'cena' => 2.00,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 3,
            'kategoria_id' => 1,
            'nazov' => 'Fazuľová s údeným mäsom, chlieb',
            'popis' => 'Tradičná fazuľová polievka s údeným mäsom a čerstvým chlebom, ponúkajúca skutočnú chuť domácej kuchyne.',
            'alergeny' => '1, 2, 5',
            'cena' => 2.00,
        ]);

        //hlavné jedla
        DB::table('jedla')->insert([
            'jedlo_id' => 4,
            'kategoria_id' => 2,
            'nazov' => 'Pečené kurča s maslovou omáčkou a pečenými zemiakmi',
            'popis' => 'Výborne pečené kúsky kurča zaliate lahodnou maslovou omáčkou, doplnené o zlatohnedé pečené zemiaky. Jednoducho dokonalé spojenie chuti a textúry.',
            'alergeny' => '2, 6',
            'cena' => 12.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 5,
            'kategoria_id' => 2,
            'nazov' => 'Losos na žltej šošovici s čerstvým špenátom',
            'popis' => 'Grilovaný losos položený na posteli žltej šošovice a čerstvého špenátu. Lehké a zdravé jedlo plné esenciálnych živín.',
            'alergeny' => '4, 5, 8',
            'cena' => 16.00,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 6,
            'kategoria_id' => 2,
            'nazov' => 'Hovädzia stroganov s dusenou ryžou',
            'popis' => 'Klasický hovädzí stroganov v bohatej smotanovej omáčke, podávaný s lahodnou dusenou ryžou. Bohatá na chuť, bohatá na spokojnosť.',
            'alergeny' => '2, 6, 8',
            'cena' => 18.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 7,
            'kategoria_id' => 2,
            'nazov' => 'Vegetariánske lasagne s čerstvým šalátom',
            'popis' => 'Vrstvy špeciálnej vegetariánskej lasagne, plnené čerstvými zeleninami a parmazánom, doplnené osviežujúcim čerstvým šalátom.',
            'alergeny' => '1, 2, 5, 6',
            'cena' => 14.00,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 8,
            'kategoria_id' => 2,
            'nazov' => 'Kuracie kari s basmati ryžou',
            'popis' => 'Kúsky kurča v aromatickej kari omáčke, podávané s lahodnou basmati ryžou. Výlet do exotických chutí.',
            'alergeny' => '6, 8',
            'cena' => 15.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 9,
            'kategoria_id' => 2,
            'nazov' => 'Grilované jahňacie kotlety s pečeným zemiakovým pyré',
            'popis' => 'Grilované jahňacie kotlety so štipkou harissky, doplnené o hladké zemiakové pyré. Luxusná voľba pre gurmánov.',
            'alergeny' => '6',
            'cena' => 22.00,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 10,
            'kategoria_id' => 2,
            'nazov' => 'Ravioli s ricottou a špenátom v paradajkovom pesto',
            'popis' => 'Plnené ravioli s ricottou a špenátom, zaliahané v lahodnom paradajkovom pestu. Jednoduché, no bohato chutné.',
            'alergeny' => '1, 2, 5',
            'cena' => 13.00,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 11,
            'kategoria_id' => 2,
            'nazov' => 'Gnocchi s pestom a cherry paradajkami',
            'popis' => 'Gnocchi, mäkké zemiakové knedľučky, podávané s čerstvým pestom a sladkými cherry paradajkami. Jednoduché, ale ohromujúco chutné.',
            'alergeny' => '1, 2, 5',
            'cena' => 14.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 12,
            'kategoria_id' => 2,
            'nazov' => 'Kuskusový šalát s grilovaným kurčaťom a zeleninou',
            'popis' => 'Ľahký a osviežujúci kuskusový šalát s grilovaným kurčaťom a farebnou zeleninou. Ideálny pre tých, čo hľadajú zdravú alternatívu.',
            'alergeny' => '6',
            'cena' => 16.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 13,
            'kategoria_id' => 2,
            'nazov' => 'Ovocné kari s krevetami a kokosovým mliekom',
            'popis' => 'Exotické ovocné kari s plátkami kreviet a krémovým kokosovým mliekom. Kombinácia sladkých a korenistých chutí.',
            'alergeny' => '4, 6, 8',
            'cena' => 19.00,
        ]);

        // Prílohy
        DB::table('jedla')->insert([
            'jedlo_id' => 14,
            'kategoria_id' => 3,
            'nazov' => 'Hrnček polievky',
            'popis' => 'Malý hrníček polievky ako dokonalý spoločník k prvému jedlu.',
            'alergeny' => '',
            'cena' => 0.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 15,
            'kategoria_id' => 3,
            'nazov' => 'Čerstvé pečivo s maslom',
            'popis' => 'Kus čerstvého pečiva so škvrnou masla, ktoré doplní váš chuťový zážitok.',
            'alergeny' => '',
            'cena' => 0.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 16,
            'kategoria_id' => 3,
            'nazov' => 'Šalátový mix',
            'popis' => 'Čerstvý zeleninový šalátový mix s lahodným dresingom.',
            'alergeny' => '',
            'cena' => 0.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 17,
            'kategoria_id' => 3,
            'nazov' => 'Opečené zemiaky',
            'popis' => 'Klasické opečené zemiaky, ktoré doplnia vaše hlavné jedlo.',
            'alergeny' => '',
            'cena' => 0.50,
        ]);

        DB::table('jedla')->insert([
            'jedlo_id' => 18,
            'kategoria_id' => 3,
            'nazov' => 'Ryžová príloha',
            'popis' => 'Lahodná ryžová príloha, ktorá perfektne dopĺňa korenené jedlá.',
            'alergeny' => '',
            'cena' => 0.50,
        ]);


    }
}
