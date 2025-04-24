<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('name');
            $table->text('description')->nullable();
            $table->jsonb('tags')->nullable();
            $table->jsonb('metadata')->nullable();

            $table->timestamps();
        });

        DB::statement("CREATE INDEX skills_fts_idx ON skills USING GIN (to_tsvector('english', name || ' ' || coalesce(description, '')))");

        DB::statement("CREATE INDEX skills_tags_gin ON skills USING GIN (tags)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
