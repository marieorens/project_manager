<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->morphs('notifiable'); 
            $table->text('data'); 
            $table->timestamp('read_at')->nullable(); 
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->nullable();  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
