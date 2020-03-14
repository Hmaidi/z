<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::dashboard;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'Nationality' => ['required', 'string', 'max:255'],
            'Gender' => ['required', 'string', 'max:255'],
            'CountryResidence' => ['required', 'string', 'max:255'],
            'CurrentVisaStatus' => ['required', 'string', 'max:255'],
            'CurrentJobTitle' => ['required', 'string', 'max:255'],
            'CurrentCompany' => ['required', 'string', 'max:255'],
            'PreferredPhone' => ['required', 'string', 'max:255'],
            'SalaryInformation' => ['required', 'string', 'max:255'],
            'City' => ['required', 'string', 'max:255'],
            'resume' => ['required', 'string', 'max:255'],
            'Currency' => ['required', 'string', 'max:255'],
            'CurrentTotalMonthlyPackage' => ['required', 'string', 'max:255'],
            'ExpectedMonthlySalary' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $defaultPhoto="avatar.png";
        return User::create([
            'FirstName' => $data['FirstName'],
            'LastName' => $data['LastName'],
            'Nationality' => $data['Nationality'],
            'Gender' => $data['Gender'],
            'CountryResidence' => $data['CountryResidence'],
            'CurrentVisaStatus' => $data['CurrentVisaStatus'],
            'CurrentJobTitle' => $data['CurrentJobTitle'],
            'CurrentCompany' => $data['CurrentCompany'],
            'PreferredPhone' => $data['PreferredPhone'],
            'SalaryInformation' => $data['SalaryInformation'],
            'City' => $data['City'],
            'Currency' => $data['Currency'],
            'CurrentTotalMonthlyPackage' => $data['CurrentTotalMonthlyPackage'],
            'ExpectedMonthlySalary' => $data['ExpectedMonthlySalary'],
            'email' => $data['email'],
            'resume' => $data['resume'],
             'photo'=> $defaultPhoto,
            'password' => Hash::make($data['password']),
        ]);

    }
}
