@extends('layouts.main')

@section('banner', $banner)

@section('content')
    <div class="col-lg-8 post-list">
    @include('jobs.flash-message')
        {{----}}



<!--
        <form method="POST" action="/devicesaction">

            {{ csrf_field() }}

            <div>
                <label >Device Name</label>
                <input type="text" name="name" placeholder="Device Name">

            </div>
            <div>
                <label >Device Name</label>
                <input type="text" name="email" placeholder="Device Name">

            </div>
            <div>
                <label >Device Name</label>
                <input type="text" name="Phone" placeholder="Device Name">

            </div>

            <div>
                <label >Device Name</label>
                <input type="text" name="password" placeholder="Device Name">

            </div>

            <div>
                <label >Device Description</label>
                <textarea name="country_name" placeholder="Device Description"></textarea>

            </div>
            <div>

                <input type="submit" value="Make Device">

            </div>

        </form>-->
    <div class="container">
        <br>


            <form id="form"method="POST" action="../applytojob"  enctype="multipart/form-data" novalidate >
                {{ csrf_field() }}
            <div class="form-group">
                <label for="nom">Full Name <span style="color: red">*</span></label>
                <input type="text" class="form-control" min="3" max="80"name="name" placeholder="Full Name " required>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>
            <div class="form-group">
                <label for="Email">Email <span style="color: red">*</span></label>
                <input type="text" class="form-control"  name="email" placeholder="Email" required>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>
            <div class="form-group">
                <label for="Phone">Phone <span style="color: red">*</span></label>
                <input type="number" class="form-control"  name="Phone" value="Number phone"   required>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>

                <div class="form-group">
                    <label for="nom">Address <span style="color: red">*</span></label>
                    <input type="text" class="form-control"  name="address" placeholder="Your Address " required>
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>

                <div class="form-group">
                    <label for="nom">Skills <span style="color: red">*</span></label>
                    <input type="text" class="form-control"  name="SkillsId" placeholder="Your Skills " required>
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
            <div class="form-group">
                <label for="cover_letter">Cover Letter <span style="color: red">*</span></label>
                <textarea  type="text"  class="form-control" rows="5"   name="cover_letter" value="Cover Letter"   required></textarea>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>
                <div class="form-group">
                    <label for="resume">Attach Resume : (doc,docx,pdf,txt)<span style="color: red">*</span> </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input inputfile inputfile-1" id="validatedCustomFile" name="resume" required  onchange="$('#upload-file-info').html(this.files[0].name)">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...  <span class='label label-info' style="font-weight: 700" id="upload-file-info"></span></label>

                        <div class="invalid-feedback"> This field is required.</div>

                    </div>
                </div>

                <div class="form-group">
                    <input id="IdJobs" name="Id_Job" type="hidden" value="{{ $job->id }}">
                    <input id="IdJobs" name="Name_Job" type="hidden" value="{{ $job->title }}">
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