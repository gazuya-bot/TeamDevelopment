<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('club_name', 100);
            $table->string('email', 254);
            $table->string('address', 64);
            $table->string('name', 64);
            $table->string('tel', 11);
            $table->string('fax', 11);
            $table->text('memo');
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
        Schema::dropIfExists('members');
    }
}
