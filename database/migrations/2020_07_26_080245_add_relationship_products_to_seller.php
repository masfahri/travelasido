<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipProductsToSeller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('seller_id')->unsigned()->change();
            $table->foreign('seller_id')->references('id')->on('sellers')
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_seller_id_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_seller_id_foreign');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('seller_id')->change();
        });
    }
}
