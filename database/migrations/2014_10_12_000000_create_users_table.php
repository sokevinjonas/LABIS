<?php

use App\Enums\Role;
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
        Schema::create('users', function (Blueprint $table) 
        {
            $roles = array_column(Role::cases(), 'value');
            $table->id();
            $table->string('photo')->nullable();
            $table->string('nom');
            $table->string('telephone')->unique();
            $table->string('whatsapp')->unique()->nullable();
            $table->string('email')->unique();
            $table->char('sexe')->nullable();
            $table->enum('role', $roles)->default(Role::User->value);
            $table->string('password');
            $table->string('bio')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('terms')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};