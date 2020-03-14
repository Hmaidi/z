@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.Resume.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.Resume.fields.name') }}
                        </th>
                        <td>
                            {{ $job->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.Resume.fields.email') }}
                        </th>
                        <td>
                            {{ $job->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.Resume.fields.phone') }}
                        </th>
                        <td>
                            {{ $job->PreferredPhone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.Resume.fields.cover_letter') }}
                        </th>
                        <td>
                            {{ $job->cover_letter }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.Resume.fields.address') }}
                        </th>
                        <td>
                            {{ $job->address }}
                        </td>
                    </tr>


                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.CountryResidence') }}
                        </th>
                        <td>
                            {{ $job->CountryResidence ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.CurrentVisaStatus') }}
                        </th>
                        <td>
                            {{ $job->CurrentVisaStatus }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.CurrentJobTitle') }}
                        </th>
                        <td>
                            {!! $job->CurrentJobTitle !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.SalaryInformation') }}
                        </th>
                        <td>
                            {!! $job->SalaryInformation !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.Currency') }}
                        </th>
                        <td>
                            {{ $job->Currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.CurrentTotalMonthlyPackage') }}
                        </th>
                        <td>
                            {{ $job->CurrentTotalMonthlyPackage ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.ExpectedMonthlySalary') }}
                        </th>
                        <td>
                            {{ $job->ExpectedMonthlySalary }}
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