<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipSellerUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::table('sellers', function (Blueprint $table) {
            $table->dropForeign('sellers_user_id_foreign');
        });

        Schema::table('sellers', function (Blueprint $table) {
            $table->dropIndex('sellers_user_id_foreign');
        });

        Schema::table('sellers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
        });
    }
}
