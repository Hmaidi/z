@extends('layouts.main')

@section('banner', $banner)

@section('content')
    <div class="col-lg-8 post-list">
    @include('jobs.flash-message')

    <div class="container">
        <br>


            <form id="form"method="POST" action="../applytojob"  enctype="multipart/form-data" novalidate >
                {{ csrf_field() }}
             <div class="row">
            <div class="form-group col-md-6">
                <label for="nom">First Name <span style="color: red">*</span></label>
                <input type="text" class="form-control"  name="name"
                        value="{{ $user->FirstName  ?? 'Your first name' }}"
                       placeholder="{{ $user->FirstName  ?? 'Your first name' }}"  required>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>
                 <div class="form-group col-md-6">
                     <label for="lastName">Last Name<span style="color: red">*</span></label>
                     <input type="text" class="form-control"  name="lastName"
                            value="{{ $user->LastName  ?? 'Your last name' }}"
                            placeholder="{{ $user->LastName  ?? 'Your last name' }}" required>
                     <div class="invalid-feedback">
                         This field is required.
                     </div>
                 </div>
             </div>
                <div class="form-group">
                <label for="Email">Email <span style="color: red">*</span></label>
                <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email"
                       value="{{ $user->email  ?? 'Your email' }}"
                       placeholder="{{ $user->email  ?? 'Your email' }}" required>
                <div class="invalid-feedback">
                    This field is required or exist.
                </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

            </div>
            <div class="form-group">
                <label for="Phone">Phone <span style="color: red">*</span></label>
                <input type="number" class="form-control"  name="Phone"
                       value="{{ $user->PreferredPhone  ?? 'Your phone number' }}"
                       placeholder="{{ $user->PreferredPhone   ?? 'Your phone number' }}" required>

                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>

                <div class="form-group">
                    <label for="nom">Address <span style="color: red">*</span></label>
                    <input type="text" class="form-control"  name="address"
                           value="{{ $user->address  ?? 'Your address' }}"
                           placeholder="{{ $user->address   ?? 'Your address' }}" required>

                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>

                <div class="form-group">
                    <label for="nom">Skills <span style="color: red">*</span></label>
                    <input type="text" class="form-control"  name="SkillsId"
                           value="{{ $user->skills  ?? 'Your skills' }}"
                           placeholder="{{ $user->skills   ?? 'Your skills' }}" required>

                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
            <div class="form-group">
                <label for="cover_letter">Cover Letter <span style="color: red">*</span></label>
                <textarea  type="text"  class="form-control" rows="5"   name="cover_letter"
                           placeholder="{{ $user->cover_letter   ?? 'Your over Letter' }}" required> {{ $user->cover_letter  ?? 'Your over Letter' }}  </textarea>

                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>

                <div class="form-group">

                        <label for="resume">Attach Resume : (doc,docx,pdf,txt)<span style="color: red">*</span> </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input inputfile inputfile-1" value="{{ $user->resume   ?? '' }}" id="validatedCustomFile" name="resume" required  onchange="$('#upload-file-info').html(this.files[0].name)">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...  <span class='label label-info' style="font-weight: 700" id="upload-file-info"></span></label>

                            <div class="invalid-feedback"> This field is required.</div>

                        </div>




                </div>

                <div class="form-group">
                    <input id="IdJobs" name="Id_Job" type="hidden" value="{{ $job->id }}">
                    <input id="Name_Job" name="Name_Job" type="hidden" value="{{ $job->title }}">
                    <input id="Id_CountryResidence" name="Id_CountryResidence" type="hidden" value="{{ $user->CountryResidence  ?? '' }}">
                    <input id="Name_CurrentVisaStatus" name="Name_CurrentVisaStatus" type="hidden" value="{{ $user->CurrentVisaStatus  ?? '' }}">
                    <input id="Id_CurrentJobTitle" name="Id_CurrentJobTitle" type="hidden" value="{{  $user->CurrentJobTitle  ?? '' }}">
                    <input id="Name_SalaryInformation" name="Name_SalaryInformation" type="hidden" value="{{  $user->SalaryInformation  ?? '' }}">
                    <input id="Name_Currency" name="Name_Currency" type="hidden" value="{{  $user->Currency   ?? ''}}">
                    <input id="Name_CurrentTotalMonthlyPackage" name="Name_CurrentTotalMonthlyPackage" type="hidden" value="{{  $user->CurrentTotalMonthlyPackage  ?? '' }}">
                    <input id="Name_ExpectedMonthlySalary" name="Name_ExpectedMonthlySalary" type="hidden" value="{{  $user->ExpectedMonthlySalary  ?? '' }}">

                </div>
                <div class="float-right">
                    <button class="btn btn-success" type="submit">Envoyer</button>
                    <button class="btn  btn-secondary" type="reset">Reset</button>
                </div>

        </form>
    </div>
    <script>
        (function() {
            "use strict"
            window.addEventListener("load", function() {
                var form = document.getElementById("form")
                form.addEventListener("submit", function(event) {
                    if (form.checkValidity() == false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add("was-validated")
                }, false)
            }, false)
        }())
    </script>

    </div>
@endsection