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
            $table->string('image_url');
            $table->timestamps();
        });

        DB::table('games')->insert([
            ['name' => 'Apex Legends', 'nickname' => 'apex', 'image_url' => 'assets/page-1/images/apex1.png'],
            ['name' => 'Genshin Impact', 'nickname' => 'genshin', 'image_url' => 'assets/page-1/images/apex1-mCS.png'],
            ['name' => 'Honkai Impact', 'nickname' => 'honkai', 'image_url' => 'assets/page-1/images/apex1-v8n.png'],
            ['name' => 'Azur Lane', 'nickname' => 'azur-lane', 'image_url' => 'assets/page-1/images/apex1-DSe.png'],
            ['name' => 'Blue Archive', 'nickname' => 'blue-archive', 'image_url' => 'assets/page-1/images/apex1-fGz.png'],
            ['name' => 'Mobile Legends', 'nickname' => 'mobile-legends', 'image_url' => 'assets/page-1/images/ml1.png'],
            ['name' => 'Valorant', 'nickname' => 'valorant', 'image_url' => 'assets/page-1/images/valo1.png'],
            ['name' => 'Wuthering Waves', 'nickname' => 'wuthering-waves', 'image_url' => 'assets/page-1/images/apex1-yxA.png']
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
