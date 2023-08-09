<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // Lorsqu'un user suprime son compte, tout ce qui relier à lui sera supprimer (articles)
            
            $table->string('title');
            $table->string('picture');
            $table->text('content');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('article', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('user_id')->constrained()->cascadeOnDelete();
//             $table->text('message');
//             $table->timestamps();
//         });
//     }
    
//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('article');
//     }
// };

