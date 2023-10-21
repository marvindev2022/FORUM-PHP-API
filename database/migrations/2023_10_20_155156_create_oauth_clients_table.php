<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthClientsTable extends Migration
{
    public function up()
    {
        Schema::create('oauth_clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id', 36); // Use string para UUID
            $table->string('secret', 255);
            $table->string('provider')->nullable();
            $table->text('redirect');
            $table->tinyInteger('personal_access_client');
            $table->tinyInteger('password_client');
            $table->tinyInteger('revoked');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('oauth_clients');
    }
}
