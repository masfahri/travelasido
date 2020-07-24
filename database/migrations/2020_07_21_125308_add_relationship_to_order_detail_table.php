<?php

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->unsigned()->change();
            $table->foreign('order_id')->references('id')->on('orders')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('product_id')->unsigned()->change();
            $table->foreign('product_id')->references('id')->on('products')
                  ->onUpdate('cascade')->onDelete('cascade');

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
        //drop Foreign order_details to orders
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_order_id_foreign');
        });

        //drop Index order_details to orders
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropIndex('order_details_order_id_foreign');
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->change();
        });

        //drop Foreign order_details to Products
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_product_id_foreign');
        });

        //drop Index order_details to Products
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropIndex('order_details_product_id_foreign');
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
        });

        //drop Foreign order_details to Products
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_seller_id_foreign');
        });

        //drop Index order_details to Products
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropIndex('order_details_seller_id_foreign');
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('seller_id')->change();
        });
    }
}
