<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsapplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobsapply', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('LastName');
            $table->string('email')->unique();
            $table->string('Nationality')->nullable();
            $table->string('PreferredPhone')->nullable();
            $table->string('Gender')->nullable();
            $table->string('CountryResidence');
            $table->string('CurrentVisaStatus');
            $table->string('CurrentJobTitle');
            $table->string('CurrentCompany');
            $table->string('SalaryInformation');
            $table->string('Currency');
            $table->string('CurrentTotalMonthlyPackage');
            $table->string('ExpectedMonthlySalary');
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('admin')->default(0);
            $table->string('role')->default('candidate');
            $table->string('remember_token')->nullable();

            $table->string('photo')->nullable();
            $table->string('country_name')->nullable();
            $table->string('state_name')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->longText('cover_letter');
            $table->longText('skills');
            $table->string('resume');
            $table->integer ('Id_Job');
            $table->string('Name_Job');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobsapply');
    }
}
