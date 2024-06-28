<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('employee_id')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email_address')->unique();
            $table->string('job_title')->nullable();
            $table->string('current_company_name')->nullable();
            $table->string('department')->nullable();
            $table->string('manager_supervisor')->nullable();
            $table->date('employment_start_date')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('office_location')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();


        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_profiles');
    }
};
