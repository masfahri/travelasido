<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelathionshipDetailProductToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->unsigned()->change();
            $table->foreign('product_id')->references('id')->on('products')
                  ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_detail', function (Blueprint $table) {
            $table->dropForeign('product_detail_product_id_foreign');
        });

        Schema::table('product_detail', function (Blueprint $table) {
            $table->dropIndex('product_detail_product_id_foreign');
        });

        Schema::table('product_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
        });
    }
}
