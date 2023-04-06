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
        Schema::create('games', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('nickname');
            $table->timestamps();
        });

        DB::table('games')->insert([
            ['name' => 'Apex Legends', 'nickname' => 'apex'],
            ['name' => 'Genshin Impact', 'nickname' => 'genshin'],
            ['name' => 'Honkai Impact', 'nickname' => 'honkai'],
            ['name' => 'Azur Lane', 'nickname' => 'azur-lane'],
            ['name' => 'Blue Archive', 'nickname' => 'blue-archive'],
            ['name' => 'Mobile Legends: Bang Bang', 'nickname' => 'mobile-legends'],
            ['name' => 'Valorant', 'nickname' => 'valorant'],
            ['name' => 'Wuthering Waves', 'nickname' => 'wuthering-waves']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
