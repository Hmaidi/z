@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
          <div class="centrephotoUser" style="margin: auto; display: table; margin-bottom: 20px;" >
              <img src="../../storage/photo/{{ $user->photo }}"  class="rounded-circle img-responsive mt-2" width="128" height="128"></div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr style="display: none !important;">
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->FirstName }}   {{ $user->LastName }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nationality
                        </th>
                        <td>
                            {{ $user->Nationality }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Preferred Phone
                        </th>
                        <td>
                            {{ $user->PreferredPhone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Current Visa Status
                        </th>
                        <td>
                            {{ $user->CurrentVisaStatus }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Current Job Title
                        </th>
                        <td>
                            {{ $user->CurrentJobTitle }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Current Company
                        </th>
                        <td>
                            {{ $user->CurrentCompany }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Current Total Monthly Package
                        </th>
                        <td>
                            {{ $user-> CurrentTotalMonthlyPackage }}   {{ $user->Currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Expected Monthly Salary
                        </th>
                        <td>
                            {{ $user->ExpectedMonthlySalary }}   {{ $user->Currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Salary Information
                        </th>
                        <td>
                            {{ $user->SalaryInformation }}   {{ $user->Currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Country Residence
                        </th>
                        <td>
                            {{ $user->CountryResidence }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Skills
                        </th>
                        <td>
                            {{ $user->skills }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Cover letter
                        </th>
                        <td>
                            {{ $user->cover_letter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Biography
                        </th>
                        <td>
                            {{ $user->inputBio }}
                        </td>
                    </tr>

                    <tr style="display: none">
                        <th>
                            Resume
                        </th>
                        <td>
                          {{--
                           <a href="{{ route('downloadUserResume', $user->resume ) }}"  target="_blank" >
                                <button class="btn btn-xs btn-primary" style="color:#fff;">

                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </a>



                            <a class="" href="{{ route('downloadResume', $data->resume ) }}" target="_blank" download >
                                <button class="btn btn-xs btn-primary" style="color:#fff;">

                                    <i class="fas fa-download" aria-hidden="true"></i>
                                </button>
                            </a>      --}}
                        </td>
                    </tr>

                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection