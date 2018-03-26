<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json='[{
  "new_id": 40,
  "tags": "Public Utilities"
}, {
  "new_id": 30,
  "tags": "Health Care"
}, {
  "new_id": 35,
  "tags": "Health Care"
}, {
  "new_id": 7,
  "tags": "Technology"
}, {
  "new_id": 39,
  "tags": "Technology"
}, {
  "new_id": 36,
  "tags": "Finance"
}, {
  "new_id": 7,
  "tags": "Consumer Services"
}, {
  "new_id": 8,
  "tags": "Transportation"
}, {
  "new_id": 12,
  "tags": "Public Utilities"
}, {
  "new_id": 30,
  "tags": "Public Utilities"
}, {
  "new_id": 33,
  "tags": "Public Utilities"
}, {
  "new_id": 11,
  "tags": "Consumer Durables"
}, {
  "new_id": 34,
  "tags": "Public Utilities"
}, {
  "new_id": 28,
  "tags": "Consumer Services"
}, {
  "new_id": 35,
  "tags": "Basic Industries"
}]';
        $tags=json_decode($json,1);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \App\Tag::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        DB::table('tags')->insert($tags);
    }
}
