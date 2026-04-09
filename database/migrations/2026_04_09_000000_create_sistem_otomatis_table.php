<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sistem_otomatis', function (Blueprint $table) {
            $table->id();
            $table->boolean('enabled')->default(true);
            $table->timestamps();
        });

        DB::table('sistem_otomatis')->insert([
            'enabled' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('sistem_otomatis');
    }
};
