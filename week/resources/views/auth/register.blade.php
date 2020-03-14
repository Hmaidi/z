@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Register') }}</h2></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}"  onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="FirstName" class=" col-form-label text-md-right">{{ __('First Name ') }}</label>

                                    <div class="">
                                        <input id="FirstName" type="text" class="form-control{{ $errors->has('FirstName') ? ' is-invalid' : '' }}" name="FirstName" value="{{ old('FirstName') }}" required autofocus>

                                        @if ($errors->has('FirstName'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('FirstName') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="LastName" class=" col-form-label text-md-right">{{ __('Last Name ') }}</label>

                                    <div class="">
                                        <input id="LastName" type="text" class="form-control{{ $errors->has('LastName') ? ' is-invalid' : '' }}" name="LastName" value="{{ old('LastName') }}"
                                               required autofocus>

                                        @if ($errors->has('LastName'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('LastName') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Nationality" class="col-form-label text-md-right">{{ __('Nationality') }}</label>

                                    <div class="">
                                        <input id="Nationality" type="text" class="form-control{{ $errors->has('Nationality') ? ' is-invalid' : '' }}" name="Nationality" value="{{ old('Nationality') }}" required autofocus>

                                        @if ($errors->has('Nationality'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Nationality') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="Gender" class=" col-form-label text-md-right">{{ __('Gender') }}</label>

                                    <div class="">
                                        <select id="Gender" class="form-control {{ $errors->has('Gender') ? ' is-invalid' : '' }}" name="Gender" value="{{ old('Gender') }}" required autofocus>
                                            <option selected="">Choose...</option>
                                            <option value="Men">Men</option>
                                            <option value="Women">Women</option>
                                        </select>

                                        @if ($errors->has('Gender'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Gender') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>


                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="CountryResidence" class="col-form-label text-md-right">{{ __('Country of Residence ') }}</label>

                                    <div class="">
                                        <input id="CountryResidence" type="text" class="form-control{{ $errors->has('CountryResidence ') ? ' is-invalid' : '' }}" name="CountryResidence" value="{{ old('CountryResidence') }}" required autofocus>

                                        @if ($errors->has('CountryResidence'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CountryResidence') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="City" class="col-form-label text-md-right">{{ __('City ') }}</label>

                                    <div class="">
                                        <input id="City" type="text" class="form-control{{ $errors->has('City') ? ' is-invalid' : '' }}" name="City" value="{{ old('City') }}" required autofocus>

                                        @if ($errors->has('City'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('City') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="CurrentVisaStatus" class=" col-form-label text-md-right">{{ __('Current Visa Status ') }}</label>

                                    <div class="">
                                        <select id="CurrentVisaStatus" class="form-control {{ $errors->has('CurrentVisaStatus') ? ' is-invalid' : '' }}" name="CurrentVisaStatus" value="{{ old('CurrentVisaStatus ') }}" required autofocus>
                                            <option selected="">No Selection</option>
                                            <option value="Residence">Residence</option>
                                            <option value="Employment">Employment</option>
                                            <option value="Transferable">Transferable</option>
                                            <option value="Visit">Visit</option>
                                            <option value="Transit">Transit</option>
                                            <option value="Noneoftheabove">None of the above</option>
                                        </select>

                                        @if ($errors->has('CurrentVisaStatus'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CurrentVisaStatus') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="CurrentJobTitle" class="col-form-label text-md-right">{{ __('Current Job Title') }}</label>

                                    <div class="">
                                        <input id="CurrentJobTitle" type="text" class="form-control{{ $errors->has('CurrentJobTitle  ') ? ' is-invalid' : '' }}" name="CurrentJobTitle" value="{{ old('CurrentJobTitle') }}" required autofocus>

                                        @if ($errors->has('CurrentJobTitle'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CurrentJobTitle') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="CurrentCompany" class="col-form-label text-md-right">{{ __('Current Company') }}</label>

                                    <div class="">
                                        <input id="CurrentCompany" type="text" class="form-control{{ $errors->has('CurrentCompany') ? ' is-invalid' : '' }}" name="CurrentCompany" value="{{ old('CurrentCompany') }}" required autofocus>

                                        @if ($errors->has('CurrentCompany'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CurrentCompany') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="PreferredPhone" class="col-form-label text-md-right">{{ __('Preferred Phone') }}</label>

                                    <div class="">
                                        <input id="PreferredPhone" type="number" class="form-control{{ $errors->has('PreferredPhone ') ? ' is-invalid' : '' }}" name="PreferredPhone"
                                               value="{{ old('PreferredPhone') }}" required autofocus>

                                        @if ($errors->has('PreferredPhone'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('PreferredPhone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <br><br>

                            <h4>Compensation Details</h4>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="SalaryInformation" class="col-form-label text-md-right">{{ __('Salary Information') }}</label>

                                    <div class="">
                                        <input id="SalaryInformation" type="number" class="form-control{{ $errors->has('SalaryInformation') ? ' is-invalid' : '' }}" name="SalaryInformation"
                                               value="{{ old('SalaryInformation') }}" required autofocus>

                                        @if ($errors->has('SalaryInformation'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('SalaryInformation') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="Currency" class=" col-form-label text-md-right">{{ __('Currency') }}</label>

                                    <div class="">
                                        <select id="Currency" class="form-control {{ $errors->has('Currency') ? ' is-invalid' : '' }}" name="Currency" value="{{ old('Currency') }}" required autofocus>
                                            <option selected="">No Selection</option>
                                            <option value="SAR">SAR</option>
                                            <option value="USD">USD</option>

                                        </select>

                                        @if ($errors->has('Currency'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Currency') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>





                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="CurrentTotalMonthlyPackage" class="col-form-label text-md-right">{{ __('Current Total Monthly Package' ) }}</label>

                                    <div class="">
                                        <input id="CurrentTotalMonthlyPackage" type="number" class="form-control{{ $errors->has('CurrentTotalMonthlyPackage') ? ' is-invalid' : '' }}" name="CurrentTotalMonthlyPackage"
                                               value="{{ old('CurrentTotalMonthlyPackage') }}" required autofocus>

                                        @if ($errors->has('CurrentTotalMonthlyPackage'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CurrentTotalMonthlyPackage') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="ExpectedMonthlySalary" class="col-form-label text-md-right">{{ __('Expected Monthly Salary' ) }}</label>

                                    <div class="">
                                        <input id="ExpectedMonthlySalary" type="number" class="form-control{{ $errors->has('ExpectedMonthlySalary') ? ' is-invalid' : '' }}" name="ExpectedMonthlySalary"
                                               value="{{ old('ExpectedMonthlySalary') }}" required autofocus>

                                        @if ($errors->has('ExpectedMonthlySalary'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ExpectedMonthlySalary') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>





                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="checkbox" value="check" id="agree">

                                        <label class="form-check-label" for="exampleCheck1"> I have read and agree to the <a target="_blank" href="{{route('terms')  }}">Terms and Conditions and Privacy Policy</a></label>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <br>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection