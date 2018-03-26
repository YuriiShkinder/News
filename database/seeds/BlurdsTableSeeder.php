<?php

use Illuminate\Database\Seeder;

class BlurdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json='[{
  "title": "Darby\'s Rangers",
  "price": 39,
  "firm": "Oba"
}, {
  "title": "Comanche Station",
  "price": 13,
  "firm": "Pixoboo"
}, {
  "title": "Captivity",
  "price": 79,
  "firm": "Fivechat"
}, {
  "title": "Under Fire",
  "price": 29,
  "firm": "Fivebridge"
}, {
  "title": "Brainstorm (Bicho de Sete Cabeças)",
  "price": 64,
  "firm": "Voonte"
}, {
  "title": "Inglourious Basterds",
  "price": 25,
  "firm": "Myworks"
}, {
  "title": "Chasing Sleep",
  "price": 63,
  "firm": "Skippad"
}, {
  "title": "Wicker Man, The",
  "price": 49,
  "firm": "Thoughtblab"
}, {
  "title": "Sushi Girl",
  "price": 39,
  "firm": "Katz"
}, {
  "title": "Lilian\'s Story",
  "price": 26,
  "firm": "Yamia"
}, {
  "title": "Eddie and the Cruisers II: Eddie Lives!",
  "price": 23,
  "firm": "Edgeify"
}, {
  "title": "Three Stooges, The",
  "price": 67,
  "firm": "Babblestorm"
}, {
  "title": "Bowery at Midnight",
  "price": 8,
  "firm": "Realbuzz"
}, {
  "title": "Chained Heat",
  "price": 23,
  "firm": "Tagopia"
}, {
  "title": "Fern flowers (Fleur de fougère)",
  "price": 78,
  "firm": "Wikido"
}]';
        $blurds=json_decode($json,true);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \App\Blurd::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        DB::table('blurds')->insert($blurds);
    }
}
