<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use App\User;
use Auth;
use App\Location;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')
            ->paginate(7);

        $banner = 'Jobs';

        return view('jobs.index', compact(['jobs', 'banner']));
    }



    public function show(Job $job,User $user)
    {
        $job->load('company');
        if(Auth::user()){
        $id = Auth::user();

        $user= User::find($id)->first();

            return view('jobs.show', compact('job','user'));
        }
        return view('jobs.show', compact('job'));

    }


}
