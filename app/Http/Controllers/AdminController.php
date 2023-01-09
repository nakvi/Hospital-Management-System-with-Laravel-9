<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addDoctor;
use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //function for add new doctor
    public function viewDoctor()
    {
        $viewDoctor=addDoctor::all();
        return view('admin.viewDoctor',compact('viewDoctor'));
    }


    //function for add new doctor
    public function addDoctor(Request $request)
    {
        //doctor image

        $addDoctor = new addDoctor;

        // $addDoctor->image =  $fileName;

        $addDoctor->name = $request->name;
        $addDoctor->phone = $request->phone;
        $addDoctor->roomNo = $request->roomNo;
        $addDoctor->doctor = $request->doctor;
        if ($request->hasfile('image')) {
           $file=$request->file('image');
           $extension=$file->getClientOriginalExtension();
           $fileName = time(). "-ST.". $extension;
           $file->storeAs('public/doctor', $fileName);
           $addDoctor->image = $fileName;
        }
        $addDoctor->save();
        return redirect()->back()->with('message', 'Doctor addede successfully');
    }

    //pblic function view Appointmnts
    public function viewAppointment()
    {
        $appointments=Appointment::all();
        return view('admin.viewAppointment',compact('appointments'));
    }
 //pblic function view Appointmnts approved
 public function approved_appointment($id)
 {
     $appointments=Appointment::find($id);
     $appointments->status='Approved';
     $appointments->save();
     return redirect()->back();
 }

  //pblic function view Appointmnts approved
  public function disapproved_appointment($id)
  {
      $appointments=Appointment::find($id);
      $appointments->status='Canceled';
      $appointments->save();
      return redirect()->back();
  }

   //pblic function view trash doctor
   public function trashDoctor()
   {
    $viewDoctor=addDoctor::onlyTrashed()->get();
    return view('admin.trashDoctor',compact('viewDoctor'));
   }
    //pblic function view restore doctor
    public function restoreDoctor($id)
    {
        $viewDoctor=addDoctor::withTrashed()->find($id);
        $viewDoctor->restore();
        return redirect('viewDoctor');
    }
  //pblic function view delete doctor
  public function deleteDoctor($id)
  {
    $viewDoctor=addDoctor::find($id);

      $viewDoctor->delete();
      return redirect()->back();
  }

    //pblic function view Forcedelete doctor
    public function forceDeleteDoctor($id)
    {
      $viewDoctor=addDoctor::withTrashed()->find($id);

        $viewDoctor->forceDelete();
        return redirect()->back();
    }
  //pblic function view update doctor
  public function updateDoctor(Request $request,$id)
  {
   $updateDoctor=addDoctor::find($id);
    return view('admin.updateDoctor',compact('updateDoctor'));

  }

  //pblic function view edit doctor
    public function editDoctor(Request $request,$id)
    {
     $editDoctor=addDoctor::find($id);
     $editDoctor->name = $request->name;
     $editDoctor->phone = $request->phone;
     $editDoctor->roomNo = $request->roomNo;
     $editDoctor->doctor = $request->doctor;
     if ($request->hasfile('image')) {
        $destination='public/doctor'.$editDoctor->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $file=$request->file('image');
        $extension=$file->getClientOriginalExtension();
        $fileName = time(). "-ST.". $extension;
        $file->storeAs('public/doctor', $fileName);
        $editDoctor->image = $fileName;
     }
     $editDoctor->save();
     return redirect()->back()->with('message', 'Doctor addede successfully');
    return redirect()->back();

    }

    //view email
    public function viewEmail($id)
    {

   $data=Appointment::find($id);
        return view('admin.viewEmail',compact('data'));
    }


    //send email
    public function sendEmail(Request $request,$id)
    {

        $sendEmail=Appointment::find($id);
        $details=[

            'greeting'  => request()->greeting,
            'body'  => request()->body,
            'actiontext'  => request()->actiontext,
            'actionurl'  => request()->actionurl,
            'endpart'  => request()->endpart,
        ];
        Notification::send($sendEmail,new SendEmailNotification($details));
        return redirect()->back()->with('message', 'Send Email successfully');;
    }




}
