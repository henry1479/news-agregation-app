<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
                $table->string('id_in_soc', 20)
                ->default('')
                ->comment('id at the social network');
                $table->enum('type_auth',['site','gh','vk','fb'])
                ->default('site')
                ->comment('type of the autorization');
                $table->string('avatar', 150)
                ->default('')
                ->comment('link to an avatar of the user in social network');
                $table->index('id_in_soc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function(Blueprint $table){
            $table->dropColumn(['id_in_soc','type_auth', 'avatar']);
        });
    }
};
