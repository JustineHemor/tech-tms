<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('due_date')->nullable();
            $table->datetime('completed_at')->nullable();

            $table->foreignIdFor(User::class, 'completed_by_id')->nullable()->onDelete('cascade');
            $table->foreignIdFor(User::class, 'created_by_id')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'assigner_id')->nullable()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
