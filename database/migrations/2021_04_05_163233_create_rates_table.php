<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price');
            $table->smallInteger('delivery_time');
        });

        //DB::insert('insert into rates (id, title, price, delivery_time) values (?, ?, ?, ?)', [1, 'Срочный', 1000, 1]);
        DB::table('rates')->insert([
            [
                'id' => 1,
                'title' => 'Срочный',
                'price' => 1000,
                'delivery_time' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Стандарт',
                'price' => 500,
                'delivery_time' => 3,
            ],
            [
                'id' => 3,
                'title' => 'Неспеша',
                'price' => 200,
                'delivery_time' => 7,
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
