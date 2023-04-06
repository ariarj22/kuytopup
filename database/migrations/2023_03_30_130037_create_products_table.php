<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('game_id')->constrained('games')->onUpdate('cascade')->onDelete('cascade');
            $table->string('type');
            $table->string('image_url');
            $table->integer('price');
            $table->timestamps();
        });

        DB::table('products')->insert([
            //Apex
            ['game_id' => '1', 'type' => '90 Coins', 'image_url' => 'assets/img/Logo/apexcoin.png', 'price' => '16000'],
            ['game_id' => '1', 'type' => '280 Coins', 'image_url' => 'assets/img/Logo/apexcoin.png', 'price' => '34000'],
            ['game_id' => '1', 'type' => '500 (465 + 35) Coins', 'image_url' => 'assets/img/Logo/apexcoin.png', 'price' => '64000'],
            ['game_id' => '1', 'type' => '1050 (935 + 115) Coins', 'image_url' => 'assets/img/Logo/apexcoin.png', 'price' => '125000'],
            ['game_id' => '1', 'type' => '2150 (1870 + 280) Coins', 'image_url' => 'assets/img/Logo/apexcoin.png', 'price' => '250000'],
            ['game_id' => '1', 'type' => '5650 (4680 + 970) Coins', 'image_url' => 'assets/img/Logo/apexcoin.png', 'price' => '610000'],
            ['game_id' => '1', 'type' => '11500 (9365 + 2135) Coins', 'image_url' => 'assets/img/Logo/apexcoin.png', 'price' => '1200000'],
            ['game_id' => '1', 'type' => '23500 (18730 + 4770) Coins', 'image_url' => 'assets/img/Logo/apexcoin.png', 'price' => '2400000'],

            //Genshin
            ['game_id' => '2', 'type' => 'Blessing of The Welkin Moon', 'image_url' => 'assets/img/Logo/genshin.png', 'price' => '75000'],
            ['game_id' => '2', 'type' => '60 Genesis Crystal', 'image_url' => 'assets/img/Logo/genshin.png', 'price' => '15000'],
            ['game_id' => '2', 'type' => '330 + 30 Genesis Crystal', 'image_url' => 'assets/img/Logo/genshin.png', 'price' => '75000'],
            ['game_id' => '2', 'type' => '980 + 110 Genesis Crystal', 'image_url' => 'assets/img/Logo/genshin.png', 'price' => '225000'],
            ['game_id' => '2', 'type' => '1980 + 260 Genesis Crystal', 'image_url' => 'assets/img/Logo/genshin.png', 'price' => '450000'],
            ['game_id' => '2', 'type' => '3280 + 600 Genesis Crystal', 'image_url' => 'assets/img/Logo/genshin.png', 'price' => '720000'],
            ['game_id' => '2', 'type' => '6480 + 1600 Genesis Crystal', 'image_url' => 'assets/img/Logo/genshin.png', 'price' => '1450000'],

            //Honkai
            ['game_id' => '3', 'type' => 'Monthly Card', 'image_url' => 'assets/img/Logo/honkaiplus.png', 'price' => '70000'],
            ['game_id' => '3', 'type' => '710 Crystal', 'image_url' => 'assets/img/Logo/honkai.png', 'price' => '148000'],
            ['game_id' => '3', 'type' => '3860 Crystal', 'image_url' => 'assets/img/Logo/honkai.png', 'price' => '710000'],
            ['game_id' => '3', 'type' => '8088 Crystal', 'image_url' => 'assets/img/Logo/honkai.png', 'price' => '1415000'],
            ['game_id' => '3', 'type' => '990 B Chip', 'image_url' => 'assets/img/Logo/honkaichip.png', 'price' => '210000'],
            ['game_id' => '3', 'type' => '1320 B Chip', 'image_url' => 'assets/img/Logo/honkaichip.png', 'price' => '295000'],
            ['game_id' => '3', 'type' => '3300 B Chip', 'image_url' => 'assets/img/Logo/honkaichip.png', 'price' => '712500'],
            ['game_id' => '3', 'type' => '6600 B Chip', 'image_url' => 'assets/img/Logo/honkaichip.png', 'price' => '1464000'],

            //Azur
            ['game_id' => '4', 'type' => '55 Gems', 'image_url' => 'assets/img/Logo/azure.png', 'price' => '45000'],
            ['game_id' => '4', 'type' => '102 + 60 Gems', 'image_url' => 'assets/img/Logo/azure.png', 'price' => '90000'],
            ['game_id' => '4', 'type' => '243 + 120 Gems', 'image_url' => 'assets/img/Logo/azure.png', 'price' => '185000'],
            ['game_id' => '4', 'type' => '567 + 350 Gems', 'image_url' => 'assets/img/Logo/azure.png', 'price' => '450000'],
            ['game_id' => '4', 'type' => '800 + 456 Gems', 'image_url' => 'assets/img/Logo/azure.png', 'price' => '760000'],
            ['game_id' => '4', 'type' => '1045 + 765 Gems', 'image_url' => 'assets/img/Logo/azure.png', 'price' => '1540000'],
            ['game_id' => '4', 'type' => '2794 + 984 Gems', 'image_url' => 'assets/img/Logo/azure.png', 'price' => '3120000'],

            //BlueArchive
            ['game_id' => '5', 'type' => '54 Pyroxenes', 'image_url' => 'assets/img/Logo/bluearciv.png', 'price' => '78000'],
            ['game_id' => '5', 'type' => '147 Pyroxenes', 'image_url' => 'assets/img/Logo/bluearciv.png', 'price' => '105000'],
            ['game_id' => '5', 'type' => '278 Pyroxenes', 'image_url' => 'assets/img/Logo/bluearciv.png', 'price' => '189000'],
            ['game_id' => '5', 'type' => '564 Pyroxenes', 'image_url' => 'assets/img/Logo/bluearciv.png', 'price' => '477000'],
            ['game_id' => '5', 'type' => '1083 Pyroxenes', 'image_url' => 'assets/img/Logo/bluearciv.png', 'price' => '890000'],
            ['game_id' => '5', 'type' => '2740 Pyroxenes', 'image_url' => 'assets/img/Logo/bluearciv.png', 'price' => '1947000'],

            //MLBB
            ['game_id' => '6', 'type' => 'Starlight Member', 'image_url' => 'assets/img/Logo/starlightml.png', 'price' => '149000'],
            ['game_id' => '6', 'type' => 'Starlight Member Plus', 'image_url' => 'assets/img/Logo/starlightml.png', 'price' => '329000'],
            ['game_id' => '6', 'type' => '15 Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '3000'],
            ['game_id' => '6', 'type' => '86(78+8) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '20000'],
            ['game_id' => '6', 'type' => '172(156+16) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '40000'],
            ['game_id' => '6', 'type' => '257(234+23) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '60000'],
            ['game_id' => '6', 'type' => '344(312+32) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '79000'],
            ['game_id' => '6', 'type' => '429(390+39) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '105000'],
            ['game_id' => '6', 'type' => '514(468+46) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '125000'],
            ['game_id' => '6', 'type' => '600(546+54) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '137000'],
            ['game_id' => '6', 'type' => '1050(937+113) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '250000'],
            ['game_id' => '6', 'type' => '1669(1484+185) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '400000'],
            ['game_id' => '6', 'type' => '2539(2172+367) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '575000'],
            ['game_id' => '6', 'type' => '4394(3724+670) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '980000'],
            ['game_id' => '6', 'type' => '6238(5274+964) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '1400000'],
            ['game_id' => '6', 'type' => '9288(7740+1548) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '2050000'],
            ['game_id' => '6', 'type' => '12976(10839+2137) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '2860000'],
            ['game_id' => '6', 'type' => '18676(15480+3096) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '4110000'],
            ['game_id' => '6', 'type' => '27864(23220+4644) Diamond', 'image_url' => 'assets/img/Logo/diamondml.png', 'price' => '6190000'],

            //Valorant
            ['game_id' => '7', 'type' => '300 Points', 'image_url' => 'assets/img/Logo/vp.png', 'price' => '34000'],
            ['game_id' => '7', 'type' => '420 Points', 'image_url' => 'assets/img/Logo/vp.png', 'price' => '50000'],
            ['game_id' => '7', 'type' => '625 Points', 'image_url' => 'assets/img/Logo/vp.png', 'price' => '67000'],
            ['game_id' => '7', 'type' => '1125 Points', 'image_url' => 'assets/img/Logo/vp.png', 'price' => '115000'],
            ['game_id' => '7', 'type' => '1650 Points', 'image_url' => 'assets/img/Logo/vp.png', 'price' => '167000'],
            ['game_id' => '7', 'type' => '2400 Points', 'image_url' => 'assets/img/Logo/vp.png', 'price' => '250000'],
            ['game_id' => '7', 'type' => '3400 Points', 'image_url' => 'assets/img/Logo/vp.png', 'price' => '328000'],
            ['game_id' => '7', 'type' => '4000 Points', 'image_url' => 'assets/img/Logo/vp.png', 'price' => '397500'],
            ['game_id' => '7', 'type' => '8000 Points', 'image_url' => 'assets/img/Logo/vp.png', 'price' => '789000'],

            //wutheringwaves
            ['game_id' => '8', 'type' => '67 Diamonds', 'image_url' => 'assets/img/Logo/ww.png', 'price' => '56500'],
            ['game_id' => '8', 'type' => '105 Diamonds', 'image_url' => 'assets/img/Logo/ww.png', 'price' => '98000'],
            ['game_id' => '8', 'type' => '546 Diamonds', 'image_url' => 'assets/img/Logo/ww.png', 'price' => '350000'],
            ['game_id' => '8', 'type' => '1000 Diamonds', 'image_url' => 'assets/img/Logo/ww.png', 'price' => '985000'],
            ['game_id' => '8', 'type' => '3500 Diamonds', 'image_url' => 'assets/img/Logo/ww.png', 'price' => '2560000'],
            ['game_id' => '8', 'type' => '4500 Diamonds', 'image_url' => 'assets/img/Logo/ww.png', 'price' => '3320000'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
