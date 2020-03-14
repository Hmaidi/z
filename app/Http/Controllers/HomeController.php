<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Resume;

use File;

use Symfony\Component\HttpFoundation\Response;

use App\Category;
use App\Location;
use App\Job;
use App\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $searchLocations = Location::pluck('name', 'id');
        $searchCategories = Category::pluck('name', 'id');
        $searchByCategory = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->pluck('name', 'id');
        $jobs = Job::with('company')
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();

        return view('index', compact(['searchLocations', 'searchCategories', 'searchByCategory', 'jobs']));
    }

    public function search(Request $request)
    {
        $jobs = Job::with('company')
            ->searchResults()
            ->paginate(7);

        $banner = 'Search results';

        return view('jobs.index', compact(['jobs', 'banner']));
    }
    public function job_apply(){

        return view('jobs.apply');
    }
    public function AfterRegisterUser()
    {
        return view('candidate.profile.index');
    }
    public function AfterloginUser()
    {

     
        $user =Auth::user();
      $resumes=Resume::all()->where('users_id','=',$user->id)->where('diploma','=',Null);
      $diplomas =Resume::all()->where('users_id','=',$user->id)->where('resume','=',Null);
  
      return view('candidate.profile.index', compact('user','resumes','diplomas'));
    

    }
    public function AfterloginAdmin()
    {

        return view('layouts.admin');
    }
    public function terms()
    {

        return view('terms');
    }



}
