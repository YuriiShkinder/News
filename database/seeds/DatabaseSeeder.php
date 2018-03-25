<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles')->insert(  ['body'=>'#bec1c4']);
         $this->call(CategorysTableSeeder::class);

        $this->call(BlurdsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ComentsTableSeeder::class);

    }
}
