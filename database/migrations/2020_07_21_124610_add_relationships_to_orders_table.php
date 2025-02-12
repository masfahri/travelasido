<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->unsigned()->change();
            $table->foreign('customer_id')->references('id')->on('customers')
                  ->onUpdate('cascade')->onDelete('cascade');

            // $table->unsignedBigInteger('user_id')->unsigned()->change();
            // $table->foreign('user_id')->references('id')->on('users')
            //         ->onUpdate('cascade')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop Foreign orders to customers
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_foreign');
        });
        
        //drop Index orders to customers
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('orders_customer_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->change();
        });

        // //drop Foreign User to Orders
        // Schema::table('orders', function (Blueprint $table) {
        //     $table->dropForeign('orders_user_id_foreign');
        // });

        // //drop Index User to Orders
        // Schema::table('orders', function (Blueprint $table) {
        //     $table->dropIndex('orders_user_id_foreign');
        // });

        // Schema::table('orders', function (Blueprint $table) {
        //     $table->integer('user_id')->change();
        // });
    }
}
