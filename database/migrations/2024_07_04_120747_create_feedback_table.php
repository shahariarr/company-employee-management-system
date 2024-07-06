<?php

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
        Schema::create('feedback', function (Blueprint $table) {
            // $table->id();

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();

            // $table->unsignedBigInteger('company_id');
            // $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->restrictOnDelete();

            // $table->unsignedBigInteger('employee_id');
            // $table->foreign('employee_id')->references('id')->on('employee_profiles')->cascadeOnUpdate()->restrictOnDelete();

            // $table->integer('rating')->unsigned()->default(1);
            // $table->string('title');
            // $table->text('description');
            // $table->date('date_of_experience');
            // $table->timestamp('created_at')->useCurrent();
            // $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('company_id');
            $table->text('feedback');
            $table->tinyInteger('rating')->unsigned()->comment('Rating out of 5');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employee_profiles')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
