<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
    // Schemaファサードで students テーブルの作成
    Schema::create('students', function (Blueprint $table) {

        // カラムを作成していく
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('tel');
        $table->string('message');
        $table->timestamps();
    });
    }
    public function down()
    {
    // テーブル削除（ロールバック）
    Schema::dropIfExists('students');
    }
};
