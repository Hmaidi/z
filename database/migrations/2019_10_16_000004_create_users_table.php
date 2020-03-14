<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Nationality');
            $table->string('PreferredPhone');
            $table->string('Gender');
            $table->string('CountryResidence');
            $table->string('CurrentVisaStatus');
            $table->string('CurrentJobTitle');
            $table->string('CurrentCompany');
            $table->string('SalaryInformation');
            $table->string('Currency');
            $table->string('CurrentTotalMonthlyPackage');
            $table->string('ExpectedMonthlySalary');
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('admin')->default(0);
            $table->string('role')->default('candidate');
            $table->string('remember_token')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->longText('skills')->nullable();
            $table->string('resume')->nullable();
            $table->string('photo')->nullable();
            $table->string('inputBio')->nullable();



            $table->json('data')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
