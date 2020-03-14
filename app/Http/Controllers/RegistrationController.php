<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class RegistrationController extends Controller
{
    public function CreateCandidate()
    {
        $banner = 'Jobs';
        return view('candidate.registration.create', compact(['job', 'banner']));
    }
    public function AboutCandidate()
    {
        $banner = 'Jobs';
        return view('candidate.registration.create', compact(['job', 'banner']));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function LoginCandidate()
    {
        $banner = 'Jobs';
        return view('candidate.registration.create', compact(['job', 'banner']));
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }

}
