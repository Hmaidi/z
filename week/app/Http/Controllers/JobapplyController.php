<?php

namespace App\Http\Controllers;

use App\Jobapply;
use App\Job;
use App\Category;
use Notification;
use App\User;
use App\Notifications\NotifJobAdmin;
use Illuminate\Http\Request;


class JobapplyController extends Controller
{
    public function index(Job $job, $id)
    {
        $banner = 'Jobs';
        $job = Job::all()->where('id', $id)->first();
        return view('jobs.apply', compact(['job', 'banner']));
    }



    public function store(Request $request)
    {
        $request->logo->store('logos');
    }

    public function storeApplyjob(Request $request)
    {

        $JobsEmployers = new Jobapply();
        request()->validate([

        ]);

        if ($request->file('resume')->isValid()) {

            // Get filename with the extension
            $filenameWithExt = $request->file('resume')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('resume')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image

            $path = $request->file('resume')->storeAs('public/resume', $fileNameToStore);
            // Filename to store            $fileNameToStore=  $path;
        }

        $JobsEmployers->name = request('name');
        $JobsEmployers->email = request('email');
        $JobsEmployers->Phone = request('Phone');
        $JobsEmployers->gender = request('gender');
        $JobsEmployers->country_name = request('country_name');
        $JobsEmployers->state_name = request('state_name');
        $JobsEmployers->city = request('skills');
        $JobsEmployers->address = request('address');
        $JobsEmployers->cover_letter = request('cover_letter');
        $JobsEmployers->skills = request('SkillsId');
        $JobsEmployers->resume = $fileNameToStore;
        $JobsEmployers->Id_Job = request('Id_Job');
        $JobsEmployers->Name_Job = request('Name_Job');



        $user = User::first();

        $details = [

            /*'actionText' => 'View My Site',
            'actionURL' => url('/'),*/
            'greeting' => 'Hi, '. $user->name,
            'body' => 'This is new applay from the post ==>'  .$JobsEmployers->Name_Job  ,
            'Skills' =>'Skills of candidate==> '  . $JobsEmployers->skills,
            'Phone' => 'Phone of candidate==> '. $JobsEmployers->Phone,
            'email' => 'Email of candidate==> '. $JobsEmployers->email,
            'thanks' => 'Thank you for using Nomd Apply Jobs',

        ];

        Notification::send($user, new NotifJobAdmin($details));
        $JobsEmployers->save();

        return redirect()->back()->with('success', 'Thanks for the  apply ! We will get back to you soon!');





    }


    public function show(Job $job)
    {
        $job->load('company');

        return view('jobs.show', compact('job'));
    }
}
