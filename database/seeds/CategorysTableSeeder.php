
<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json='[ {
  "categorys": "Technology"
}, {
  "categorys": "Consumer Durables"
},{
  "categorys": "Public Utilities"
},  {
  "categorys": "Capital Goods"
}, {
  "categorys": "Energy"
}, {
  "categorys": "Basic Industries"
}, {
  "categorys": "Health Care"
}, {
  "categorys": "Finance"
}]';
        $arr=json_decode($json,true);
        array_push($arr,[
            'categorys'=>'politics'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Category::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('categorys')->insert($arr);


    }
}
