<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

public function up()
{
    Schema::create('documents', function (Blueprint $table) {
        $table->id();
        $table->string('file_name');
        $table->string('title')->nullable();
        $table->longText('text')->nullable(); // extracted content
        $table->string('category')->nullable();
        $table->integer('size_kb')->nullable();
        $table->timestamp('uploaded_at')->nullable();
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
