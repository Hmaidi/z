@extends('layouts.main')
<style>
    .col-lg-4.sidebar {
        display: none;
    }
    .banner-area {

        height: 400px;
    }
</style>
@section('home')
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row   d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    <span></span> Disclaimer
                </h1>	


            </div>											
        </div>
    </div>
</section>
@endsection

@section('content')
<div style="min-height: 300px; width: 100%">
    <p >I understand that any verbal or written statement that is false, fraudulent or misleading that is contained in this application or attached materials,
        or made in the course of any related employment process, whether made by me or by others at my request, will result in rejection of my application, denial of employment,
        or dismissal if discovered after employment, and in many circumstances, prosecution for a crime.</p>
    <ul style="margin-left: 50px;">
        <li>I certify that all statements contained herein are true and complete whether made by others or me at my request.</li>
        <li>I understand that my employment is subject to successful obtainment of the necessary residency visa.</li>
    </ul>
</div>

@endsection