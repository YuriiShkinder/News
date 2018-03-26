<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json='[{
  "name": "Lalo",
  "email": "lbourgour0@mapquest.com",
  "password": "2g31w1ulRX11"
}, {
  "name": "Mallory",
  "email": "msummons1@yellowpages.com",
  "password": "52u2Vu0m"
}, {
  "name": "Debbi",
  "email": "ddangerfield2@so-net.ne.jp",
  "password": "hutsHthv"
}, {
  "name": "Zea",
  "email": "zswanger3@nifty.com",
  "password": "CkuX7A4Op"
}, {
  "name": "Gilberte",
  "email": "gpearsey4@xinhuanet.com",
  "password": "rDPdqZcQdgU"
}, {
  "name": "Jeramie",
  "email": "jbeake5@spotify.com",
  "password": "QEO93AG"
}, {
  "name": "Oby",
  "email": "opalke6@java.com",
  "password": "7fQy0TeB3k"
}, {
  "name": "Eugine",
  "email": "esawl7@blogtalkradio.com",
  "password": "xJvZxcWCy"
}, {
  "name": "Jeniffer",
  "email": "jverbeek8@netlog.com",
  "password": "pdn3Cm3WSYm"
}, {
  "name": "Reggie",
  "email": "rtupling9@delicious.com",
  "password": "e5bfUg"
}, {
  "name": "Cris",
  "email": "ccobaina@digg.com",
  "password": "4EyeyGG9"
}, {
  "name": "Cy",
  "email": "csirettb@sphinn.com",
  "password": "dFI1jvvnccEV"
}, {
  "name": "Zollie",
  "email": "zrudyardc@sciencedirect.com",
  "password": "wJLkmt9N"
}, {
  "name": "Celia",
  "email": "cfellowsd@imageshack.us",
  "password": "weFydfqaStIV"
}, {
  "name": "Edeline",
  "email": "emenslere@discuz.net",
  "password": "6agNULzu"
}]';

        $arr=json_decode($json,true);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \App\User::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert([
            'name'=>'admin',
            'role'=>'admin',
            'email'=>'test@gmail.com',
            'password'=>'123456'
        ]);
        DB::table('users')->insert($arr);
    }
}
