@extends('layouts.main')

@section('banner', 'Job: '.$job->title)

@section('content')
    <div class="col-lg-8 post-list">
        <div class="single-post d-flex flex-row">
            <div class="thumb">
                @if($job->company && $job->company->logo)
                    <img src="{{ $job->company->logo->getUrl() }}" alt="{{ $job->company->name }}">
                @endif
            </div>
            <div class="details">
                <div class="title d-flex flex-row justify-content-between">
                    <div class="titles">
                        <a href="#"><h4>{{ $job->title }}</h4></a>
                        @if($job->company)
                            <h6>{{ $job->company->name }}</h6>
                        @endif
                    </div>
                </div>
                <p>
                    {{ $job->short_description }}
                </p>
                <h5>Job Nature: {{ $job->job_nature }}</h5>
                <p class="address"><span class="lnr lnr-map"></span> {{ $job->address }}</p>
                <p class="address"><span class="lnr lnr-database"></span> {{ $job->salary }}</p>
            </div>
        </div>
        <div class="single-post job-details">
            <h4 class="single-title">Whom we are looking for</h4>
            <p>
                {{ $job->full_description }}
            </p>
        </div>
        <div class="single-post job-experience">
            <h4 class="single-title">Experience Requirements</h4>
            <p>
                {{ $job->requirements }}
            </p>
        </div>

        <div class="single-post job-experience">
            @if( auth()->check() )
                <h4 class="single-title">Apply For this Job</h4>
                <!-- Button trigger modal -->
                <form id="form"method="POST" action="{{route('jobapply',$job->id)}}"  enctype="multipart/form-data" novalidate >
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-primary">
                        <a class="nav-link" href="{{route('jobapply',$job->id)}}"> >>  Apply For {{ $job->title }}</a>
                        <input id="IdJobs" name="Id_Job" type="hidden" value="{{ $job->id }}">
                        <input id="IdJobs" name="Name_Job" type="hidden" value="{{ $job->title }}">

                    </button>
                </form>
            @else
                <button type="button" class="btn btn-primary">
                    <a class="nav-link" style="cursor: pointer" data-toggle="modal" data-target="#SignUpSignInModal"> Apply For {{ $job->title }}</a>
                </button>

            @endif

        </div>


        @include('jobs.apply-connexion');
    </div>

@endsection