<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade");
            $table->unsignedBigInteger("role_id");
            $table->foreign("role_id")->references("id")->on("roles")->onDelete("cascade");
            $table->index(["admin_id", "role_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_role');
    }
}
