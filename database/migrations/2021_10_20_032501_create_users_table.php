<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->char('uuid', 36)->nullable()->index('users_uuid_IDX');
            $table->string('first_name')->index('users_first_name_IDX');
            $table->string('last_name')->index('users_last_name_IDX');
            $table->string('mobile_phone')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('business_email')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('street', 100)->nullable();
            $table->string('suburb', 100)->nullable();
            $table->string('street_address1')->nullable();
            $table->string('street_address2')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('access_token', 500)->nullable();
            $table->boolean('is_verified')->nullable()->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->index(['uuid', 'first_name'], 'users_uuid-firstname_IDX');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
