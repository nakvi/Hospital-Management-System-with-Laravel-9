<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\addDoctor;
use App\Models\Appointment;
class HomeController extends Controller
{
    // function for auth

public function redirect()
{
    if (Auth::id()) {
        if (Auth::user()->usertype=='0') {
            $viewDoctor=addDoctor::all();
            return view('UserInterface.index',compact('viewDoctor'));
        }
        else
        {
            return view('admin.index');
        }
    }
    else
    {
        return redirect()->back();
    }
}

public function appointment(Request $request)
{
  $data = new Appointment;
  $data->name = $request->name;
  $data->email = $request->email;
  $data->date = $request->date;
  $data->phone = $request->phone;
  $data->message = $request->message;
  $data->doctor = $request->doctor;
  $data->status = 'In Progress';
  $data->doctor = $request->doctor;
  if (Auth::id()) {
    $data->user_id= Auth::user()->id;
  }
  $data->save();
  return redirect()->back()->with('message', 'Your Appointment Done','successfully Done');
}

//Function show to User Appointment
public function myappointment()
{
    if (Auth::id()) {
   $userid=Auth::user()->id;
   $appointment=Appointment::where('user_id',$userid)->get();
        return view('UserInterface.appointments',compact('appointment'));
      }
      else
      {
        return redirect()->back();
      }

}
//function to cancel the appointment
public function cancel_appointment(Request $request,$id)
{
  $data =Appointment::find($id);
  $data->delete();
  return redirect()->back();

}
}