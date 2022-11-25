<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('dec');
            $table->timestamps();
        });


        DB::table('demo')->insert(
            [
                'name' => 'admin',
                'dec' => 'aaaaa',

            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demo');
    }
}
