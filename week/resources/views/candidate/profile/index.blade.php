<style>
    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
    .invalid-feedback {

    margin-top: 2rem !important;
  
}
</style>
@extends('layouts.candidate')
@section('content')

    <div class="card Profile">
            <div class="row">
                <div class="col-md-5 col-xl-4">

                    <div class="card blocLeft" >
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Settings</h5>
                        </div>

                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#introduction" role="tab">
                                Introduction
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account" role="tab">
                                My Information
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#resume" role="tab">
                                My Resumes
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#Diploma" role="tab">
                                My Diploma
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                                My credentials
                            </a>
                           

                            <!--<a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                                Email notifications
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                                Web notifications
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                                Widgets
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                                Your data
                            </a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
                                Delete account
                            </a>-->
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-xl-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="introduction" role="tabpanel">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-actions float-right">

                                    </div>
                                    <h5 class="card-title mb-0">{{ $user->FirstName  }} {{ $user->LastName  }} </h5>
                                </div>
                                @include('jobs.flash-message')
                                <div class="card-body">
                                    <form enctype="multipart/form-data" action="{{ route('profile.updateIntroduction',$user->id) }}" method="POST">

                                        {{ csrf_field() }}

                                        <br><br>

                                        <div class="form-row">
                                            <div class="col-md-8">

                                                <div class="form-group">
                                                    <label for="inputUsername">Biography</label>
                                                    <textarea rows="2" class="form-control" id="inputBio"  name ="inputBio"

                                                              placeholder="{{ $user->inputBio  ?? 'Tell something about yourself' }}">{{ $user->inputBio  ?? 'Tell something about yourself' }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputUsername">Skills</label>
                                                    <input   type="text" class="form-control" id="skills"  name ="skills"
                                                             value="{{ $user->skills  ?? 'Your cover letter' }}"
                                                             placeholder="{{ $user->skills  ?? 'Your Skills' }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputUsername">Cover letter</label>
                                                    <textarea rows="2" class="form-control" id="cover_letter"  name ="cover_letter"

                                                              placeholder="{{ $user->cover_letter  ?? 'Cover letter' }}">{{ $user->cover_letter  ?? 'Your cover letter' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    <img src="../storage/photo/{{ $user->photo }}"  class="rounded-circle img-responsive mt-2" width="128" height="128">
                                                    <div class="mt-2">


                                                        <label class="custom-file-upload">
                                                            <input type="file" name="photo"/>
                                                            <i class="fas fa-upload"></i>
                                                        </label>

                                                    </div>
                                                    <small>For best results, use an image at least 128px by 128px in .jpg format</small>


                                                </div>
                                            </div>

                                        </div>


                                        <button type="submit" id="ajaxSubmit"class="btn btn-primary">Save  </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="account" role="tabpanel">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-actions float-right">

                                    </div>
                                    <h5 class="card-title mb-0">{{ $user->FirstName  }} {{ $user->LastName  }} </h5>
                                </div>
                                @include('jobs.flash-message')
                                <div class="card-body">
                                    <form enctype="multipart/form-data" action="{{ route('profile.UpdateAccount',$user->id) }}" method="POST">
                                        {{ csrf_field() }}

                                        <br><br>


                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="FirstName">First name</label>
                                                <input type="text" class="form-control" id="FirstName"   name ="FirstName" 
                                                value="{{ $user->FirstName ?? 'First Name' }}"
                                                placeholder="{{ $user->FirstName ?? 'First Name' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="LastName">Last name</label>
                                                <input type="text" class="form-control" id="LastName"   name ="LastName" 
                                                value="{{ $user->LastName ?? 'Last Name' }}" 
                                                placeholder="{{ $user->LastName ?? 'Last Name' }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="Nationality">Nationality</label>
                                                <input type="text" class="form-control" id="Nationality"   name ="Nationality" 
                                                value="{{ $user->Nationality ?? 'Nationality' }}" 
                                                placeholder="{{ $user->Nationality ?? 'Nationality' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Gender">Gender</label>

                                                <select id="Gender" class="form-control " name="Gender" value="" required="" autofocus="">
                                                    <option  value="{{ $user->Gender ?? 'Gender' }}"  selected="">
                                                        {{ $user->Gender ?? 'Gender' }}</option>
                                                    <option value="Men">Men</option>
                                                    <option value="Women">Women</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="CountryofResidence">Country of Residence</label>
                                                <input type="text" class="form-control" id="CountryofResidence"   name ="CountryofResidence"
                                                value="{{ $user->CountryResidence ?? 'Country of Residence' }}"
                                                placeholder="{{ $user->CountryResidence ?? 'Country of Residence' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="City">City</label>
                                                <input type="text" class="form-control" id="City"   name ="City"  
                                                value="{{ $user->City ?? 'City' }}"
                                                placeholder="{{ $user->City ?? 'City' }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="CurrentVisaStatus">Current Visa Status</label>

                                                <select id="CurrentVisaStatus" class="form-control " name="CurrentVisaStatus" value="" required="" autofocus="">
                                                    <option value="{{ $user->CurrentVisaStatus ?? 'No Selection' }}"> 
                                                        {{ $user->CurrentVisaStatus ?? 'No Selection' }}</option>
                                                    <option value="Residence">Residence</option>
                                                    <option value="Employment">Employment</option>
                                                    <option value="Transferable">Transferable</option>
                                                    <option value="Visit">Visit</option>
                                                    <option value="Transit">Transit</option>
                                                    <option value="Noneoftheabove">None of the above</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="CurrentJobTitle">Current Job Title</label>
                                                <input type="text" class="form-control" id="CurrentJobTitle" 
                                                 name ="CurrentJobTitle" 
                                                 value="{{ $user->CurrentJobTitle  ?? 'Current Job Title' }}"
                                                  placeholder="{{ $user->CurrentJobTitle  ?? 'Current Job Title' }}">
                                            </div>

                                        </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="CurrentCompany">Current Company</label>
                                            <input type="text" class="form-control" id="CurrentCompany"   name ="CurrentCompany" 
                                            value="{{ $user->CurrentCompany ?? 'Current Company' }}"
                                            placeholder=" {{ $user->CurrentCompany ?? 'Current Company' }}">
                                             </div>
                                            <div class="form-group col-md-6">

                                                <div class="form-group">
                                                    <label for="PreferredPhone">Preferred Phone</label>
                                                    <input type="text" class="form-control" id="PreferredPhone" 
                                                    name ="PreferredPhone" 
                                                    value="{{ $user->PreferredPhone ?? 'Preferred Phone' }}"
                                                    placeholder="{{ $user->PreferredPhone ?? 'Preferred Phone' }}">

                                                   </div>

                                               </div>
                                          </div>
                                        <br><br>
                                        <h4>Compensation Details</h4>
                                        <br>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="SalaryInformation">Salary Information</label>
                                                <input type="number" class="form-control" id="SalaryInformation"  
                                                 name ="SalaryInformation" 
                                                 value="{{ $user->SalaryInformation ?? 'Salary Information' }}"
                                                 placeholder=" {{ $user->SalaryInformation ?? 'Salary Information' }}">
                                            </div>
                                            <div class="form-group col-md-6">

                                                <div class="form-group">
                                                    <label for="Currency">Currency</label>

                                                    <select id="Currency" class="form-control " name="Currency" value="" required="" autofocus="">
                                                        <option 
                                                        value="{{ $user->Currency ?? 'Currency' }}"
                                                        selected="">{{ $user->Currency ?? 'Currency' }}</option>
                                                        <option value="SAR">SAR</option>
                                                        <option value="USD">USD</option>

                                                    </select>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="CurrentTotalMonthlyPackage">Current Total Monthly Package</label>
                                                <input type="number" class="form-control" id="CurrentTotalMonthlyPackage"   
                                                name ="CurrentTotalMonthlyPackage" 
                                                value="{{ $user->CurrentTotalMonthlyPackage ?? 'Current Total Monthly Package' }}"
                                                placeholder=" {{ $user->CurrentTotalMonthlyPackage ?? 'Current Total Monthly Package' }}">
                                            </div>
                                            <div class="form-group col-md-6">

                                                <div class="form-group">
                                                    <label for="ExpectedMonthlySalary">Expected Monthly Salary</label>
                                                    <input type="number" class="form-control" id="ExpectedMonthlySalary" name ="ExpectedMonthlySalary"
                                                    value="{{ $user->ExpectedMonthlySalary ?? 'Expected Monthly Salary' }}"
                                                    placeholder="{{ $user->ExpectedMonthlySalary ?? 'Expected Monthly Salary' }}">

                                                </div>

                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-submit">Save  </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">My Resume(s)</h5>

                                    <form enctype="multipart/form-data" action="{{ route('profile.UpdatePassword',$user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                            <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                                            <input type="email" id="email" name="email" class="form-control" 
                                            placeholder="{{  $user->email ?? 'Your email' }}" 
                                             value =" {{ $user->email }}"required>
                                          
                                           


                                            @if($errors->has('email'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </em>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.user.fields.email_helper') }}
                                            </p>
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                                            <input type="password" id="password" name="password" 
                                            class="form-control">
                                            @if($errors->has('password'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('password') }}
                                                </em>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.user.fields.password_helper') }}
                                            </p>
                                        </div>
                                      
                                     
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Diploma" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">My diploma</h5>
                                    {{ csrf_field() }}

                                        <form enctype='multipart/form-data'  action="{{ route('profile.UpdateDiploma',$user->id) }}" method="POST">
                                            <div class="form-group">
                                      
                                      
                                
                                                <label for="diploma">Attach File : (diploma,certificate,...)<span style="color: red">*</span> </label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input inputfile inputfile-1"
                                                     id="validatedCustomFileDiplom" name="diploma" required  onchange="$('#upload-file-info-diploma').html(this.files[0].name)">
                                                    <label class="custom-file-label" for="validatedCustomFileDiplom" >Choose file...  <span class='label label-info' style="font-weight: 700" id="upload-file-info-diploma"></span></label>
                            
                                                    <div class="invalid-feedback"> This field is required.</div>
                            
                                                </div>
                                            </div>

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button type="submit" style="margin-top:20px;"class="btn btn-primary">Save changes</button>
                                    </form>
                               
                                      
                                    
                                 
                                </div>
                              
                            
                                <br>
                                <br>
                                <table class=" table table-bordered table-striped table-hover datatable datatable-Job">
                                    <thead>
                                        <tr>
                                       
                                            <th  style="display: none">
                                                {{ trans('cruds.Profile.id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.Profile.title') }}
                                            </th>
                                       
                                            <th>
                                                {{ trans('cruds.Profile.action') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($diplomas as $diploma)
                                            <tr data-entry-id="{{ $user->id }}">
                                             
                                                <td  style="display: none">
                                                    {{ $diploma->users_id ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $diploma->diploma ?? '' }}
                                                </td>
                                             
                                             
                                                <td>
                                                  
                                                    <a class="btn btn-xs btn-primary" href="{{ route('downloadDiploma',$diploma->id) }}">

                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    
                                                        <form action="{{ route('destroyDiploma',$diploma->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            {{--<input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
                                                            <button type="submit" class="btn btn-xs btn-danger"  >
                                                                <i class="fas fa-trash"aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                              
                    
                                                </td>
                    
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="resume" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">My resumes</h5>
                                    {{ csrf_field() }}

                                        <form enctype='multipart/form-data'  action="{{ route('profile.UpdateResume',$user->id) }}" method="POST">
                                            <div class="form-group">
                                                <label for="resume">Attach Resume : (doc,docx,pdf,txt)<span style="color: red">*</span> </label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input inputfile inputfile-1"
                                                     id="validatedCustomFile" required  name="resume"   onchange="$('#upload-file-info').html(this.files[0].name)">
                                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...  <span class='label label-info' style="font-weight: 700" id="upload-file-info"></span></label>
                            
                                                    <div class="invalid-feedback"> This field is required.</div>
                            
                                                </div>
                                            </div>
                                       

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <button type="submit" style="margin-top:20px;"class="btn btn-primary">Save changes</button>
                                    </form>
                               
                                      
                                    
                                 
                                </div>
                              
                                <table class=" table table-bordered table-striped table-hover datatable datatable-Job">
                                    <thead>
                                        <tr>
                                       
                                            <th  style="display: none">
                                                {{ trans('cruds.Profile.id') }}
                                            </th>
                                            <th>
                                                {{ trans('cruds.Profile.title') }}
                                            </th>
                                       
                                            <th>
                                                {{ trans('cruds.Profile.action') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($resumes as $resume)
                                            <tr data-entry-id="{{ $user->id }}">
                                             
                                                <td  style="display: none">
                                                    {{ $resume->users_id ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $resume->resume ?? '' }}
                                                </td>
                                             
                                             
                                                <td>
                                                  
                                                    <a class="btn btn-xs btn-primary" href="{{ route('downloadResume',$resume->id) }}">

                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                    
                                                        <form action="{{ route('ResumeDestroy',$resume->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            {{--<input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
                                                            <button type="submit" class="btn btn-xs btn-danger"  >
                                                                <i class="fas fa-trash"aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                              
                    
                                                </td>
                    
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                (function() {
                    "use strict"
                    window.addEventListener("load", function() {
                        var form = document.getElementById("FormResume")
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

@endsection

@section('script')

@endsection