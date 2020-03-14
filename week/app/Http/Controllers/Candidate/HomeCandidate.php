<?php

namespace App\Http\Controllers\Candidate;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\User;
use App\Resume;
use Auth;
use File;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\HttpFoundation\Response;

class HomeCandidate extends Controller
{
  public function index ()
  {

      $user =Auth::user();
      $resumes=Resume::all()->where('users_id','=',$user->id)->where('diploma','=',Null);
      $diplomas =Resume::all()->where('users_id','=',$user->id)->where('resume','=',Null);
     dd($diplomas);
      return view('candidate.profile.index', compact('user','resumes','diplomas'));
    

  }

    public function show(User $user)
    {


    }

    public function StoreCandidate(Request $request,$id )
    {


    }
  public function UpdateCandidate(Request $request,$id )
  {
      $user = User::find($id);
       dd($user);
  }
    public function updateIntroduction(Request $request,$id){

         $data = User::find($id);


        $user = Auth::user();

        request()->validate([

        ]);


        if ($request->hasFile('photo')) {

            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image

            $path = $request->file('photo')->storeAs('public/photo', $fileNameToStore);
          // $fileNameToStore=  $path;
            $user = Auth::user();
            $user->photo = $fileNameToStore;
            $user->save();
        }
        else{
            $user = Auth::user();
          $data->inputBio=$request->input('inputBio') ;
            $data->skills=$request->input('skills') ;
           $data->cover_letter=$request->input('cover_letter') ;
             /*  $user->inputBio = request('inputBio')  ;
                $user->skills = request('skills');
                $user->cover_letter = request('cover_letter');*/

            $data->save();

        }
      return redirect()->back()->with('success', 'Thanks for the  update !');
       //return response()->json(['message' => 'New post created' ]);

    }
    public function UpdateAccount(Request $request){
        $user = Auth::user();

        $user->FirstName = request('FirstName')  ;
        $user->LastName = request('LastName');
        $user->Nationality = request('Nationality');
        $user->Gender = request('Gender')  ;
        $user->CountryResidence = request('CountryResidence');
        $user->City = request('City');
        $user->CurrentVisaStatus = request('CurrentVisaStatus')  ;
        $user->CurrentJobTitle = request('CurrentJobTitle');
        $user->CurrentCompany = request('CurrentCompany');
        $user->PreferredPhone = request('PreferredPhone')  ;
        $user->SalaryInformation = request('SalaryInformation');
        $user->Currency = request('Currency');
        $user->CurrentTotalMonthlyPackage = request('CurrentTotalMonthlyPackage')  ;
        $user->ExpectedMonthlySalary = request('ExpectedMonthlySalary');

        $user->save();
        return redirect()->back()->with('success', 'thanks you for update your information!');
    }
 

    public function UpdateResume(Request $request){

      $Resume = new Resume();
      request()->validate([
      ]);
      if ($request->file('resume')->isValid() ) {

          // Get filename with the extension
          $filenameWithExt = $request->file('resume')->getClientOriginalName();
          // Get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          // Get just ext
          $extension = $request->file('resume')->getClientOriginalExtension();
          $fileNameToStore = $filename . '_' . time() . '.' . $extension;
          // Upload Image

          $path = $request->file('resume')->storeAs('public/resume', $fileNameToStore);
       // Get filename with the extension
     
          
          // Filename to store            $fileNameToStore=  $path;
      }

      $Resume->users_id = Auth::user()->id;
      $Resume->resume = $fileNameToStore;
    
      $Resume->save();
    
        return redirect()->back()->with('success', 'Thanks for the  update !');
    }
    public function UpdateDiploma(Request $request){

      $Resume = new Resume();
      request()->validate([
      ]);
      if ($request->file('diploma')->isValid()) {

          // Get filename with the extension
          $filenameWithExtdiploma = $request->file('diploma')->getClientOriginalName();
          // Get just filename
          $filename = pathinfo($filenameWithExtdiploma, PATHINFO_FILENAME);
          // Get just ext
          $extensiondiploma = $request->file('diploma')->getClientOriginalExtension();
          $fileNameToStorediploma = $filename . '_' . time() . '.' . $extensiondiploma;
          // Upload Image

          $path = $request->file('diploma')->storeAs('public/diploma', $fileNameToStorediploma);

          
          // Filename to store            $fileNameToStore=  $path;
      }

      $Resume->users_id = Auth::user()->id;
      $Resume->diploma = $fileNameToStorediploma;
    
      $Resume->save();
    
        return redirect()->back()->with('success', 'Thanks for the  update !');
    }
    
    public function download($id)
    {
      $user = Auth::user($id);
      
      $data = Resume::find($id);
    
      $pathToFile= public_path(). "/storage/resume/$data->resume";  
        // $pathToFile = storage_path('/resume',$id->resume);
        //response()->download($pathToFile);
        return response()->download($pathToFile);
    }
    public function destroy($id) {
     $data = Resume::findOrFail($id);
      $data->delete();
  
      return redirect()->back()->with('success', 'The resume deleted  !');
  }



  public function downloadDiploma($id)
  {
    $user = Auth::user($id);
    
    $data = Resume::find($id);
  
    $pathToFile= public_path(). "/storage/diploma/$data->diploma";  
      // $pathToFile = storage_path('/resume',$id->resume);
      //response()->download($pathToFile);
      return response()->download($pathToFile);
  }
  public function destroyDiploma($id) {
   $data = Resume::findOrFail($id);
    $data->delete();

    return redirect()->back()->with('success', 'The Diploma deleted  !');
}


  public function UpdatePassword(Request $request,User $user){
    $user = Auth::user();

    $user->password = request('password')  ;
      $user->email= request('email')  ;
      $user->save();

    return redirect()->back()->with('success', 'thanks for the  update !');
} 
}
