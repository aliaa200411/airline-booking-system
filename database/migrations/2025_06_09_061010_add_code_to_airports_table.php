<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('airports', function (Blueprint $table) {
        $table->string('code')->after('name');
    });
}

public function down()
{
    Schema::table('airports', function (Blueprint $table) {
        $table->dropColumn('code');
    });
}

};
