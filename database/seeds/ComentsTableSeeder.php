<?php

use Illuminate\Database\Seeder;

class ComentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json='[{
  "new_id": 14,
  "user_id": 3,
  "text": "sed magna at nunc commodo placerat praesent blandit nam nulla integer pede"
}, {
  "new_id": 1,
  "user_id": 15,
  "text": "cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus"
}, {
  "new_id": 38,
  "user_id": 15,
  "text": "nunc rhoncus dui vel sem sed sagittis nam congue risus semper porta volutpat quam pede lobortis ligula sit"
}, {
  "new_id": 10,
  "user_id": 4,
  "text": "eget tempus vel pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed"
}, {
  "new_id": 17,
  "user_id": 15,
  "text": "sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris laoreet ut"
}, {
  "new_id": 27,
  "user_id": 10,
  "text": "felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis"
}, {
  "new_id": 5,
  "user_id": 10,
  "text": "rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo"
}, {
  "new_id": 29,
  "user_id": 15,
  "text": "aliquam non mauris morbi non lectus aliquam sit amet diam"
}, {
  "new_id": 35,
  "user_id": 12,
  "text": "nonummy maecenas tincidunt lacus at velit vivamus vel nulla eget eros elementum pellentesque quisque"
}, {
  "new_id": 39,
  "user_id": 11,
  "text": "ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices"
}, {
  "new_id": 20,
  "user_id": 4,
  "text": "bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus"
}, {
  "new_id": 2,
  "user_id": 1,
  "text": "volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus"
}, {
  "new_id": 13,
  "user_id": 1,
  "text": "tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero"
}, {
  "new_id": 33,
  "user_id": 7,
  "text": "maecenas tincidunt lacus at velit vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat erat"
}, {
  "new_id": 29,
  "user_id": 8,
  "text": "pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra magna ac consequat"
}, {
  "new_id": 35,
  "user_id": 10,
  "text": "ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis"
}, {
  "new_id": 27,
  "user_id": 11,
  "text": "platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut"
}, {
  "new_id": 9,
  "user_id": 9,
  "text": "nulla sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula"
}, {
  "new_id": 29,
  "user_id": 5,
  "text": "in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis"
}, {
  "new_id": 15,
  "user_id": 9,
  "text": "vel nulla eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget congue eget"
}, {
  "new_id": 12,
  "user_id": 13,
  "text": "amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices"
}, {
  "new_id": 14,
  "user_id": 7,
  "text": "non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris"
}, {
  "new_id": 1,
  "user_id": 12,
  "text": "ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer ac"
}, {
  "new_id": 12,
  "user_id": 7,
  "text": "eu sapien cursus vestibulum proin eu mi nulla ac enim in tempor turpis nec"
}, {
  "new_id": 30,
  "user_id": 8,
  "text": "justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo"
}, {
  "new_id": 40,
  "user_id": 9,
  "text": "lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu mi nulla"
}, {
  "new_id": 32,
  "user_id": 2,
  "text": "est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique"
}, {
  "new_id": 34,
  "user_id": 6,
  "text": "vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien"
}, {
  "new_id": 7,
  "user_id": 13,
  "text": "tellus in sagittis dui vel nisl duis ac nibh fusce"
}, {
  "new_id": 37,
  "user_id": 11,
  "text": "primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio"
}, {
  "new_id": 10,
  "user_id": 14,
  "text": "malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim"
}, {
  "new_id": 24,
  "user_id": 3,
  "text": "tellus nulla ut erat id mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate"
}, {
  "new_id": 28,
  "user_id": 4,
  "text": "eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum"
}, {
  "new_id": 32,
  "user_id": 9,
  "text": "sed tincidunt eu felis fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed"
}, {
  "new_id": 19,
  "user_id": 6,
  "text": "erat id mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt"
}, {
  "new_id": 21,
  "user_id": 15,
  "text": "vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur"
}, {
  "new_id": 36,
  "user_id": 10,
  "text": "at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam"
}, {
  "new_id": 39,
  "user_id": 7,
  "text": "amet eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla suspendisse"
}, {
  "new_id": 2,
  "user_id": 10,
  "text": "ut erat curabitur gravida nisi at nibh in hac habitasse"
}, {
  "new_id": 39,
  "user_id": 9,
  "text": "cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus"
}, {
  "new_id": 15,
  "user_id": 7,
  "text": "eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio"
}, {
  "new_id": 25,
  "user_id": 4,
  "text": "platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec"
}, {
  "new_id": 36,
  "user_id": 14,
  "text": "a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium"
}, {
  "new_id": 1,
  "user_id": 3,
  "text": "orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras"
}, {
  "new_id": 37,
  "user_id": 6,
  "text": "lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique"
}, {
  "new_id": 29,
  "user_id": 3,
  "text": "aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam"
}, {
  "new_id": 7,
  "user_id": 5,
  "text": "rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat"
}, {
  "new_id": 24,
  "user_id": 6,
  "text": "curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus sit amet nulla quisque arcu libero rutrum ac lobortis vel"
}, {
  "new_id": 38,
  "user_id": 9,
  "text": "dapibus duis at velit eu est congue elementum in hac habitasse"
}, {
  "new_id": 40,
  "user_id": 2,
  "text": "interdum venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu est"
}]';

        $arr=json_decode($json,1);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \App\Coment::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('coments')->insert($arr);
    }
}
