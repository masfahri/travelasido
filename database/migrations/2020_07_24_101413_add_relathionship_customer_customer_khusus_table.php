<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelathionshipCustomerCustomerKhususTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_khusus', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->unsigned()->change();
            $table->foreign('customer_id')->references('id')->on('customers')
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
        Schema::table('customer_khusus', function (Blueprint $table) {
            $table->dropForeign('customer_khusus_customer_id_foreign');
        });

        Schema::table('customer_khusus', function (Blueprint $table) {
            $table->dropIndex('customer_khusus_customer_id_foreign');
        });

        Schema::table('customer_khusus', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->change();
        });
    }
}
