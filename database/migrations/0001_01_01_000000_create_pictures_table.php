<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Picture;
use App\Models\Author;
use App\Models\Resolution;
use App\Models\Type;



return new class extends Migration
{
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
        });
        
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->foreignIdFor(Author::class)->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->integer('width');
            $table->integer('height');
        });
        
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
        });
        
        Schema::create('picture_resolution', function (Blueprint $table) {
            
            $table->foreignIdFor(Picture::class)->onDelete('cascade');
            $table->foreignIdFor(Resolution::class)->onDelete('cascade');
            $table->primary(['picture_id', 'resolution_id']);
        });
        
        Schema::create('picture_type', function (Blueprint $table) {
            
            $table->foreignIdFor(Picture::class)->onDelete('cascade');
            $table->foreignIdFor(Type::class)->onDelete('cascade');
            $table->primary(['picture_id', 'type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures_types');
        Schema::dropIfExists('pictures_resolutions');
        Schema::dropIfExists('types');
        Schema::dropIfExists('resolutions');
        Schema::dropIfExists('pictures');
        Schema::dropIfExists('authors');
    }
};
